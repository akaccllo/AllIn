<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>代理管理系统</title>
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/bootstrap/css/bootstrap.min.css')); ?>">
    <link href="<?php echo e(asset("/admin/lib/font-awesome/4.3.0/css/font-awesome.min.css")); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset("/admin/lib/ionicons/2.0.1/css/ionicons.min.css")); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/dist/css/AdminLTE.min.css')); ?>">
    <script src="<?php echo e(asset('/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
</head>
<body class="login-page">
<?php echo $__env->make('admin.layouts.topInfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?php echo e($_system_config->site_name); ?></b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">代理管理系统</p>
        <form action="<?php echo e(route('daili.login.post')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" placeholder="账号" required title="请输入账号" value="<?php echo e(old('name')); ?>"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required title="请输入密码"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    
                        
                            
                        
                    
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div><!-- /.col -->
            </div>
        </form>
        
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</body>
</html>