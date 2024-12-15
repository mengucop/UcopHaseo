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
    <?php $__env->startSection('title', 'Book Requests'); ?>
     <?php $__env->slot('header', null, []); ?> 
        <?php echo $__env->make('book_request.partials.request-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <h3 class="dark:text-white">Search Requests</h3>
            <form method="get" action="" class="py-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('get'); ?>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="search" name="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Book Request Information" required>
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            <?php echo $__env->make('layouts.partials.message-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="max-w-10xl overflow-x-auto relative">
                            <table class="mx-auto">
                                <thead class="text-gray-300 uppercase bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-6 px-6">
                                            ID
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            First Name
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Last Name
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Book Title
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Author
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Book Status
                                         </th>
                                        <th scope="col" class="py-6 px-6">
                                            Created AT
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Updated AT
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Status
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Remarks
                                        </th>
                                        <th scope="col" class="py-6 px-6">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $bookRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="dark:bg-gray-800 border-b hover:bg-gray-300 dark:hover:bg-gray-600 dark:text-white capitalize">
                                            <td class="py-4 px-6 text-center">
                                                <?php echo e($bookRequest->id); ?>

                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <?php echo e($bookRequest->user->first_name); ?>

                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <?php echo e($bookRequest->user->last_name); ?>

                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <a href="<?php echo e(route('book.show', $bookRequest->book)); ?>"><?php echo e($bookRequest->book->title); ?></a>
                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <?php echo e($bookRequest->book->author->name); ?>

                                            </td>
                                            <td class="py-4 px-6 text-center ">
                                            <?php if($bookRequest->book->copies - $bookRequest->book->borrowBooks->count() == 0): ?>
                                                Borrowed
                                            <?php else: ?>
                                                <?php echo e($bookRequest->book->status); ?>

                                            <?php endif; ?>
                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <?php echo e($bookRequest->created_at->diffForHumans()); ?>

                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <?php echo e($bookRequest->updated_at->diffForHumans()); ?>

                                            </td>
                                            <td class="py-4 px-6 text-center ">
                                                <?php echo e($bookRequest->status); ?>

                                            </td>
                                            <td class="py-4 px-6 text-center ">
                                                <?php echo e($bookRequest->remarks); ?>

                                            </td>
                                            <td class="relative py-4 px-6">
                                                <?php echo $__env->make('book_request.partials.request-action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php echo $__env->make('book_request.partials.request-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php echo $__env->make('book_request.partials.status-update-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php echo $__env->make('book_request.partials.borrow-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if($bookRequests->count() == 0): ?>
                            <div class="text-center text-lg mt-4">
                                <p>No Result Found</p>
                            </div>
                            <?php endif; ?>
                            <div class="mx-auto max-w-lg pt-6 p-4">
                                <?php echo e($bookRequests->Links()); ?>

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
<?php /**PATH D:\Flutt\laragon\www\laravel-library-management-system\resources\views/book_request/requests.blade.php ENDPATH**/ ?>