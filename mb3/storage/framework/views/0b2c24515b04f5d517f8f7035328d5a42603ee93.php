<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo e(route('member.checkBalance', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">接口余额</a></li>
                <li role="presentation" class="active"><a href="<?php echo e(route('member.showGameRecordInfo', ['id' => $id])); ?>" aria-controls="home" role="tab" data-toggle="tab">历史输赢</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showRechargeInfo', ['id' => $id])); ?>" aria-controls="profile" role="tab" data-toggle="tab">历史充值</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDrawingInfo', ['id' => $id])); ?>" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDividendInfo', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">历史红利</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showTransfer', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">平台转账记录</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">历史输赢</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="margin-bottom: 10px;">
                        <form action="" method="get" id="searchForm">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">平台类型</span>
                                        <select name="api_type" id="api_type" class="form-control">
                                            <option value="">--请选择--</option>
                                            <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php if($api_type == $k): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">开始时间</span>
                                        <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo e($start_at); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">结束时间</span>
                                        <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo e($end_at); ?>" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-lg-2 pull-right">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                                        <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th>账号</th>
                            
                            <th style="width: 5%">平台名称</th>
                            <th style="width: 10%">游戏类别</th>
                            <th style="width: 10%">输赢情况</th>
                            <th style="width: 10%">下注金额</th>
                            <th style="width: 10%">有效下注</th>
                            <th style="width: 10%">彩票种类</th>
                            <th style="width: 10%">玩法名字</th>
                            <th style="width: 10%">下注号码</th>
                            <th style="width: 20%">下注时间</th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->id); ?>

                                </td>
                                <td>
                                    <?php echo e(isset($item->member->name) ? $item->member->name : '已删除'); ?>

                                </td>
                                
                                
                                
                                <td>
                                    <?php echo e($item->api->api_name); ?>

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
                                <td>
                                    <?php if($item->api->api_name == 'EG'): ?>
                                        <?php echo e($item->gameCode); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($item->api->api_name == 'EG'): ?>
                                        <?php echo e($item->tableCode); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($item->stringex); ?><?php if($item->api->api_name == 'EG'): ?><?php if($item->flag == 1): ?><span style="color: green">(已结算)</span> <?php else: ?> <span style="color: red">(未结算)</span> <?php endif; ?> <?php endif; ?>
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
                            <?php echo $data->appends(['start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type])->links(); ?>

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>