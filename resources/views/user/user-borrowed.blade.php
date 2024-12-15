<x-app-layout>
    @section('title', 'Borrowed Books')
    <x-slot name="header">
        @include('user.partials.borrowed-header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.partials.message-status')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-10xl overflow-x-auto relative">
                        <table class="mx-auto">
                            <thead class=" text-gray-300 uppercase bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-6 px-6">
                                        Book Title
                                    </th>
                                    <th scope="col" class="py-6 px-6">
                                        Author
                                    </th>
                                    <th scope="col" class="py-6 px-6">
                                        Borrowed At
                                    </th>
                                    <th scope="col">
                                        Due At
                                    </th>
                                    <th scope="col">
                                        Returned At
                                    </th>
                                    <th scope="col" class="py-6 px-6">
                                        Status
                                    </th>
                                    <th scope="col" class="py-6 px-6">
                                        Remarks
                                    </th>
                                    <th scope="col">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($borrowBooks as $borrowBook)
                                <tr class="dark:bg-gray-800 border-b hover:bg-gray-300 dark:hover:bg-gray-600 dark:text-white">
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('user.showBook', $borrowBook->book->id) }}">
                                            {{ $borrowBook->book->title }}</a>
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $borrowBook->book->author->name }}
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        {{ $borrowBook->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        {{ $borrowBook->due_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        @if($borrowBook->returned_at != null)
                                         {{ $borrowBook->returned_at->format('M d, Y') }}
                                        @endif
                                    </td>

                                    <td class="py-4 px-6 capitalize">
                                        {{ $borrowBook->status }}
                                    </td>
                                    <td class="py-4 px-6 capitalize">
                                        {{ $borrowBook->remarks }}
                                    </td>
                                    @if($borrowBook->status == 'pending')
                                    <form method="POST" action="{{ route('request.update', $borrowBook) }}">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="status" value='cancelled'>
                                        <td class="py-2 px-3">
                                            <x-danger-button>
                                                {{ __('Cancel') }}
                                            </x-danger-button>
                                        </td>
                                    </form>
                                    @elseif($borrowBook->status == 'cancelled' || $borrowBook->status == 'denied')
                                    <form method="POST" action="{{ route('request.destroy', $borrowBook) }}">
                                        @csrf
                                        @method('delete')
                                        <td class="py-2 px-3">
                                            <x-danger-button>
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </td>
                                    </form>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($borrowBooks->count() == 0)
                            <div class="text-center text-lg mt-4">
                                <p>No Borrowed Books Found</p>
                        @endif
                        </div>
                        <div class="mx-auto max-w-lg pt-6 p-4">
                            {{ $borrowBooks->Links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
