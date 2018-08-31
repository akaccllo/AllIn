<?php $__env->startSection('content'); ?>
    
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                
                    
                    
                    
                
                
                
                    
                        
                            
                        
                    
                
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    投注记录
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
                    <form action="" method="get">
                        <div class="line">
                            <span>平台</span>
                            <select name="api_type" id="api_type" required>
                                <option value="">--请选择--</option>
                                <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>" <?php if($api_type == $k): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button class="submit_btn" style="margin-top: 0;" type="submit">查询</button>
                    </form>
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                        <tr class="tic">
                            <td width="15%">平台</td>
                            <td width="15%">有效</td>
                            <td width="15%">投注</td>
                            <td width="15%">输赢</td>
                            <td width="40%">时间</td>
                        </tr>
                        <?php if($data->total() > 0): ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($_api_list[$item->api_type]); ?></td>
                                    <td><?php echo e($item->validBetAmount); ?></td>
                                    <td><?php echo e($item->betAmount); ?></td>
                                    <td><?php echo e($item->netAmount - $item->betAmount); ?></td>
                                    <td><?php echo e($item->betTime); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">暂无投注记录！</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        <tr>
                            <?php echo $data->appends(['api_type' => $api_type])->links(); ?>

                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('wap.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('wap.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>