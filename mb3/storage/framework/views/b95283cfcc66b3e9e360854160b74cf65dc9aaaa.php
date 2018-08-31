<?php $__env->startSection('content'); ?>
    
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    在线支付
                </div>
                <div class="m_userCenter-line"></div>
                <img src="<?php echo e(asset('/wap/images/pay_online_bg.jpg')); ?>" alt="" style="max-width: 100%;margin-top: 8px;">
                <div class="wrap">
                    <?php if($_system_config->is_thirdpay_on == 0): ?>
                    
                        
                        
                            
                            
                        
                    
                    <div align="center" class="pay-style">
                        <!-- 扫码支付-->
                        <a href="<?php echo e(route('wap.third_pay_scan')); ?>">
                            <img src="<?php echo e(asset('/wap/images/m_scan.png')); ?>" class="pic"/>
                            <div class="text">H5支付</div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($_system_config->is_bankpay_on == 0): ?>
                    <div align="center" class="pay-style">
                        <!-- 银行卡转账-->
                        <a href="<?php echo e(route('wap.bank_pay')); ?>">
                            <img src="<?php echo e(asset('/wap/images/m_card.png')); ?>" class="pic"/>
                            <div class="text">银行卡转账</div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($_system_config->is_wechat_on == 0): ?>
                        <div align="center" class="pay-style">
                            <!-- 微信转账-->
                            <a href="<?php echo e(route('wap.weixin_pay')); ?>">
                                <img src="<?php echo e(asset('/wap/images/m_weixinpay.png')); ?>" class="pic"/>
                                <div class="text">微信转账</div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if($_system_config->is_alipay_on == 0): ?>
                        <div align="center" class="pay-style">
                            <!-- 支付宝转账-->
                            <a href="<?php echo e(route('wap.ali_pay')); ?>">
                                <img src="<?php echo e(asset('/wap/images/m_alipay.png')); ?>" class="pic"/>
                                <div class="text">支付宝转账</div>
                            </a>
                        </div>
                    <?php endif; ?>
                        <?php if($_system_config->is_qq_on == 0): ?>
                            <div align="center" class="pay-style">
                                <!-- 支付宝转账-->
                                <a href="<?php echo e(route('wap.qq_pay')); ?>">
                                    <img src="<?php echo e(asset('/wap/images/m_scan.png')); ?>" class="pic"/>
                                    <div class="text">QQ扫码账</div>
                                </a>
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>