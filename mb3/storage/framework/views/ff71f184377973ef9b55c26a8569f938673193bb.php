<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="<?php echo e($_system_config->keyword); ?>">
    <script src="<?php echo e(asset('/web/js/jquery-2.1.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/web/layer/layer.js')); ?>"></script>
    <style>
        body {
            background: #000;
        }
    </style>
</head>
<body>

<script>
    (function ($) {
        $(function () {
            layer.open({
                type: 1,
                title: '额度转换',
                closeBtn: 0,
                shadeClose: false,
                skin: 'yourclass',
//                area: ['500px', '300px'],
                btn: ['确定','直接游戏'],
                content: '<form action="<?php echo e(route('transfer_all')); ?>" id="transfer_form" method="post"><div style="margin:15px;text-align:center">' +
                    '<input type="hidden" name="api_code" value="<?php echo e($api_code); ?>">'+
                '<input type="hidden" name="str" value="<?php echo e($str); ?>">'+
                '<p>即将带入<?php echo e($api_code); ?>&nbsp; &nbsp;<input type="number" name="amount" style="width:100px;" value="<?php echo e($_member->money); ?>" >&nbsp; &nbsp;额度</p>' +
                '</div></form>',
                yes: function (index, layer) {
                    //按钮【按钮一】的回调
                    $('#transfer_form').submit();
                },
                btn2: function (index, layer) {
                    //按钮【按钮二】的回调
                    var uri = '<?php echo e($str); ?>';
                    location.href=uri;
                    //return false 开启该代码可禁止点击该按钮关闭
                },
                
                    
                    
                
                cancel: function () {
                    //右上角关闭回调

                    //return false 开启该代码可禁止点击该按钮关闭
                }
            });
        })
    })(jQuery);
</script>

</body>
</html>