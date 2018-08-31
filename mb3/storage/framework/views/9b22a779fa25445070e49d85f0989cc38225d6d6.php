<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/9388/live.css')); ?>">

    <!--banner-->
    <div class="banner" style="height: 280px;">
        <div class="bd">
            <ul>
                <li>
                    <img src="<?php echo e(asset('/web/images/poker/banner.jpg')); ?>" alt="">
                </li>
            </ul>
        </div>
    </div>

    <!--notice-->


    <!--notice-->
    <div class="notice-row">
        <div class="noticeBox">
            <div class="w">
                <div class="title">
                    最新公告：
                </div>
                <div class="bd2">
                    <div id="memberLatestAnnouncement" style="cursor:pointer;color:#fff;">
                        <marquee id="mar0" scrollamount="3" scrolldelay="100" direction="left"
                                 onmouseover="this.stop();" onmouseout="this.start();">
                            <?php $__currentLoopData = $_system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span>~<?php echo e($v->title); ?>~</span>
                                <span><?php echo e($v->content); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="zhenrenPage">
        <div class="zhenren w">
            <ul>
                <?php if(in_array('MW', $_api_list)): ?>
                    <li>
                        <div class="xx4">
                            <span>MW棋牌厅</span>
                            <a href="javascript:void(0);" title="MW"
                               <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('mw.playGame')); ?>','','width=1024,height=768')"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
                        </div>
                        <div class="xx5"><img src="<?php echo e(asset('/web/images/poker/mw.png')); ?>"></div>
                    </li>
                <?php endif; ?>
                <?php if(in_array('KG', $_api_list)): ?>
                    <li>
                        <div class="xx4">
                            <span>KG棋牌厅</span>
                            <a href="javascript:void(0);" title="KG"
                               <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('kg.playGame')); ?>','','width=1024,height=768')"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
                        </div>
                        <div class="xx5"><img src="<?php echo e(asset('/web/images/poker/kg.png')); ?>"></div>
                    </li>
                <?php endif; ?>
                <?php if(in_array('KY', $_api_list)): ?>
                    <li>
                        <div class="xx4">
                            <span>开元棋牌厅</span>
                            <a href="javascript:void(0);" title="KY"
                               <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=ky&playType=5','','width=1024,height=768')"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
                        </div>
                        <div class="xx5"><img src="<?php echo e(asset('/web/images/poker/ky.png')); ?>"></div>
                    </li>
                <?php endif; ?>

                <li class="more">

                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>

    <div class="notice_layer">
        <h3>公告详情 <span class="close"></span></h3>
        <div class="notice_con">
            <?php $__currentLoopData = $_system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="module">
                    <h4><?php echo e($v->title); ?></h4>
                    <p>✿<?php echo e($v->content); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
    </div>
    <script>


        (function ($) {
            $(function () {

                //公告
                $('#mar0').on('click', function () {
                    var notice_index = layer.open({
                        type: 1,
                        title: false,
                        closeBtn: 0,
                        area: ['680px'],
                        skin: 'layui-layer-nobg', //没有背景色
                        shadeClose: true,
                        content: $('.notice_layer')
                    });

                    $('.notice_layer').on('click', '.close', function () {
                        layer.close(notice_index)
                    })
                })

            })
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>