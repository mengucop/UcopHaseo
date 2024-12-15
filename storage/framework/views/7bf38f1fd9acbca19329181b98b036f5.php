<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('title', 'Admin Dashboard'); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Admin Dashboard')); ?>

        </h2>

     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-6">
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2  gap-6 lg:gap-8">
                            
                            <div  class="scale-100 p-2  border-4 border-gray-400 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class=" overflow-hidden">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Books</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2 capitalize">
                                        <table class=" text-center mx-2">
                                            <thead class="text-sm dark:text-gray-300 uppercase">
                                                <tr>
                                                    <th class="px-4">
                                                        Books
                                                    </th>
                                                    <th class="px-4">
                                                        Quantity
                                                    </th>
                                                    <th class="px-4 whitespace-nowrap">
                                                        On Hand
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="dark:text-white">
                                                <tr>
                                                    <td>
                                                        <?php echo e($books->count()); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($books->sum('copies')); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($books->sum('copies') - $borrowBooks->where('status', 'borrowed')->count()); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div  class="scale-100 p-2 border-4 border-gray-400 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="overflow-hidden">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Book Requests</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2 capitalize">
                                        <table class=" text-center mx-2">
                                            <thead class="text-sm dark:text-gray-300 uppercase">
                                                <tr>
                                                    <th class="px-4">
                                                        Pending
                                                    </th>
                                                    <th class="px-4">
                                                        Approved
                                                    </th>
                                                    <th class="px-4">
                                                        Denied
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class=" dark:text-white">
                                                <tr>
                                                    <td>
                                                        <?php echo e($bookRequests->where('status', 'pending')->count()); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($bookRequests->where('status', 'approved')->count()); ?>

                                                    </td>
                                                    <td class="">
                                                        <?php echo e($bookRequests->where('status', 'denied')->count()); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div  class="scale-100 p-2  border-4 border-gray-400 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="overflow-hidden">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Borrowed Books</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2 capitalize">
                                        <table class=" text-center mx-2">
                                            <thead class="text-sm dark:text-gray-300 uppercase">
                                                <tr>
                                                    <th class="px-4">
                                                        Borrowed
                                                    </th>
                                                    <th class="px-4">
                                                        Overdue
                                                    </th>
                                                    <th class="px-4">
                                                        Due Soon
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="dark:text-white">
                                                <tr>
                                                    <td>
                                                        <?php echo e($borrowBooks->where('status', 'borrowed')->count()); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($borrowBooks->where('status', 'borrowed')->where('due_at', '<=', now())->count()); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($weekDueBooks->where('status', 'borrowed')->count()); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div  class="scale-100 p-2  border-4 border-gray-400 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="overflow-hidden">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Users</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2 capitalize">
                                        <table class="text-center mx-2">
                                            <thead class="text-sm dark:text-gray-300 uppercase">
                                                <tr>
                                                    <th class="px-4">
                                                        Total
                                                    </th>
                                                    <th class="px-4">
                                                        Active
                                                    </th>
                                                    <th class="px-4">
                                                        Blocked
                                                    </th>
                                                    <th class="px-4">
                                                        Inactive
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="dark:text-white">
                                                <tr class="">
                                                    <td>
                                                        <?php echo e($users->where('role', 'user')->count()); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($users->where('role', 'user')->where('status', 'active')->count()); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($users->where('role', 'user')->where('status', 'blocked')->count()); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($users->where('role', 'user')->where('status', 'inactive')->count()); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-16">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            
                            <div class="scale-100 p-2  border-2 border-gray-500 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="overflow-hidden pt-3">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">This Week Pending Book Requests (<span class="text-blue-400"><?php echo e($weekBookRequests->where('status', '=','pending')->count()); ?></span>)</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2 capitalize mx-5">
                                        <table class="mt-4 mx-auto">
                                            <?php if( $weekBookRequests->where('status', 'pending')->count() != 0): ?>
                                            <thead class="text-gray-300 uppercase bg-gray-700">
                                                <tr>
                                                    <th scope="col" class="py-4 px-4">
                                                        Full Name
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Book
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Date
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $weekBookRequests->where('status', '=','pending')->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekBookRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="dark:bg-gray-800 border-b hover:bg-gray-300 dark:hover:bg-gray-600"
                                                onclick="window.location='<?php echo e(route('request.view', $weekBookRequest)); ?>'" style="cursor: pointer;">

                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekBookRequest->user->first_name); ?>

                                                        <?php echo e($weekBookRequest->user->last_name); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e(substr($weekBookRequest->book->title,0, 20). '...'); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekBookRequest->created_at->diffForHumans()); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <?php else: ?>
                                            <h3 class="text-center">No Pending Requests</h3>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                    <?php if( $weekBookRequests->where('status', 'pending')->count() != 0): ?>
                                    <button class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6 capitalize"
                                    onclick="window.location='<?php echo e(route('pending')); ?>'">view all pending requests</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div  class="scale-100 p-2 border-2 border-gray-500 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="overflow-hidden pt-3 ">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">This Week Approved Book Requests (<span class="text-blue-400"><?php echo e($weekBookRequests->where('status', 'approved')->count()); ?></span>)</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2 capitalize mx-5">
                                        <table class="mt-4 mx-auto">
                                            <?php if( $weekBookRequests->where('status', 'approved')->count() != 0): ?>
                                            <thead class="text-gray-300 uppercase bg-gray-700">
                                                <tr>
                                                    <th scope="col" class="py-4 px-4">
                                                        Full Name
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Book
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Approved At
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $weekBookRequests->where('status', 'approved')->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekBookRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="dark:bg-gray-800 border-b hover:bg-gray-300 dark:hover:bg-gray-600"
                                                onclick="window.location='<?php echo e(route('request.view', $weekBookRequest)); ?>'" style="cursor: pointer;">

                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekBookRequest->user->first_name); ?>

                                                        <?php echo e($weekBookRequest->user->last_name); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e(substr($weekBookRequest->book->title,0, 20). '...'); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekBookRequest->updated_at->diffForHumans()); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <?php else: ?>
                                            <h3 class="text-center">No Approved Requests</h3>
                                            <?php endif; ?>
                                        </table>

                                    </div>
                                    <?php if( $weekBookRequests->where('status', 'approved')->count() != 0): ?>
                                    <button class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6 capitalize"
                                    onclick="window.location='<?php echo e(route('approved')); ?>'">view all approved requests</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div  class="scale-100 p-2 border-2 border-gray-500 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="overflow-hidden pt-3 ">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">This Week Borrowed Books Due (<span class="text-blue-400"><?php echo e($weekDueBooks->where('status', 'borrowed')->count()); ?></span>)</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2 capitalize mx-5">
                                        <table class="mt-4 mx-auto ">
                                            <?php if( $weekDueBooks->where('status', 'borrowed')->count() != 0): ?>
                                            <thead class="text-gray-300 uppercase bg-gray-700">
                                                <tr>
                                                    <th scope="col" class="py-4 px-4">
                                                        Full Name
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Book
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Due At
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $weekDueBooks->where('status', 'borrowed')->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekDueBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="dark:bg-gray-800 border-b hover:bg-gray-300 dark:hover:bg-gray-600"
                                                onclick="window.location='<?php echo e(route('borrowed.show', $weekDueBook)); ?>'" style="cursor: pointer;">

                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekDueBook->user->first_name); ?>

                                                        <?php echo e($weekDueBook->user->last_name); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e(substr($weekDueBook->book->title,0, 20). '...'); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekDueBook->due_at->format('M d, Y')); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <?php else: ?>
                                            <h3 class="text-center">No Approved Requests</h3>
                                            <?php endif; ?>
                                        </table>

                                    </div>
                                    <?php if( $weekDueBooks->where('status', 'borrowed')->count() != 0): ?>
                                    <button class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6 capitalize"
                                    onclick="window.location='<?php echo e(route('borrowed')); ?>'">view all borrowed books</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div  class="scale-100 p-2 border-2 border-gray-500 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="overflow-hidden pt-3 ">
                                    <span class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">This Week Contact Us Messages (<span class="text-blue-400"><?php echo e($weekMessages->count()); ?></span>)</span>
                                    <div class="max-w-10xl overflow-x-auto relative mt-2  mx-5">
                                        <table class="mt-4 mx-auto ">
                                            <?php if( $weekMessages->count() != 0): ?>
                                            <thead class="text-gray-300 uppercase bg-gray-700">
                                                <tr>
                                                    <th scope="col" class="py-4 px-4">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="py-4 px-4">
                                                        Date Sent
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $weekMessages->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="dark:bg-gray-800 border-b hover:bg-gray-300 dark:hover:bg-gray-600"
                                                onclick="window.location='<?php echo e(route('admin.message.show', $weekMessage)); ?>'" style="cursor: pointer;">

                                                    <td class="py-2 px-6 capitalize">
                                                        <?php echo e($weekMessage->name); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekMessage->email); ?>

                                                    </td>
                                                    <td class="py-2 px-6">
                                                        <?php echo e($weekMessage->created_at->format('M d, Y')); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <?php else: ?>
                                            <h3 class="text-center">No Messages</h3>
                                            <?php endif; ?>
                                        </table>

                                    </div>
                                    <?php if($weekMessages->count() != 0): ?>
                                    <button class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6 capitalize"
                                    onclick="window.location='<?php echo e(route('admin.messages')); ?>'">view all messages</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Flutt\laragon\www\laravel-library-management-system\resources\views/admin/index.blade.php ENDPATH**/ ?>