<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/rendezvous.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/index1.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/qqq5595.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/yk_modal.css')); ?>">
    <script src="<?php echo e(asset('/web/js/jquery-2.1.3.min.js')); ?>"></script>
</head>
<body>

<?php echo $__env->make('web.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container user_con" style="margin-top: 250px;">
    <div class="user_left fl">
        <ul>
            <li <?php if(in_array($web_route, ['member.userCenter', 'member.account_load', 'member.bank_load', 'member.update_bank_info','member.message_list'])): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('member.userCenter')); ?>">个人资料</a>
            </li>
            <li <?php if(in_array($web_route, ['member.safe_psw', 'member.login_psw'])): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('member.safe_psw')); ?>">安全管理</a>
            </li>
            <li <?php if(in_array($web_route, ['member.finance_center', 'member.member_drawing', 'member.indoor_transfer', 'member.weixin_pay', 'member.ali_pay', 'member.bank_pay'])): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('member.finance_center')); ?>">财务中心</a>
            </li>
            <li <?php if(in_array($web_route, ['member.customer_report'])): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('member.customer_report')); ?>">客户报表</a>
            </li>
            <li <?php if(in_array($web_route, ['member.service_center', 'member.complaint_proposal'])): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('member.service_center')); ?>">服务中心</a>
            </li>
            
                
            
        </ul>
    </div>
    <div class="user_right ">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<?php echo $__env->make('web.layouts.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('/web/js/jquery.flexslider.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/index1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/yk_modal.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/common.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/jquery.SuperSlide.2.1.1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/layer/layer.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/ajax-submit-form.js')); ?>"></script>
<script src="<?php echo e(asset('/web/js/rendezvous.js')); ?>"></script><!--日历-->
<script src="<?php echo e(asset('/web/js/jquery.page.js')); ?>"></script><!--翻页-->
<script src="<?php echo e(asset('/web/My97DatePicker/WdatePicker.js')); ?>"></script><!--起止时间日历 My97DatePicker-->
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