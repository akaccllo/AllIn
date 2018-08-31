<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">平台转账记录</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.transfer.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>用户名称</th>
                        <th style="width: 10%">转换类型</th>
                        <th style="width: 10%">转出账户</th>
                        <th style="width: 10%">转入账户</th>
                        <th style="width: 10%">转换金额</th>
                        <th style="width: 10%">红利金额</th>
                        <th style="width: 10%">转账时间</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                              <?php  if(!empty($item->member->name)){ ?>  <?php echo e($item->member->name); ?> <?php  } ?>
                            </td>
                            <td>
                                <?php echo e(config('platform.transfer_type')[$item->transfer_type]); ?>

                            </td>
                            <td>
                                <?php echo e($item->transfer_out_account); ?>

                            </td>
                            <td>
                                <?php echo e($item->transfer_in_account); ?>

                            </td>
                            <td>
                                <?php echo e($item->money); ?>

                            </td>
                            <td>
                                <?php echo e($item->diff_money); ?>

                            </td>
                            <td>
                                <?php echo e($item->created_at); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tfoot>
                    <tr>
                        <td><strong style="color: red">总合计</strong></td>
                        <td colspan="4"></td>
                        <td><strong style="color: red"><?php echo e($total_money); ?></strong></td>
                        <td><strong style="color: red"><?php echo e($total_diff_money); ?></strong></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['name' => $name, 'transfer_type' => $transfer_type, 'transfer_in_account' => $transfer_in_account, 'transfer_out_account' => $transfer_out_account, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>