<?php $__env->startSection('content'); ?>
    
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="userInfo setCard">
                    <dl>
                        <dt>账户信息</dt>
                        <dd>
                            <div class="pull-left">
                                会员账户
                            </div>
                            <div class="pull-right">
                                <?php echo e($_member->name); ?>

                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">中心账户余额</div>
                            <div class="pull-right">
                                <?php echo e($_member->money); ?>元
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">反水账户余额</div>
                            <div class="pull-right">
                                <?php echo e($_member->fs_money); ?>元
                            </div>
                        </dd>
                        <?php
                        $own_api_list = $_member->apis()->pluck('api_id')->toArray();
                        ?>
                        <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $mod = '';
                            if (in_array($k, $own_api_list))
                                $mod = $_member->apis()->where('api_id', $k)->first();
                            ?>
                            <dd>
                                <div class="pull-left"><?php echo e($v); ?>余额</div>
                                <div class="pull-right">
                                    <span class="balance_span"><?php echo e($mod?$mod->money:'未开通'); ?></span> <a
                                            href="javascript:;" class="api_check"
                                            data-uri="<?php echo e(route('member.api.check')); ?>?api_name=<?php echo e($v); ?>"><img
                                                src="<?php echo e(asset('/wap/images/user_refresh.png')); ?>" alt=""></a>
                                </div>
                            </dd>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </dl>
                    <form id="form1" name="form1" class="form-horizontal" action="<?php echo e(route('wap.post_transfer')); ?>"
                          method="post">

                        <dl class="set_card">
                            <dt>账户安全</dt>
                            <dd>
                                <div class="pull-left">
                                    转出账户
                                </div>
                                <select name="out_account" id="out_account" class="form-control">
                                    <option value="">--请选择--</option>
                                    <option value="1">中心账户</option>
                                    <option value="2">返水账户</option>
                                    <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    转入账户
                                </div>
                                <select name="in_account" id="in_account" class="form-control">
                                    <option value="">--请选择--</option>
                                    <option value="1">中心账户</option>
                                    <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </dd>
                            <dd>
                                <div class="pull-left">
                                    转账金额
                                </div>
                                <input class="pull-left" type="number" placeholder="最少 5 元" name="money" id="zz_money">
                            </dd>
                            <dd>
                                <input type="button" value="提交" class="submit_btn ajax-submit-btn">
                            </dd>
                        </dl>
                    </form>

                </div>

                
                    
                        
                        
                        
                        
                            
                            
                        
                    
                
            </div>
        </div>
    </div>
    <script>
        (function ($) {
            var $loading_img="<?php echo e(asset('/wap/images/loading.gif')); ?>";
            var $refresh_img="<?php echo e(asset('/wap/images/user_refresh.png')); ?>";
            $(function () {
                $('.api_check').on('click', function () {
                    var $img = $(this).find('img');
                    var $uri=$(this).attr('data-uri');
                    var $span=$(this).prev('.balance_span');
                    $img.attr('src',$loading_img);
                    $.get($uri, function (data) {
                        //data = JSON.parse(data)
                        $img.attr('src',$refresh_img);
                        $span.html(data.Data + '元');
                    });
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>