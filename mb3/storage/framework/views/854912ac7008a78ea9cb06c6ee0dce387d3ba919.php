<?php $__env->startSection('content'); ?>
<div class="userbasic_head">
    <a href="<?php echo e(route('member.finance_center')); ?>" class="active">会员存款</a>
    <a href="<?php echo e(route('member.member_drawing')); ?>" >会员提款</a>
    <a href="<?php echo e(route('member.indoor_transfer')); ?>">户内转账</a>
    
</div>
<div class="userbasic_body">
    <div class="bank_tips">温馨提示: 如当前支付方式未能支付成功，请您尝试其他支付方式进行支付！</div>
    <div class="account_form">
        <form action="<?php echo e(route('member.recharge_type')); ?>" method="get">
            <input type="hidden" id="type" name="type">
            <div class="line">
                <div class="tit">
                    转账存款
                </div>
                <div class="ways">
                    <div class="account_index">
                        <?php if($_system_config->is_wechat_on == 0): ?>
                          <span class="ways_box wechar_pay" data-type="1">
                            <img src="<?php echo e(asset('/web/images/account-icon4.png')); ?>" class="icon">微支付
                            <em class="check"></em>
                          </span>
                        <?php endif; ?>
                        <?php if($_system_config->is_alipay_on == 0): ?>
                        <span class="ways_box wechar_pay" data-type="2">
                            <img src="<?php echo e(asset('/web/images/account-icon3.png')); ?>" class="icon">支付宝扫码
                            <em class="check"></em>
                          </span>
                        <?php endif; ?>

                            <?php if($_system_config->is_qq_on == 0): ?>
                                <span class="ways_box card_pay" data-type="6">
                            <img src="<?php echo e(asset('/web/images/account-icon7.png')); ?>" class="icon">QQ扫码
                            <em class="check"></em>
                          </span>
                            <?php endif; ?>
                        <?php if($_system_config->is_bankpay_on == 0): ?>
                           <span class="ways_box card_pay" data-type="3">
                            <img src="<?php echo e(asset('/web/images/account-icon6.png')); ?>" class="icon">银行卡转账
                            <em class="check"></em>
                          </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($_system_config->is_thirdpay_on == 0): ?>
            <div class="line">
                <div class="tit">
                    在线存款
                </div>
                <div class="ways">
                    <div class="account_index">
                            <span class="ways_box card_pay" data-type="4">
                            <img src="<?php echo e(asset('/web/images/account-icon6.png')); ?>" class="icon">网银在线
                            <em class="check"></em>
                            </span>
                            <span class="ways_box card_pay" data-type="5">
                        <img src="<?php echo e(asset('/web/images/account-icon7.png')); ?>" class="icon">第三方扫码支付
                        <em class="check"></em>
                        </span>

                        <span class="ways_box card_pay" data-type="7">
                                <img src="<?php echo e(asset('/web/images/account-icon6.png')); ?>" class="icon">网银快捷支付
                                <em class="check"></em>
                                </span>

                    </div>
                </div>
            </div>
            <?php endif; ?>
            
                
                    
                    
                    
                
                
                    
                    
                    
                
            
            <div class="line">
                <div class="tit"></div>
                <button type="button" class="ajax-submit-without-confirm-btn account_save">提交</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script>
        $(function(){
            $('.user_con').on('click','.ways .show_bank',function(){
                $('.choosebank').show();
            })
            $('.user_con').on('click','.account_index .show_bank',function(){
                $('.choosebank').show();
                $('.green_pass').hide();
            })
            $('.user_con').on('click','.account_index .ways_box',function(){
                $('.account_index .ways_box').removeClass('active');
                $(this).addClass('active');
                $('#type').val($(this).attr('data-type'))
            })
            $('.user_con').on('click','.account_index .green_way',function(){
                $('.choosebank').show();
                $('.green_pass').show();
                $('.account_form .green_tips').show();

            })
            $('.user_con').on('click','.account_index .wechar_pay',function(){
                $('.choosebank').hide();
                $('.green_pass').hide();

            })
        })
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('member.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>