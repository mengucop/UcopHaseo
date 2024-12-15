<?php

namespace App\Http\Controllers;


use App\Http\Requests\LibrarianUpdateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Book;
use App\Models\BookRequest;
use App\Models\BorrowBook;
use App\Models\ContactUs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    /**
     * Display Admin Dashboard
     */
    public function index(){
        $users = User::all();
        $books = Book::all();
        $borrowBooks = BorrowBook::all();
        $bookRequests = BookRequest::all();
        $weekBookRequests = BookRequest::where('created_at', '>', Carbon::now()->startOfWeek())
                            ->where('created_at', '<', Carbon::now()->endOfWeek())->get();
        $weekDueBooks = BorrowBook::where('due_at', '>', Carbon::now()->startOfWeek())
                            ->where('due_at', '<', Carbon::now()->endOfWeek())->get();
        $weekMessages = ContactUs::where('created_at', '>', Carbon::now()->startOfWeek())
                            ->where('created_at', '<', Carbon::now()->endOfWeek())->get();
   
        return view('admin.index', compact('books','borrowBooks', 'bookRequests','users','weekBookRequests','weekDueBooks','weekMessages'));
    }

     /**
     * Display Contacts Us Messages
     */
    public function adminMessages(){
        $messages = ContactUs::orderBy('created_at','desc')->paginate(10);
        return view('admin.messages', compact('messages'));
    }

    /**
     * Display Contacts Us Selected Message
     */
    public function showAdminMessage(ContactUs $message){
        return view('admin.message-show', compact('message'));
    }

    /**
     * Destroy Contacts Us Selected Message
     */
    public function destroyMessage(Request $request, ContactUs $message){
        
        $validated = Validator::make($request->all(), [
            'password' => ['required', 'current_password']
           ]);
    
           if($validated->fails()){
           
            return Redirect::back()->with('mid', "$message->id")->withErrors($validated);
            
           }else{
                $message->delete();
                return Redirect::back()->with('status', 'Message Deleted Successfully');
           }
    }

    /**
     * Display All Librarian Accounts & Search Result 
     */
    public function librarianAccounts(Request $request){

        $librarians = User::where('role', '=', 'librarian')->orderBy('first_name', 'asc')->paginate(10);

        if($search = $request->librarian){
            $role = 'librarian';
            $librarians = $this->searchUser($search, $role);
            if(count($librarians) == 0){
              return Redirect::back()->with('statusError','No Librarian Found');
            }
          }

        return view('admin.librarian-accounts', compact('librarians'));

    }

    /**
     * Search User
     */
    public function searchUser($search, $role){

        return User::where([
            ['role', '=', $role],
            [function ($query) use ($search){
                $query->where('first_name','LIKE','%'. $search.'%')
                ->orWhere('last_name','LIKE','%'. $search.'%')
                ->orWhere(DB::raw("concat(first_name,' ',last_name)"), 'LIKE', '%'. $search.'%')
                ->orWhere('email','LIKE','%'. $search.'%')
                ->orWhere('phone','LIKE','%'. $search.'%')
                ->orWhere('address','LIKE','%'. $search.'%')
                ->orWhere('status','LIKE','%'. $search.'%');                                   
            }]
        ])->paginate(10);

    }

    /**
     * Display Librarian Create Page
     */
    public function createLibrarian(){
        return view('admin.librarian-create');
    }

    /**
     * Storing New Librarian Account
     */
    public function storeLibrarian(UserStoreRequest $request){
        
        $librarian = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => 'librarian',

        ]);

        return  Redirect::route('librarian.create')->with('status', 'Successfully Created A New Librarian Account');
    }

    /**
     * Display the selected librarian Account Information to Edit
     */
    public function editLibrarian(User $librarian){

        return view('admin.librarian-edit', compact('librarian'));
    }

    /**
     * Updating Librarian Account Information
     */
    public function updateLibrarian(LibrarianUpdateRequest $request, User $librarian){
        
        $librarian->update($request->validated());

        return Redirect::route('librarian.edit', $librarian)->with('status', 'Librarian Account Updated Successfully');

    }

    /**
     * Update Librarian Account Status
     */
    public function updateLibrarianStatus(LibrarianUpdateRequest $request, User $librarian){
        
        $request->validateWithBag('userStatus', [
            'password' => ['required', 'current_password'],
        ]);
        
        $librarian->update(['status' => $request->status]);

        if($request->status == 'blocked'){
            return Redirect::route('librarian.edit', $librarian)->with('status', "Successfully Blocked This Librarian Account");
        }else{
            return Redirect::route('librarian.edit', $librarian)->with('status', "Successfully Unblocked This Librarian Account");
        }
    }

    /**
     * Deleting Librarian Account
     */
    public function destroyLibrarian(Request $request, User $librarian){
        
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        
        $librarian->delete();

        return Redirect::route('librarian.accounts')->with('status', "Successfully Deleted A Librarian Account");

    }

    /**
     * Display All User Accounts 
     */
    public function userAccounts(Request $request){

        $users = User::where('role', '=', 'user')->orderBy('first_name', 'asc')->paginate(10);

        if($search = $request->user){
            $role = 'user';
            $users = $this->searchUser($search, $role);
            if(count($users) == 0){
              return Redirect::route('user.accounts')->with('statusError','No User Found');
            }
          }

        return view('admin.user-accounts', compact('users'));

    }

    /**
     * Display User Create Page
     */
    public function createUser(){
        return view('admin.user-create');
    }

    /**
     * Storing New User Account
     */
    public function storeUser(UserStoreRequest $request){
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => 'user',

        ]);

        return  Redirect::route('user.create')->with('status', 'Successfully Created A New User Account');
    }

    /**
     * Display the selected librarian Account Information to Edit
     */
    public function editUser(User $user){

        return view('admin.user-edit', compact('user'));
    }

    /**
     * Update User Account Information
     */
    public function updateUser(UserUpdateRequest $request, User $user){
        
        $user->update($request->validated());

        return Redirect::route('user.edit', $user)->with('status', 'User Account Updated Successfully');

    }
    
    /**
     * Update User Account Status
     */
    public function updateUserStatus(UserUpdateRequest $request, User $user){
        
        $request->validateWithBag('userStatus', [
            'password' => ['required', 'current_password'],
        ]);
        
        $user->update(['status' => $request->status]);

        if($request->status == 'blocked'){
            return Redirect::route('user.edit', $user)->with('status', "Successfully Blocked This User Account");
        }else{
            return Redirect::route('user.edit', $user)->with('status', "Successfully Unblocked This User Account");
        }
    }

    /**
     * Delete User Account
     */
    public function destroyUser(Request $request, User $user){
        
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        
        $user->delete();

        return Redirect::route('user.accounts')->with('status', "Successfully Deleted A User Account");
    }


}
