<?php $__env->startSection('content'); ?>
    <div class="userbasic_head">
        <a href="<?php echo e(route('member.finance_center')); ?>" class="active">会员存款</a>
        <a href="<?php echo e(route('member.member_drawing')); ?>" >会员提款</a>
        <a href="<?php echo e(route('member.indoor_transfer')); ?>">户内转账</a>
        
    </div>

    <!--第二个页面开始-->
    <div class="userbasic_body">
        <div class="bank_tips">温馨提示: </div>
        <div class="pay_way_wrap">
            <form action="<?php echo e(route('pay_scan')); ?>" method="post" target="_blank">
                <?php echo csrf_field(); ?>

                <div class="pay_way_line">
                    <div class="tit" style="padding-top: 36px;">二维码类型</div>
                    <div class="con">
                        <select name="typeId" required>
                            
                            <option value="2">微信</option>
                            <option value="3">QQ扫码</option>
                            
                        </select>
                    </div>
                </div>
                <div class="pay_way_line">
                    <div class="tit">转账金额</div>
                    <div class="con">
                        <p><input type="text" class="inp" name="amount" required> 元</p>
                    </div>
                </div>
                <div class="pay_way_line">
                    <div class="tit"></div>
                    <div class="con">
                        <button type="submit" class="account_save">提 交</button> <a href="<?php echo e(route('member.finance_center')); ?>" class="account_save">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('member.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>