<?php $__env->startSection('content'); ?>
<div class="userbasic_head">
    <a href="<?php echo e(route('member.userCenter')); ?>" class="active">基本信息</a>
    <a href="<?php echo e(route('member.bank_load')); ?>">银行资料</a>
    
    <a href="<?php echo e(route('member.message_list')); ?>">站内消息</a>
</div>
<div class="userbasic_con" style="padding-top:0">
    <div class="bank_tips">温馨提示：手机验证后，可自行修改银行相关信息（开户姓名无法修改;绑定的银行卡必须和注册绑定姓名一致，否则无法提款!）</div>
    <div class="basic_module">
        <div class="basic_left">
            <p class="tips">您好，<span class="name"><?php echo e($_member->name); ?></span><span class="level_img"><img src="<?php echo e(asset('/web/images/live-ico.png')); ?>"></span></p>
            <p class="level_tips">您的账户安全等级：<span class="level_line"><span class="level" levelNum='30%'></span></span>低 <a class="change_psw" href="<?php echo e(route('member.login_psw')); ?>">更换密码</a></p>
            <div class="basic_modify">
                
                
                
                <a href="<?php echo e(route('member.bank_load')); ?>" class="after"><i class="iconfont ">&#xe649;</i>绑定银行卡</a>
            </div>
        </div>
        <div class="basic_right">
            
            
            
        </div>
    </div>
</div>
<ul class="gameroom_list">
        <?php
            $own_api_list = $_member->apis()->pluck('api_id')->toArray();
        ?>
        <?php $__currentLoopData = $api_mod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $mod = '';
                if (in_array($item->id, $own_api_list))
                        $mod = $_member->apis()->where('api_id', $item->id)->first();
                ?>
        <li>
            <p class="name api_name" data-uri="<?php echo e(route('member.api.check')); ?>?api_name=<?php echo e($item->api_name); ?>" data-name="<?php echo e($_member->name); ?>"><?php echo e($item->api_title); ?> <span class="pos"><?php if($mod): ?> <?php echo e($mod->money); ?>  <?php else: ?> N/A <?php endif; ?></span><a class="refresh" href="javascript:void(0)" data-uri="<?php echo e(route('member.api.check')); ?>?api_name=<?php echo e($item->api_name); ?>"></a></p>
            <p class="account">游戏账号：<span class="viceColor" data-username="已开通"><?php if($mod): ?> 已开通  <?php else: ?> 未开通 <?php endif; ?></span></p>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
<div class="basic_info">
    <h3 class="head_line">
        <span class="tit">个人资料</span>
    </h3>
    <ul class="list">
        <li>
            <span class="title">姓名</span>
            <?php echo e($_member->real_name); ?>

        </li>
        
            
            
        
        <li>
            <span class="title">联系电话</span>
            <?php echo e($_member->phone); ?>

        </li>
        <li>
            <span class="title">邮箱地址</span>
            <?php echo e($_member->email); ?>

        </li>
        <li>
            <span class="title">联系QQ</span>
            <?php echo e($_member->qq); ?>

        </li>
        
            
            
        
    </ul>
</div>
<script>
    $(function(){
        $('.refresh').on('click',function(){
            var _this=$(this);
            var pos = _this.parent('p').find('span');
            var money_span = _this.parent('p').next().find('span');
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
                    money_span.html(money_span.attr('data-username'))
                    //console.log(data)
                },
                error: function (err, status) {
                    console.log(err)
                }
            })
        })

        $('.level').each(function(){
            var levelNum=$(this).attr('levelNum');
            $(this).animate({
                'width':levelNum
            },800)
        });

        //异步开通帐号
//        $('.api_name').each(function(){
//            var _this = $(this);
//            var url = _this.attr('data-uri');
//            //var _li = _this.parent('li');
//            var pos = _this.find('span');
//            var money_span = _this.next().find('span');
//            $.ajax({
//                type : 'GET',
//                url : url,
//                data : '',
//                contentType : "application/json; charset=utf-8",
//                success : function(data){
//
////                    if (data.Code != 0)
////                    {
////                        alert(data.Message);
////                        return ;
////                    }
//                    if (data.Code == 0)
//                    {
//                        pos.html(data.Data+'元');
//                        money_span.html(money_span.attr('data-username'))
//                    }
//
//                    //console.log(data)
//                },
//                error: function (err, status) {
//                    console.log(err)
//                }
//            })
//        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('member.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>