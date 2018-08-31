<?php $__env->startSection('content'); ?>
    <div class="row">
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
    <style>
        .apiList{
            font-size: 18px;
            font-weight: bold;
            padding: 0 15px;
        }
        .apiList span{
            color: red;
            font-weight: normal;
        }
        .apiList img{
            margin:0 auto 15px;
            width: 50%;
            display: block;
        }
        .content-wrapper {
            background-color: #ffffff;
        }

    </style>
    <div class="row apiList">
        <?php $__currentLoopData = $apis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-2">
                <img src="<?php echo e(asset('/backstage/images')); ?>/<?php echo e(in_array($item->api_name, ['AB','ALLBET'])?'ALLBET': $item->api_name); ?>.jpg" alt="">
                <div class="text-center">
                    <?php echo e($item->api_name); ?>&nbsp;&nbsp;&nbsp;<span><?php echo e($item->api_money); ?></span><a href="#" data-uri="<?php echo e(route('api.credit')); ?>?api_name=<?php echo e($item->api_name); ?>" class="refresh" style="vertical-align: top"></a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo e(count($_online_member_array)); ?></h3>

                        <p>在线会员</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="<?php echo e(route('member.index')); ?>?on_line=1" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo e($today_recharge_count); ?></h3>

                        <p>今日充值笔数</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="<?php echo e(route('recharge.index')); ?>?status=1" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo e($today_drawing_count); ?></h3>

                        <p>今日出款笔数</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="<?php echo e(route('drawing.index')); ?>?status=1" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo e($today_dividend_count); ?></h3>

                        <p>今日送出红利笔数</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="<?php echo e(route('dividend.index')); ?>" class="small-box-footer">查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo e($today_register_count); ?></h3>

                        <p>今日注册人数</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="javascript:;" class="small-box-footer">平台总注册（<?php echo e($total_register_count); ?>）</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo e($today_recharge_sum); ?></h3>

                        <p>今日充值金额</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="javascript:;" class="small-box-footer">平台总充值（<?php echo e($total_recharge_sum); ?>）</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo e($today_drawing_sum); ?></h3>

                        <p>今日出款金额</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="javascript:;" class="small-box-footer">平台总出款（<?php echo e($total_drawing_sum); ?>） </a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo e($today_dividend_sum); ?></h3>

                        <p>今日送出红利金额</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="javascript:;" class="small-box-footer">平台总红利 （<?php echo e($total_dividend_sum); ?>）</a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script>
        $(function(){
            $('.refresh').on('click',function(){
                var _this=$(this);
                var pos = _this.prev('span');
//                 var money_span = _this.parent('p').next().find('span');
                _this.css({
                    'background':'url(<?php echo e(asset("/web/images/h-u-loading2.gif")); ?>) no-repeat center center'
                })
                $.ajax({
                    type : 'GET',
                    url : _this.attr('data-uri'),
                    data : '',
                    contentType : "application/json; charset=utf-8",
                    success : function(data){

                        _this.css({
                            'background':'url(<?php echo e(asset("/web/images/bg-ico.png")); ?>) no-repeat center center',
                            'background-position': '-80px -102px'
                        })
                        if (data.Code != 0)
                        {
                            alert(data.Message);
                            return ;
                        }
                        pos.html(data.Data+'元');
                    },
                    error: function (err, status) {
                        console.log(err)
                    }
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>