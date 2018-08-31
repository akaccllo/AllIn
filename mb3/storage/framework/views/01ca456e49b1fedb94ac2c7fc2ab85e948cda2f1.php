<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/lottory.css')); ?>">
    <div class="body"
         style="">
        <!--banner-->
        <div class="banner" style="height: 355px;">
            <div class="bd">
                <ul>
                    <li style=""><img src="<?php echo e(asset('/web/images/lottoryBanner.jpg')); ?>" alt=""></li>
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
                            
                            
                            
                            
                            
                            
                            <marquee id="mar0" scrollAmount="4" direction="left" onmouseout="this.start()"
                                     onmouseover="this.stop()">
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


        <div class="lotteryPage">
            <div class="lottery">
                <ul>
                    <?php if(in_array('YC', $_api_list)): ?>
                        <li>
                            <a <?php if($_member): ?> href="<?php echo e(route('yc.playGame')); ?>"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank"><img
                                        src="<?php echo e(asset('/web/images/yc_icon.png')); ?>">
                                <div class="liright"><h2>YC彩票</h2><span>YING LOTTERY</span></div>
                            </a>

                            <a <?php if($_member): ?> href="<?php echo e(route('yc.playGame')); ?>"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank"  class="rulebtn">&nbsp;立即游戏&gt;&gt;</a>
                            <br>
                            <p>快乐彩、时时彩、六合彩游戏多样化，尽情体验精彩游戏。</p>

                        </li>

                        <li><a <?php if($_member): ?> href="<?php echo e(route('yc.playGame')); ?>?gametype=Cash"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank"><img
                                        src="<?php echo e(asset('/web/images/yc_icon.png')); ?>">
                                <div class="liright"><h2>YC国彩</h2><span>YING LOTTERY</span></div>
                            </a>
                            <a <?php if($_member): ?> href="<?php echo e(route('yc.playGame')); ?>?gametype=Cash"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank" class="rulebtn">&nbsp;立即游戏&gt;&gt;</a>
                            <br>
                            <p>应有尽有。官方同步开奖，更高中奖率，感受彩票无限乐趣。</p>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array('EG', $_api_list)): ?>
                        <li><a <?php if($_member): ?> href="<?php echo e(route('eg.playGame')); ?> "
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank"><img
                                        src="<?php echo e(asset('/web/images/EG_LOGO.png')); ?>">
                                <div class="liright"><h2>EG彩票</h2><span>YING LOTTERY</span></div>
                            </a>
                            <a <?php if($_member): ?> href="<?php echo e(route('eg.playGame')); ?>"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank" class="rulebtn">&nbsp;立即游戏&gt;&gt;</a>
                            <br>
                            <p>应有尽有。官方同步开奖，更高中奖率，感受彩票无限乐趣。</p>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array('BBIN', $_api_list)): ?>
                        <li><a <?php if($_member): ?> href="<?php echo e(route('bbin.playGame')); ?>?gametype=ltlottery"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank"><img
                                        src="<?php echo e(asset('/web/images/bbin-lottory.png')); ?>">
                                <div class="liright"><h2>BB彩票</h2><span>YING LOTTERY</span></div>
                            </a>
                            <a <?php if($_member): ?> href="<?php echo e(route('bbin.playGame')); ?>?gametype=ltlottery"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank" class="rulebtn">&nbsp;立即游戏&gt;&gt;</a>
                            <br>
                            <p>应有尽有。官方同步开奖，更高中奖率，感受彩票无限乐趣。</p>
                        </li>
                        <?php endif; ?>
                    <?php if(in_array('VR', $_api_list)): ?>
                        <li><a <?php if($_member): ?> href="<?php echo e(route('vr.playGame')); ?>"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank"><img
                                        src="<?php echo e(asset('/web/images/vr-lottory.png')); ?>">
                                <div class="liright"><h2>VR彩票</h2><span>VR LOTTERY</span></div>
                            </a>
                            <a <?php if($_member): ?> href="<?php echo e(route('vr.playGame')); ?>"
                               <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?> target="_blank" class="rulebtn">&nbsp;立即游戏&gt;&gt;</a>
                            <br>
                            <p>应有尽有。官方同步开奖，更高中奖率，感受彩票无限乐趣。</p>
                        </li>
                        <?php endif; ?>


                                <!-- <li class="upcoming"></li> -->
                </ul>
                <div class="clear"></div>
            </div>
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