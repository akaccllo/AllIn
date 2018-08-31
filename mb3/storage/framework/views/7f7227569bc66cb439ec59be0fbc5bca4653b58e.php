<?php $__env->startSection('content'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('/web/css/9388/live.css')); ?>">

  <!--banner-->
  <div class="banner" style="height: 355px;margin-top: 0;">
    <div class="bd">
      <ul>
        <li>
          <img src="<?php echo e(asset('/web/images/zhenren/banner.jpg')); ?>" alt="">
        </li>
      </ul>
    </div>
  </div>

  <!--notice-->


  <!--notice-->
  <div class="notice-row">
    <div class="noticeBox">
      <div class="w">
        <div class="title">
          最新公告：
        </div>
        <div class="bd2">
          <div id="memberLatestAnnouncement" style="cursor:pointer;color:#fff;">
            <marquee id="mar0" scrollamount="3" scrolldelay="100" direction="left"
                     onmouseover="this.stop();" onmouseout="this.start();">
              <?php $__currentLoopData = $_system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span>~<?php echo e($v->title); ?>~</span>
                <span><?php echo e($v->content); ?></span>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </marquee>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="zhenrenPage">
    <div class="zhenren w">
      <ul>
        <?php if(in_array('NAG', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo2.png')); ?>" alt=""></div>
            <div class="xx2">日本AV荷官女郎<br>为您发牌</div>
            <div class="xx4">
              <span>AG 女优厅</span>
              <a href="javascript:void(0);" title="AG"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/2.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('AG', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo2.png')); ?>" alt=""></div>
            <div class="xx2">日本AV荷官女郎<br>为您发牌</div>
            <div class="xx4">
              <span>AG 女优厅</span>
              <a href="javascript:void(0);" title="AG"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=ag&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/2.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('BBIN', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo3.png')); ?>" alt=""></div>
            <div class="xx2">亚洲最流行的<br>真人娱乐</div>
            <div class="xx4">
              <span>BBIN 旗舰厅</span>
              <a href="javascript:void(0);" title="BBIN"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=bbin&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/3.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('AB', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo4.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善<br>的娱乐平台</div>
            <div class="xx4">
              <span>AB 视讯厅</span>
              <a href="javascript:void(0);" title="AB"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ab.playGame')); ?>','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/4.png')); ?>"></div>
          </li>
        <?php endif; ?>
       <!--  <?php if(in_array('MG', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo6.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善<br>的娱乐平台</div>
            <div class="xx4">
              <span>MG 视讯厅</span>
              <a href="javascript:void(0);" title="MG"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=4','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/6.png')); ?>"></div>
          </li>
        <?php endif; ?> -->
        <?php if(in_array('BG', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo10.png')); ?>" alt=""></div>
            <div class="xx2">体验英式赌场的<br>视觉冲击</div>
            <div class="xx4">
              <span>BG 旗舰厅</span>
              <a href="javascript:void(0);" title="BG"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=bg&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/7.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('PT', $_api_list)): ?>
          <li style="display: none;">
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo11.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>PT 视讯厅</span>
              <a href="javascript:void(0);" title="PT"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=pt&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/8.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('CG', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo12.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>CG 视讯厅</span>
              <a href="javascript:void(0);" title="CG"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('cg.playGame')); ?>','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/9.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('SA', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logosa.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>SA 视讯厅</span>
              <a href="javascript:void(0);" title="SA"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=sa&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/5.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('GD', $_api_list)): ?>
          <li style="">
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logogd.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>GD 视讯厅</span>
              <a href="javascript:void(0);" title="GD"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=gd&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/11.png')); ?>"></div>
          </li>
        <?php endif; ?>
         <?php if(in_array('DG', $_api_list)): ?>
          <li style="">
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logodg.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>DG 视讯厅</span>
              <a href="javascript:void(0);" title="DG"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=dg&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/8.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('OG', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo7.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>OG 视讯厅</span>
              <a href="javascript:void(0);" title="OG"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=og&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/12.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('SUNBET', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logosb.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>申博视讯厅</span>
              <a href="javascript:void(0);" title="SUNBET"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=sunbet&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/1.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('EBET', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logoebet.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>EBET视讯厅</span>
              <a href="javascript:void(0);" title="EBET"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ebet.playGame')); ?>','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/10.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <?php if(in_array('ALLBET', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo4.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>ALLBET </span>
              <a href="javascript:void(0);" title="ALLBET"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=allbet&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/9.png')); ?>"></div>
          </li>
        <?php endif; ?>
          <?php if(in_array('LEBO', $_api_list)): ?>
          <li>
            <div class="xx1"><img src="<?php echo e(asset('/web/images/zhenren/logo1.png')); ?>" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>LEBO </span>
              <a href="javascript:void(0);" title="LEBO"
                 <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=lebo&playType=2','','width=1024,height=768')"
                 <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>进入游戏</a>
            </div>
            <div class="xx5"><img src="<?php echo e(asset('/web/images/zhenren/4.png')); ?>"></div>
          </li>
        <?php endif; ?>
        <li class="more">

        </li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>

  <div class="notice_layer">
    <h3>公告详情 <span class="close"></span></h3>
    <div class="notice_con">
      <?php $__currentLoopData = $_system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="module">
          <h4><?php echo e($v->title); ?></h4>
          <p>✿<?php echo e($v->content); ?></p>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
  </div>
  <script>


    (function ($) {
      $(function () {

        //公告
        $('#mar0').on('click', function () {
          var notice_index = layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: ['680px'],
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: $('.notice_layer')
          });

          $('.notice_layer').on('click', '.close', function () {
            layer.close(notice_index)
          })
        })

      })
    })(jQuery)
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>