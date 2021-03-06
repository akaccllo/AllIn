<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员红利列表</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.dividend.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">用户</th>
                        <th style="width: 15%">红利类型</th>
                        <th style="width: 10%">金额</th>
                        <th>描述</th>
                        <th style="width: 10%">状态</th>
                        <th style="width: 10%">发放时间</th>
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
                                <?php echo e(config('platform.dividend_type')[$item->type]); ?>

                            </td>
                            <td>
                                <?php echo e($item->money); ?>

                            </td>
                            <td>
                                <?php echo e($item->describe); ?>

                            </td>
                            <td>
                                <strong style="color: green">发放成功</strong>
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
                            <td></td>
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
                        <?php echo $data->appends(['name' => $name, 'type' =>$type, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>