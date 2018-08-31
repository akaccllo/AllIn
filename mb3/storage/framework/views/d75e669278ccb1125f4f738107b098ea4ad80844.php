<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="<?php echo e($_system_config->keyword); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/index1.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/yk_modal.css')); ?>">
    <script src="<?php echo e(asset('/web/js/jquery-2.1.3.min.js')); ?>"></script>
</head>
<body class="lay-out">

<?php echo $__env->make('web.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('web.layouts.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('/web/js/jquery.flexslider.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/index1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/yk_modal.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/jquery.SuperSlide.2.1.1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/layer/layer.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/ajax-submit-form.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/jquery.lazyload.min.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/jquery.fly.min.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/common.js')); ?>"></script>
<?php echo $__env->yieldContent('after.js'); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>