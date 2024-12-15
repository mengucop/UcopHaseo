<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


        <title> <?php echo $__env->yieldContent('title'); ?>Library Management System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased ">
        <div class="min-h-screen  bg-gray-100 dark:bg-gray-900">
            <?php echo $__env->make('layouts.home-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
              <!-- Footer Section -->
              <footer class="bg-transparent  dark:text-white p-4 text-center">
                <p>&copy; By Yusof Abbad 2024 Library <span class="text-sky-500"> Management </span> System. All rights reserved.</p>
            </footer>
        </div>
    </body>
</html>
<?php /**PATH D:\Flutt\laragon\www\laravel-library-management-system\resources\views/layouts/home.blade.php ENDPATH**/ ?>