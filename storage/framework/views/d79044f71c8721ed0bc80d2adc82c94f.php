<?php if (isset($component)) { $__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b = $attributes; } ?>
<?php $component = App\View\Components\HomeLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HomeLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('title', 'Browse Books | '); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mt-16">
                <form method="get" action="" class="py-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('get'); ?>
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search" name="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Book" required>
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>

                <?php echo $__env->make('layouts.partials.message-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div>
                        <p class="text-sm text-white-700 leading-5">
                            <?php echo __('Showing'); ?>

                            <?php if($books->firstItem()): ?>
                                <span class="font-medium"><?php echo e($books->firstItem()); ?></span>
                                <?php echo __('to'); ?>

                                <span class="font-medium"><?php echo e($books->lastItem()); ?></span>
                            <?php else: ?>
                                <?php echo e($books->count()); ?>

                            <?php endif; ?>
                            <?php echo __('of'); ?>

                            <span class="font-medium"><?php echo e($books->total()); ?></span>
                            <?php echo __('results'); ?>

                        </p>
                    </div>
                    <div class="container mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex flex-col h-full bg-white rounded-lg overflow-hidden">
                                <!-- Book Card -->
                                <div class="flex-1">
                                    <img src="<?php echo e(asset('images/buku.jpg')); ?>" alt="<?php echo e($book->title); ?>" class="w-full h-96 object-fit">
                                    <div class="p-4">
                                        <h2 class="text-xl text-gray-600 font-bold mb-2"><?php echo e($book->title); ?></h2>
                                        <p class="text-gray-700 text-md mb-2">Author: <span class="text-gray-700 font-bold"><?php echo e($book->author->name); ?></span> </p>
                                    </div>
                                </div>

                                <!-- Button at the Same Position -->
                                <div class="p-3 text-white flex flex-row justify-end">
                                    <a href="<?php echo e(route('home.book.show', $book)); ?>" class="rounded-full px-6 mx-3 py-3 bg-blue-600 hover:bg-blue-700 text-right">
                                        View
                                    </a>
                                    <form method="POST" action="<?php echo e(route('user.storeRequest', $book)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <button class="rounded-full px-6 py-3 bg-blue-600 hover:bg-blue-700">Reserve</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mx-auto max-w-lg pt-6 p-4">
                        <?php echo e($books->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $attributes = $__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $component = $__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php /**PATH D:\Flutt\laragon\www\laravel-library-management-system\resources\views/home/books/index.blade.php ENDPATH**/ ?>