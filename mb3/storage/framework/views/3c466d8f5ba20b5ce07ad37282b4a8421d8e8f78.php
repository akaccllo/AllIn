<?php $__env->startSection('content'); ?>

     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">代理列表</h3>
             </div>
             <div class="panel-body">
                 

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th class="text-center">用户名</th>
                         <th  style="width: 20%">真实姓名/注册时间</th>
                         <th  style="width: 10%">代理/上级</th>
                         <th  style="width: 10%">手机/邮箱</th>
                         <th  style="width: 10%">状态</th>
                         <th  style="width: 20%">代理链接</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->name); ?>

                             </td>
                             <td>
                                 <?php echo e($item->real_name); ?><br>
                                 <?php echo e($item->created_at); ?>

                             </td>
                             <td>
                                 <?php if($item->is_daili == 1): ?>
                                     <span style="color: red">是</span>
                                 <?php else: ?>
                                     <span>否</span>
                                 <?php endif; ?>
                                 /<?php echo e(isset($item->top_member->name) ? $item->top_member->name : ''); ?>

                             </td>
                             <td>
                                 <?php echo e($item->phone); ?>/<?php echo e($item->email); ?>

                             </td>
                             <td>
                                 <?php echo \App\Models\Base::$MEMBER_STATUS_HTML[$item->status]; ?>

                             </td>
                             <td>

                                 <?php if($item->agent_uri): ?>
                                     <?php echo e($item->agent_uri); ?>

                                 <?php else: ?>
                                     <?php echo e($_system_config->site_domain?'http://'.$_system_config->site_domain.'/r?i='.$item->invite_code :route('web.register_one').'?i='.$item->invite_code); ?>

                                 <?php endif; ?>
                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     <?php echo $data->render(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('daili.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>