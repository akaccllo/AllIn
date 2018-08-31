<?php $__env->startSection('content'); ?>
    <div class="body">
        <div class="by-bg">
            <div class="container by-nr">
                <div class="pullLeft ag-by-bg">
                    <a class="pullLeft <?php if(in_array('AG', $_api_list)): ?> <?php else: ?> disabled <?php endif; ?>" href="javascript:;"
                       <?php if(in_array('AG', $_api_list)): ?>
                       <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ag.playGame')); ?>?gametype=6','','width=1024,height=768')"
                       <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>
                            <?php endif; ?>></a>
                </div>
                <div class="pullLeft pt-by-bg">
                    <a class="pullLeft <?php if(in_array('PT', $_api_list)): ?> <?php else: ?> disabled <?php endif; ?>" href="javascript:;"
                       <?php if(in_array('PT', $_api_list)): ?>
                       <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('pt.playGame')); ?>?gametype=cashfi','','width=1024,height=768')"
                       <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>
                            <?php endif; ?>></a>
                </div>
                <div class="pullLeft mw-by-bg">
                    <a class="pullLeft <?php if(in_array('MW', $_api_list)): ?> <?php else: ?> disabled <?php endif; ?>" href="javascript:;"
                       <?php if(in_array('MW', $_api_list)): ?>
                       <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('mw.playGame')); ?>','','width=1024,height=768')"
                       <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>
                            <?php endif; ?>></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.disabled').on('click', function () {
                layer.msg('暂未开放，敬请期待', {icon: 6});
            });
        })
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>