<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">游戏记录</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.game_record.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 15%">注单号</th>
                        <th>账号</th>
                        
                        <th style="width: 5%">平台名称</th>
                        <th style="width: 5%">游戏类别</th>
                        <th style="width: 5%">输赢情况</th>
                        <th style="width: 5%">下注金额</th>
                        <th style="width: 5%">有效下注</th>
                        <th style="width: 10%;display: none;">彩票种类</th>
                        <th style="width: 10%">玩法名字</th>
                        <th style="width: 10%;display: none;">下注号码</th>
                        <th style="width: 20%">下注时间</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->billNo); ?>

                            </td>
                            <td>
                                <?php echo e(isset($item->member->name) ? $item->member->name : '已删除'); ?>

                            </td>
                            
                            
                            
                            <td>
                                <?php echo e(isset($item->api->api_name) ? $item->api->api_name : '已下线'); ?>

                            </td>
                            <td>
                                <?php echo e(config('platform.game_type')[$item->gameType]); ?>

                            </td>
                            <td>
                                <?php echo e($item->netAmount -  $item->betAmount); ?>

                            </td>
                            <td>
                                <?php echo e($item->betAmount); ?>

                            </td>
                            <td>
                                <?php echo e($item->validBetAmount); ?>

                            </td>
                            <td style="display: none;">
                                <?php if($item->api && $item->api->api_name == 'EG'): ?>
                                    <?php echo e($item->gameCode); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item->api && $item->api->api_name == 'EG'): ?>
                                    <?php echo e($item->tableCode); ?>

                                <?php else: ?>
                                    <?php echo e($item->gameCode); ?>

                                <?php endif; ?>
                            </td>
                            <td style="display: none;">
                                <?php echo e($item->stringex); ?><?php if($item->api && $item->api->api_name == 'EG'): ?><?php if($item->flag == 1): ?><span style="color: green">(已结算)</span> <?php else: ?> <span style="color: red">(未结算)</span> <?php endif; ?> <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($item->betTime); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tfoot>
                    <tr>
                        <td><strong style="color: red">总合计</strong></td>
                        <td colspan="3"></td>
                        <td><strong style="color: red"><?php echo e($total_netAmount); ?></strong></td>
                        <td><strong style="color: red"><?php echo e($total_betAmount); ?></strong></td>
                        <td><strong style="color: red"><?php echo e($total_validBetAmount); ?></strong></td>
                        <td colspan="4"></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['playerName' => $playerName, 'start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type, 'gameType' => $gameType])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>