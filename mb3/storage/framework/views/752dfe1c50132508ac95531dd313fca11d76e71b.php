<?php $__env->startSection('content'); ?>
<div class="userbasic_head">
    <a href="<?php echo e(route('member.service_center')); ?>" class="active" >公告信息</a>
    <a href="<?php echo e(route('member.complaint_proposal')); ?>" >投诉建议</a>
</div>
<div class="userbasic_body">
    <ul class="noticeList">
        <?php $__currentLoopData = $system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li <?php if($k == 0): ?>class="active"<?php endif; ?>>
                <h5><?php echo e($v->title); ?></h5>
                <p>✿<?php echo e($v->content); ?></p>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('member.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>