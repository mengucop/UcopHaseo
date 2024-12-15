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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-16">

                <!-- Hero Section -->
                <header class="bg-gray-800 text-white h-96 flex items-center justify-center rounded-md">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold mb-4">Perpustakaan Dato' Jaafar Hassan</h1>
                        <p class="text-lg mb-6">Embark on a journey where books open doors to new worlds. Reading not only sharpens your mind but also empowers your imagination. At Perpustakaan Dato' Jaafar Hassan, we believe in promoting a love for reading that fosters curiosity, growth, and a deeper connection to knowledge.</p>
                    </div>
                </header>

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
<?php /**PATH D:\Flutt\laragon\www\Library-Management-System-Yusof\resources\views/home/index.blade.php ENDPATH**/ ?>