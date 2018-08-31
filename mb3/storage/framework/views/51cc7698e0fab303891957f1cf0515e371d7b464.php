<?php $__env->startSection('content'); ?>
    
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    会员资料
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo">
                    <dl>
                        <dt>账户安全</dt>
                        <dd>
                            <div class="pull-left">
                                会员账户
                            </div>
                            <div class="pull-right">
                                <?php echo e($_member->name); ?>

                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">手机号码</div>
                            <div class="pull-right">
                                <?php if($_member->phone): ?>
                                    <?php echo e($_member->phone); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.set_phone')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">注册时间</div>
                            <div class="pull-right"><?php echo e($_member->created_at); ?></div>
                        </dd>
                        <dd>
                            <div class="pull-left">最后登录时间</div>
                            <div class="pull-right"><?php echo e($_member->last_login_time); ?></div>
                        </dd>
                    </dl>
                    <dl>
                        <dt>财务信息</dt>
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
                        <?php $__currentLoopData = $api_mod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $mod = '';
                            if (in_array($item->id, $own_api_list))
                                $mod = $_member->apis()->where('api_id', $item->id)->first();
                            ?>
                            <dd>
                                <div class="pull-left"><?php echo e($item->api_name); ?>余额</div>
                                <div class="pull-right">
                                    <span class="balance_span"><?php echo e($mod?$mod->money:'未开通'); ?></span> <a
                                            href="javascript:;" class="api_check"
                                            data-uri="<?php echo e(route('member.api.check')); ?>?api_name=<?php echo e($item->api_name); ?>"><img
                                                src="<?php echo e(asset('/wap/images/user_refresh.png')); ?>" alt=""></a>
                                </div>
                            </dd>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </dl>
                    <dl>
                        <dt>提现信息</dt>
                        <dd>
                            <div class="pull-left">开户姓名</div>
                            <div class="pull-right"><?php echo e($_member->real_name); ?></div>
                        </dd>
                        <dd>
                            <div class="pull-left">提款银行</div>
                            <div class="pull-right">
                                <?php if($_member->bank_name): ?>
                                    <?php echo e($_member->bank_name); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">银行账户</div>
                            <div class="pull-right">
                                <?php if($_member->bank_card): ?>
                                    <?php echo e($_member->bank_card); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">开户银行地址</div>
                            <div class="pull-right">
                                <?php if($_member->bank_address): ?>
                                    <?php echo e($_member->bank_address); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                    </dl>
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