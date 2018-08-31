<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">佣金发放记录</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.daili_money_log.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th>代理名称</th>
                         <th style="width: 10%">盈利情况</th>
                         <th style="width: 10%">佣金金额</th>
                         <th style="width: 15%">备注</th>
                         <th style="width: 15%">最后发放佣金月份</th>
                         <th style="width: 15%">发送时间</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->member->name); ?>

                             </td>
                             <td>
                                 <?php echo e($item->yl_money); ?>

                             </td>
                             <td>
                                 <?php echo e($item->money); ?>

                             </td>
                             <td>
                                 <?php echo e($item->remark); ?>

                             </td>
                             <td>
                                 <?php echo e($item->last_month); ?>月
                             </td>
                             <td>
                                 <?php echo e($item->created_at); ?>

                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <tfoot>
                     <tr>
                         <td><strong style="color: red">总合计</strong></td>
                         <td></td>
                         <td><strong style="color: red"><?php echo e($total_yl_money); ?></strong></td>
                         <td><strong style="color: red"><?php echo e($total_money); ?></strong></td>
                         <td colspan="3"></td>
                     </tr>
                     </tfoot>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                    <?php echo $data->appends(['member_id' => $member_id])->links(); ?>

                 </div>
                 </div>

             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>