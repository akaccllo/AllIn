<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/activityList.css')); ?>">
    <div class="activityTab">
        <div class="tab_title">
            <ul>
                <li class="active"><a href="javascript:;">全部活动</a></li>
                <li><a href="javascript:;">老虎机</a></li>
                <li><a href="javascript:;">真人娱乐场</a></li>
                <li><a href="javascript:;">其他活动</a></li>
            </ul>
        </div>

        <div class="tab_content">
            <div class="content_box active">
                <ul style="">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <img src="<?php echo e($item->title_img); ?>" alt="">
                            <div class="more_info promo" >
                                <h3 class="more_title t1"><?php echo e($item->title); ?></h3>
                                <div><?php echo $item->title_content; ?></div>
                                <h3 class="more_title t2">活动说明</h3>
                                <div><?php echo $item->content; ?></div>
                                <h3 class="more_title t3">活动规则</h3>
                                <div><?php echo $item->rule_content; ?></div>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="content_box">
                <ul>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->type == 5): ?>
                            <li>
                                <img src="<?php echo e($item->title_img); ?>" alt="">
                                <div class="more_info promo" >
                                    <h3 class="more_title t1"><?php echo e($item->title); ?></h3>
                                    <div><?php echo $item->title_content; ?></div>
                                    <h3 class="more_title t2">活动说明</h3>
                                    <div><?php echo $item->content; ?></div>
                                    <h3 class="more_title t3">活动规则</h3>
                                    <div><?php echo $item->rule_content; ?></div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="content_box">
                <ul>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->type == 6): ?>
                            <li>
                                <img src="<?php echo e($item->title_img); ?>" alt="">
                                <div class="more_info promo" >
                                    <h3 class="more_title t1"><?php echo e($item->title); ?></h3>
                                    <div><?php echo $item->title_content; ?></div>
                                    <h3 class="more_title t2">活动说明</h3>
                                    <div><?php echo $item->content; ?></div>
                                    <h3 class="more_title t3">活动规则</h3>
                                    <div><?php echo $item->rule_content; ?></div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="content_box">
                <ul>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->type == 7): ?>
                            <li>
                                <img src="<?php echo e($item->title_img); ?>" alt="">
                                <div class="more_info promo" >
                                    <h3 class="more_title t1"><?php echo e($item->title); ?></h3>
                                    <div><?php echo $item->title_content; ?></div>
                                    <h3 class="more_title t2">活动说明</h3>
                                    <div><?php echo $item->content; ?></div>
                                    <h3 class="more_title t3">活动规则</h3>
                                    <div><?php echo $item->rule_content; ?></div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>

    <script>
        (function($){
            $(function () {

                navObj=5;
                var $content_box=$('.content_box');
                $('.content_box>ul>li>img').on('click',function () {
                    var $li=$(this).closest('li');
                    if(!$li.hasClass('active')){
                        $content_box.find('li.active').removeClass('active').find('.more_info').slideUp();
                        $li.addClass('active');
                        $li.find('.more_info').slideDown();
                    }else{
                        $li.find('.more_info').slideUp('slow',function(){
                            $li.removeClass('active');
                        });
                    }
                    return false;
                });

                $('.tab_title').on('click','li',function () {
                    $(this).addClass('active').siblings('li').removeClass('active');
                    var index=$(this).index();
                    $content_box.removeClass('active').eq(index).addClass('active');
                })
            })
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>