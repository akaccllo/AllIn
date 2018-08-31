<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) --><div class="row">
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-red text-center">
                    <div class="inner">
                        <h4>会员监控</h4>

                        <p>监控同IP下登录的会员</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="<?php echo e(route('monitor.index')); ?>?type=1" class="small-box-footer">查看</a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-red text-center">
                    <div class="inner">
                        <h4>大额监控</h4>

                        <p>监控大额转入/转出行为的会员</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="<?php echo e(route('monitor.index')); ?>?type=2" class="small-box-footer">查看</a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-red text-center">
                    <div class="inner">
                        <h4>套利监控</h4>

                        <p>监控频繁转出行为的会员</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="<?php echo e(route('monitor.index')); ?>?type=3" class="small-box-footer">查看</a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <?php if($type == 1): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员监控</h3>
            </div>
            <div class="panel-body">

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 60%">会员IP监控</th>
                        <th style="width: 60%">会员个数</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->user_count > 1): ?>
                        <tr>
                            <td>
                                <?php echo e($item->ip); ?>

                            </td>
                            <td>
                                <?php echo e($item->user_count); ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                    
                        
                            
                        
                        
                            
                        
                    
            </div>
        </div>
            <?php elseif($type==2): ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">大额监控</h3>
                </div>
                <div class="panel-body">
                    

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
                                    <?php echo e($item->member->name); ?>

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
                        
                        
                            
                            
                            
                            
                            
                        
                        
                    </table>
                    <div class="clearfix">
                        <div class="pull-left" style="margin: 0;">
                            <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                        </div>
                        <div class="pull-right" style="margin: 0;">
                            <?php echo $data->appends(['type' => $type])->render(); ?>

                        </div>
                    </div>

                </div>
            </div>
            <?php elseif($type == 3): ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">套利监控</h3>
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 60%">用户名</th>
                            <th style="width: 30%">转出次数</th>
                            <th style="width: 10%">操作</th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->username); ?>

                                </td>
                                <td>
                                    <?php echo e($item->user_count); ?>

                                </td>
                                <td>
                                    <a target="_blank" href="<?php echo e(route('transfer.index')); ?>?name=<?php echo e($item->username); ?>&transfer_type=1&start_at=<?php echo e(date('Y-m-d')); ?>&end_at=<?php echo e(date('Y-m-d 23:59:59')); ?>" class="btn btn-info btn-xs">查看</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>