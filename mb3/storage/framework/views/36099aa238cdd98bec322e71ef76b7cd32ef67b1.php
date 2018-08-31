<?php $__env->startSection('content'); ?>
    
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                
                    
                    
                    
                
                
                
                    
                        
                            
                        
                    
                
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    代理中心
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo dy_center" style="padding-top: 0;">
                    <dl style="margin-top: 10px" class="dy_center_info">
                        <dt>
                            会员账户
                        </dt>
                        <dd>
                            <div class="pull-left">
                                推广域名
                            </div>
                            <div class="pull-right">
                                <?php if($_member->is_daili == 1): ?>
                                    <span id="url">
                                        <?php if($_member->agent_uri): ?>
                                            <?php echo e($_member->agent_uri); ?>

                                        <?php else: ?>
                                            <?php echo e(route('web.register_one').'?i='.$_member->invite_code); ?>

                                        <?php endif; ?>
                                    </span>
                                    <span class="btn" data-clipboard-target="#url"
                                          style="color: #e4393c;padding-right: 0">复制</span>
                                <?php else: ?>
                                    <?php
                                    $apply = '';
                                    if (count($_member->daili_apply) > 0)
                                        $apply = $_member->daili_apply()->orderBy('created_at', 'desc')->first();
                                    ?>
                                    <?php if($apply && $apply->status == 0): ?>
                                        <span style="color: red;">您的代理资格审批中</span>
                                    <?php elseif($apply && $apply->status == 2): ?>
                                        <span style="color: red;">申请失败</span>
                                        <a href="<?php echo e(route('wap.agent_apply')); ?>" class="submit_btn text-center">重新申请</a>
                                    <?php elseif($apply && $apply->status == 1): ?>
                                        <span id="url">
                                            <?php if($_member->agent_uri): ?>
                                                <?php echo e($_member->agent_uri); ?>

                                            <?php else: ?>
                                                <?php echo e(route('web.register_one').'?i='.$_member->invite_code); ?>

                                            <?php endif; ?></span>
                                        <span class="btn" data-clipboard-target="#url"
                                              style="color: #e4393c;padding-right: 0">复制</span>
                                    <?php else: ?>
                                        <span style="color: red;">您还不是代理</span>
                                        <a href="<?php echo e(route('wap.agent_apply')); ?>" class="submit_btn text-center">立即申请</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">
                                真实姓名
                            </div>
                            <div class="pull-right">
                                <?php echo e($_member->real_name); ?>

                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">
                                QQ
                            </div>
                            <div class="pull-right">
                                <?php echo e($_member->qq); ?>

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
                            <div class="pull-left">银行账户</div>
                            <div class="pull-right">
                                <?php if($_member->bank_card): ?>
                                    <?php echo e($_member->bank_card); ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('wap.bind_bank')); ?>" class="c_blue">未设置</a>
                                <?php endif; ?>
                            </div>
                        </dd>
                    </dl>
                    <dl style="margin-top: 10px">
                        <dd>
                            <a href="<?php echo e(route('wap.daili_money_log')); ?>" class="clear">
                                <div class="pull-left">
                                    佣金发放记录
                                </div>
                                <i class="icon-angle-right"></i>
                            </a>
                        </dd>
                    </dl>
                    <dl style="margin-top: 10px">
                        <dd>
                            <a href="<?php echo e(route('wap.member_offline_sy')); ?>" class="clear">
                                <div class="pull-left">
                                    会员输赢报表
                                </div>
                                <i class="icon-angle-right"></i>
                            </a>
                        </dd>
                    </dl>
                    <dl style="margin-top: 10px">
                        <dd>
                            <a href="<?php echo e(route('wap.member_offline')); ?>" class="clear">
                                <div class="pull-left">
                                    下线会员
                                </div>
                                <i class="icon-angle-right"></i>
                            </a>
                        </dd>
                    </dl>
                    <dl>
                        <dd>
                            <a href="<?php echo e(route('wap.member_offline_recharge')); ?>" class="clear">
                                <div class="pull-left">
                                    下线会员存款记录
                                </div>
                                <i class="icon-angle-right"></i>
                            </a>
                        </dd>
                    </dl>
                    <dl>
                        <dd>
                            <a href="<?php echo e(route('wap.member_offline_drawing')); ?>" class="clear">
                                <div class="pull-left">
                                    下线会员提款记录
                                </div>
                                <i class="icon-angle-right"></i>
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/laydate.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/wap/js/clipboard.min.js')); ?>"></script>
    <script>
        var clipboard = new Clipboard('.btn');

        clipboard.on('success', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);

            e.clearSelection();
        });

        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>