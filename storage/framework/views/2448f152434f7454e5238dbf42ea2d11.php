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
    <?php $__env->startSection('title', 'Contact Us | '); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mt-16">
                
                <div class="container mx-auto mt-8 p-8 bg-transparent shadow-md">
                    <?php echo $__env->make('layouts.partials.message-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h1 class="text-5xl text-center text-sky-500 font-bold mb-10">Contact Us</h1>
                    <form action="<?php echo e(route('home.contactUs.submit')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-4">
                            <label for="name" class="block dark:text-gray-200 text-sm font-bold mb-2">Name:</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block dark:text-gray-200 text-sm font-bold mb-2">Email:</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block dark:text-gray-200 text-sm font-bold mb-2">Message:</label>
                            <textarea id="message" name="message" rows="4" class="w-full p-2 border border-gray-300 rounded"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-500 text-white p-4 rounded-md">Submit</button>
                    </form>
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
<?php endif; ?><?php /**PATH D:\Flutt\laragon\www\laravel-library-management-system\resources\views/home/contact.blade.php ENDPATH**/ ?>