<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">下线会员输赢记录</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('daili.member_offline_game_record.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>账号</th>
                        <th style="width: 20%">平台账号</th>
                        <th style="width: 10%">平台名称</th>
                        <th style="width: 10%">输赢情况</th>
                        <th style="width: 10%">下注金额</th>
                        <th style="width: 10%">有效下注</th>
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
                                <?php echo e($item->playerName); ?>

                            </td>
                            <td>
                                <?php echo e($item->api_type); ?>

                            </td>
                            <td>
                                <?php echo e($item->netAmount - $item->betAmount); ?>

                            </td>
                            <td>
                                <?php echo e($item->betAmount); ?>

                            </td>
                            <td>
                                <?php echo e($item->validBetAmount); ?>

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
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['name' => $name, 'start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
    <script>
        var start = {
            elem: '#start_at',
            format: 'YYYY-MM-DD hh:mm:ss',
            //min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_at',
            format: 'YYYY-MM-DD 23:59:59',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('daili.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>