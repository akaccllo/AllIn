<?php $__env->startSection('content'); ?>

    <div class="body"
         style="background: url('<?php echo e(asset('/web/images/egame-banner-esports.jpg')); ?>') no-repeat;padding: 350px 0 100px">
        <div class="pages">
            <div class="sports w1000">
                <div class="sports_content">
                    

                     <?php if(in_array('GJ', $_api_list)): ?>
                        <a href="javascript:;"
                           <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=gj&playType=4','','width=1024,height=768')"
                           <?php else: ?> onclick="return layer.msg('请先登录！',{icon:6})" <?php endif; ?>><img
                                    src="<?php echo e(asset('/web/images/hgty.png')); ?>"></a>
                    <?php endif; ?>
                    <?php if(in_array('BBIN', $_api_list)): ?>
                        <a href="javascript:;"
                           <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=bbin&playType=4','','width=1024,height=768')"
                           <?php else: ?> onclick="return layer.msg('请先登录！',{icon:6})" <?php endif; ?> ><img
                                    src="<?php echo e(asset('/web/images/sport3.png')); ?>"></a>
                    <?php endif; ?>
                    <?php if(in_array('IBC', $_api_list)): ?>
                        <a href="javascript:;"
                           <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=ibc&playType=4','','width=1024,height=768')"
                           <?php else: ?> onclick="return layer.msg('请先登录！',{icon:6})" <?php endif; ?>><img
                                    src="<?php echo e(asset('/web/images/sport2.png')); ?>"></a>
                    <?php endif; ?>
                    <?php if(in_array('SS', $_api_list)): ?>
                        <a href="javascript:;"
                           <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=ss&playType=4','','width=1024,height=768')"
                           <?php else: ?> onclick="return layer.msg('请先登录！',{icon:6})" <?php endif; ?>><img
                                    src="<?php echo e(asset('/web/images/sport4.png')); ?>"></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            $(function () {
                $('.live-ul li').on('mouseenter', function () {
                    $(this).addClass('on').siblings('li').removeClass('on');
                });

                $('.egameslide').on('click', '.disabled', function () {
                    layer.msg('暂未开通，敬请期待！', {icon: 6});
                    return false;
                });
                jQuery(".egameslide").slide({trigger: "click", mainCell: ".bd"});


                $("img.lazy").lazyload({
                    placeholder: "<?php echo e(asset('/web/images/egame-loading.gif')); ?>",
                    effect: "fadeIn",
                    skip_invisible: false  //解决滚动才显示的问题
                });

                $('.hot_recommond li').on('mouseenter', function () {
                    $(this).addClass('on').siblings('li').removeClass('on');
                })

            });


        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>