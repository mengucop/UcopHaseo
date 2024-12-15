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
    <?php $__env->startSection('title', 'About Me | '); ?>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-black dark:text-gray-300">
            <div class="mt-16">
                <div class="container mx-auto mt-8 p-4">

                    <!-- About Me Section -->
                    <section class="mb-8 text-center">
                        <h1 class="text-5xl text-center text-sky-500 font-bold mb-10">About Developer</h1>

                        <!-- Image Section -->
                        <div class="mb-6">
                            <img src="images/ucop.jpeg" alt="Yusof Abbad" class="w-32 h-32 rounded-full mx-auto mb-5">
                        </div>

                        <p>
                            Developer: <span class="dark:text-white text-xl font-bold">YUSOF ABBAD BIN ABDUL AZIZ</span><br>
                            Group: <span class="dark:text-white text-xl font-bold">RCDCS2515B</span><br>
                            Subject: <span class="dark:text-white text-xl font-bold">ITT626: Back-End Technology</span>
                        </p>
                    </section>

                    <!-- Mission Section -->
                    <section class="mb-8">
                        <h2 class="text-2xl text-sky-500 font-bold mb-2">My Mission</h2>
                        <p>
                            <span class="font-bold">Empowering through Technology:</span> As a developer, I aim to create solutions that are not only functional but also impactful in solving real-world problems. My goal is to make technology accessible and easy to use, ensuring that systems like this contribute to better learning and management.
                        </p>
                    </section>

                    <!-- Why Choose This Project Section -->
                    <section class="mb-8">
                        <h2 class="text-2xl text-sky-500 font-bold mb-2">Why Choose This Project?</h2>
                        <ul class="list-disc list-inside">
                            <li>Designed with both users and administrators in mind</li>
                            <li>Easy-to-use, efficient system for library management</li>
                            <li>Built with modern back-end technologies for scalability</li>
                        </ul>
                    </section>

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
<?php /**PATH D:\Flutt\laragon\www\Library-Management-System-Yusof\resources\views/home/about-us.blade.php ENDPATH**/ ?>