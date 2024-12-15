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
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mt-16">
                <?php echo $__env->make('layouts.partials.message-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex flex-col md:flex-row -mx-4">
                                    <div class="md:flex-1 px-4">
                                        <div class="h-[460px] rounded-lg bg-gray-300 mb-4">
                                            <img class="w-full h-full object-fill"
                                                 src="<?php echo e(asset('images/buku.jpg')); ?>"
                                                 alt="Book Image">
                                        </div>
                                        <div class="flex -mx-2 mb-4">
                                            <div class="w-full px-2">
                                                <form method="POST" action="<?php echo e(route('user.storeRequest', $book)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('POST'); ?>
                                                    <button class="w-full bg-sky-600 text-white py-2 px-4 rounded-full font-bold hover:bg-sky-700">
                                                        Reserve
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:flex-1 px-4 capitalize">
                                        <!-- Book Information -->
                                        <div class="mb-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Title:</label>
                                            <p class="dark:text-gray-200"><?php echo e($book->title); ?></p>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Author:</label>
                                            <p class="dark:text-gray-200">F. Scott Fitzgerald</p>
                                        </div>

                                        <div class="mb-4 mr-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Published Year:</label>
                                            <p class="dark:text-gray-200"><?php echo e($book->publication_year); ?></p>
                                        </div>

                                        <div class="mb-4 mr-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Publisher:</label>
                                            <p class="dark:text-gray-200"><?php echo e($book->publisher->name); ?></p>
                                        </div>

                                        <div class="mb-4 mr-4">
                                            <label class="block dark:text-gray-400 text-sm font-semibold mb-2">ISBN:</label>
                                            <p class="dark:text-gray-200"><?php echo e($book->isbn); ?></p>
                                        </div>

                                        <div class="flex justify-start ">
                                            <div class="mb-4 mr-4">
                                                <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Copies:</label>
                                                <p class="dark:text-gray-200"><?php echo e($book->copies); ?></p>
                                            </div>

                                            <div class="mb-4 mr-4">
                                                <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Availability:</label>
                                                <p class="dark:text-gray-200">
                                                    <?php if($book->copies - $book->borrowBooks->count() == 0): ?>
                                                        Borrowed
                                                    <?php else: ?>
                                                        <?php echo e($book->status); ?>

                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <?php if($book->bookCategories->isNotEmpty()): ?>
                                            <div class="mb-4">
                                                <span class="font-bold dark:text-gray-400">Book Categories:</span>
                                                <div class="flex flex-wrap items-center mt-2">
                                                    <?php $__currentLoopData = $book->bookCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <button class="bg-gray-300 text-sm text-gray-700 py-2 px-2 mb-2 rounded-md whitespace-nowrap font-bold mr-2 hover:bg-gray-400">
                                                            <?php echo e($bookCategory->category->name); ?>

                                                        </button>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div>
                                            <span class="font-bold text-xl dark:text-gray-400 ">Book Location</span>
                                            <div class="flex justify-start mt-2 ">
                                                <?php $__currentLoopData = $book->bookLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookLocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="mb-4 mr-4">
                                                        <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Call Number:</label>
                                                        <p class="dark:text-gray-200 text-center"><?php echo e($bookLocation->call_number); ?></p>
                                                    </div>

                                                    <div class="mb-4 mr-4">
                                                        <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Floor Number :</label>
                                                        <p class="dark:text-gray-200 text-center"><?php echo e($bookLocation->floor); ?></p>
                                                    </div>
                                                    <div class="mb-4 mr-4">
                                                        <label class="block dark:text-gray-400 text-sm font-semibold mb-2">Shelf Number :</label>
                                                        <p class="dark:text-gray-200 text-center"><?php echo e($bookLocation->shelf); ?></p>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
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
<?php if (isset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $attributes = $__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $component = $__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php /**PATH D:\Flutt\laragon\www\laravel-library-management-system\resources\views/home/books/show.blade.php ENDPATH**/ ?>