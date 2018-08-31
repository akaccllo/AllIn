<?php $__env->startSection('content'); ?>
<!-- <link rel="stylesheet" type="text/css" href="/web/css/game.css"> -->
<style type="text/css">
    .notice{
            /*position: absolute;*/
    width: 100%;
    height: 49px;
    line-height: 49px;
    left: 0;
    bottom: 0;
    /*background: #000;*/
    background: rgba(0, 0, 0, 0.8);
    font-size: 14px;
    }
</style>   <div class="banner" style="height: 280px;margin-top: 0;">
    <div class="bd">
      <ul>
        <li style="background-image: url('');">
          <img src="<?php echo e(asset('/web/images/zhenren/dianzibanner2.jpg')); ?>" alt="">
        </li>
      </ul>
    </div>
  </div>
    <div class="body "  style="background: url(../../images/zhenren/bg.jpg) center bottom no-repeat #1B1B1B;">
        <div class="container tbbg-margin" style="padding-top: 0 !important">
         
            <div class="notice clear" style="margin-top:-52px;">
                <div class="notice-bg"></div>
                <div class="notice-title pullLeft">
                    <div class="notice-title_bg"></div>
                    <span class="bg-icon pullLeft"></span>
                    系统公告
                </div>
                <marquee id="mar0" scrollAmount="4" direction="left" onmouseout="this.start()"
                         onmouseover="this.stop()">
                    <?php $__currentLoopData = $_system_notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span>~<?php echo e($v->title); ?>~</span>
                        <span><?php echo e($v->content); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </marquee>
            </div>
            <style type="text/css">
                .game-list li{
                    margin: 8px;
                    width: 309px;
                    height: 364px;
                }
                #lobby>ul.game-list>li{
                    display: inline-block;
                }
                #lobby>ul.game-list{
                    padding: 20px;
                }
                .pt{
                    /*background-image: url('/web/gameimages/02.png');*/
                    /*background-repeat:no-repeat;*/
                }
            </style>
            <div class="egameslide wrapper" style="width: 1040px;margin: 0 auto;">
                <section id="lobby" ng-controller="LobbiesCtrl" class="ng-scope">
                    <ul class="game-list">
                        <?php if(in_array('PT', $_api_list)): ?>
                        <li game-box="" <?php if('PT' == $api_name): ?> class="on" <?php endif; ?>  ><a href="javascript:;"  <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=pt&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/02.png" /></a></li>
                        <?php endif; ?>
                         <?php if(in_array('MG', $_api_list)): ?>
                        <li game-box="" <?php if('MG' == $api_name): ?> class="on" <?php endif; ?> class="mg"><a href="javascript:;"  <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=mg&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/01.png" /></a></li>
                         <?php endif; ?>
                        <?php if(in_array('BBIN', $_api_list)): ?>
                        <li game-box="" <?php if('BBIN' == $api_name): ?> class="on" <?php endif; ?> class="bbin"><a href="javascript:;" <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=bbin&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/bb.png" /></a></li>
                        <?php endif; ?>
                         <?php if(in_array('SA', $_api_list)): ?>
                        <li style="display: none;" game-box="" <?php if('SA' == $api_name): ?> class="on" <?php endif; ?> class="sa"><a href="javascript:;"  <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=sa&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/01.png" /></a></li>
                           <?php endif; ?>
                               <?php if(in_array('AG', $_api_list)): ?>     
                        <li game-box="" class="ag"><a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=ag&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/04.png" /></a></li>
                             <?php endif; ?>  
                        <?php if(in_array('GPI', $_api_list)): ?>
                        <li game-box="" class="gpi"><a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=gpi&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/06.png" /></a></li>
                        <?php endif; ?>
                        <?php if(in_array('SG', $_api_list)): ?>
                        <li game-box="" class="sg"><a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=sg&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/sg.png" /></a></li>
                         <?php endif; ?>
                         <?php if(in_array('PP', $_api_list)): ?>
                        <li game-box="" class="pp"><a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=pp&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/pp.png" /></a></li>
                        <?php endif; ?>
                        <?php if(in_array('QT', $_api_list)): ?>
                        <li game-box="" class="qt"><a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=qt&playType=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>><img src="/web/gameimages/01.png" /></a></li>
                        <?php endif; ?>

                        
                    </ul>
                </section>
                <div class="hd" style="display: none;">
                    <ul>
                            <?php if(in_array('PT', $_api_list)): ?>
                                <li <?php if('PT' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=1','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">PT厅</p>
                                </a>

                                  
                                </li>
                            <?php endif; ?>

                        <?php if(in_array('MG', $_api_list)): ?>
                            <li <?php if('MG' == $api_name): ?> class="on" <?php endif; ?>>

                                <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=3','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-mg1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-mg2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">MG厅</p>
                                </a>

                                
                            </li>
                        <?php endif; ?>
                        <?php if(in_array('BBIN', $_api_list)): ?>
                            <li <?php if('BBIN' == $api_name): ?> class="on" <?php endif; ?>>

                                 <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=5','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-by1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-bb2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">BBIN厅</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(in_array('SA', $_api_list)): ?>
                            <li <?php if('SA' == $api_name): ?> class="on" <?php endif; ?> style="">
                                <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=7','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-sa1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-sa2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">SA厅</p>
                                </a>

                                
                            </li>
                        <?php endif; ?>
                        
                        <?php if(in_array('TTG', $_api_list)): ?>
                            <li <?php if('TTG' == $api_name): ?> class="on" <?php endif; ?>>

                                <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=11','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-ttg1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-ttg2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">TTG厅</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(in_array('AG', $_api_list)): ?>
                        <li <?php if('AG' == $api_name): ?> class="on" <?php endif; ?>>
                            <div class="last">
                                <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=8','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-ag1.png')); ?>" style="display: inline;">
                                    </p>
                                    <p class="tit">AG电子游戏</p>
                                </a>
                            </div>
                        </li>
                            
                        <?php endif; ?>
                        <!-- <?php if(in_array('GD', $_api_list)): ?>
                                <li <?php if('GD' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=13','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">GD厅</p>
                                </a>

                                  
                                </li>
                            <?php endif; ?>

                             <?php if(in_array('DG', $_api_list)): ?>
                                <li <?php if('DG' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=14','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">DG厅</p>
                                </a>

                                  
                                </li>
                            <?php endif; ?> -->
                            <?php if(in_array('GPI', $_api_list)): ?>
                                <li <?php if('GPI' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=15','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">GPI厅</p>
                                </a>
                                </li>
                            <?php endif; ?>
                             <?php if(in_array('SG', $_api_list)): ?>
                                <li <?php if('SG' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=16','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">SG厅</p>
                                </a>
                                </li>
                            <?php endif; ?>

                            <?php if(in_array('PP', $_api_list)): ?>
                                <li <?php if('PP' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=17','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">PP厅</p>
                                </a>
                                </li>
                            <?php endif; ?>
                             <?php if(in_array('QT', $_api_list)): ?>
                                <li <?php if('QT' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=18','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">QT厅</p>
                                </a>
                                </li>
                            <?php endif; ?>

                           <!--  <?php if(in_array('ISB', $_api_list)): ?>
                                <li <?php if('ISB' == $api_name): ?> class="on" <?php endif; ?>>
                                    <a href="javascript:;"
                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ng.playGame')); ?>?gametype=19','','width=1024,height=768')"
                                   <?php else: ?> onclick="return layer.msg('请先登录!',{icon:6})" <?php endif; ?>>
                                    <p class="pic">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt1.png')); ?>" class="default">
                                        <img src="<?php echo e(asset('/web/images/app-bg-pt2.png')); ?>" class="activepic">
                                    </p>
                                    <p class="tit">ISB厅</p>
                                </a>
                                </li>
                            <?php endif; ?> -->
                    </ul>
                </div>
                <div class="bd"  style="display: none;">
                    <?php if(in_array('PT', $_api_list) && 'PT' == $api_name): ?>
                        
                        <div class="module" style="display: none;">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="<?php echo e(asset('/web/images/pt-pic-bz.png')); ?>">PT厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>

                                    <div class="search_inp">
                                        <form action="<?php echo e(route('web.eGame')); ?>" method="GET">
                                            <input type="hidden" name="api_name" value="<?php echo e($api_name); ?>">
                                            <input type="text" class="inp" placeholder="请输入游戏名称" name="name" value="<?php echo e($gameName); ?>" required>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bodylist">
                                <div class="egame_list">
                                   <ul>
                                       <?php $__currentLoopData = $game_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <?php if($item->api_name == 'PT' && $item->client_type == 1): ?>
                                           <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                               <a href="javascript:;"
                                                  <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('pt.playGame')); ?>?gametype=<?php echo e($item->game_id); ?>','','width=1024,height=768')"
                                                  <?php else: ?> onclick="return alert('请先登录！')" <?php endif; ?>>
                                                   <?php $img_path = $item->img_path;?>
                                                   <img data-original="<?php echo e(asset("/web/images/games/pt/$img_path")); ?>" class="lazy">
                                                   <p class="collect"><?php echo e($item->name); ?></p>
                                                   <span class="button">开始游戏</span>
                                               </a>
                                           </li>
                                           <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('MG', $_api_list) && 'MG' == $api_name): ?>
                        
                        <div class="module" style="display: none;">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="<?php echo e(asset('/web/images/pt-pic-bz.png')); ?>">MG厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                    <div class="search_inp">
                                        <form action="<?php echo e(route('web.eGame')); ?>" method="GET">
                                            <input type="hidden" name="api_name" value="<?php echo e($api_name); ?>">
                                            <input type="text" class="inp" placeholder="请输入游戏名称" name="name" value="<?php echo e($gameName); ?>" required>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--MG-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        <?php $__currentLoopData = $game_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->api_name == 'MG'): ?>
                                            <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                                <a href="javascript:;"
                                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('mg.playGame')); ?>?gametype=<?php echo e($item->game_id); ?>','','width=1024,height=768')"
                                                   <?php else: ?> onclick="return alert('请先登录！')" <?php endif; ?>>
                                                    <?php $img_path = $item->img_path;?>
                                                    <img data-original="<?php echo e(asset("/web/images/games/mg/$img_path")); ?>"
                                                         class="lazy">
                                                    <p class="collect"><?php echo e($item->name); ?></p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('BBIN', $_api_list) && 'BBIN' == $api_name): ?>
                        
                        <div class="module bbinGame" style="display: none;">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="<?php echo e(asset('/web/images/pt-pic-bz.png')); ?>">BB厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                    <div class="search_inp">
                                        <form action="<?php echo e(route('web.eGame')); ?>" method="GET">
                                            <input type="hidden" name="api_name" value="<?php echo e($api_name); ?>">
                                            <input type="text" class="inp" placeholder="请输入游戏名称" name="name" value="<?php echo e($gameName); ?>" required>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--bb-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        <?php $__currentLoopData = $game_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->api_name == 'BBIN' && $item->client_type == 1): ?>
                                            <li class="scrollLoading" style="width: 180px;height: 180px">
                                                <a href="javascript:;"
                                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('bbin.playGame')); ?>?gametype=<?php echo e($item->game_id); ?>','','width=1024,height=768')"
                                                   <?php else: ?> onclick="return alert('请先登录！')" <?php endif; ?>>
                                                    <?php $img_path = $item->img_path;?>
                                                    <div class="pic"><img
                                                                data-original="<?php echo e(asset("/web/images/games/bbin/$img_path")); ?>"
                                                                class="lazy"></div>
                                                    <p class="collect"><?php echo e($item->name); ?></p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('SA', $_api_list) && 'SA' == $api_name): ?>
                        
                        <div class="module saGame" style="display: none;">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="<?php echo e(asset('/web/images/pt-pic-bz.png')); ?>">SA厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                    <div class="search_inp">
                                        <form action="<?php echo e(route('web.eGame')); ?>" method="GET">
                                            <input type="hidden" name="api_name" value="<?php echo e($api_name); ?>">
                                            <input type="text" class="inp" placeholder="请输入游戏名称" name="name" value="<?php echo e($gameName); ?>" required>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bodylist">
                                <div class="egame_list">

                                    <ul>
                                        <?php $__currentLoopData = $game_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->api_name == 'SA' && $item->client_type == 1): ?>
                                            <li class="scrollLoading" style="width: 180px;height: 180px">
                                                <a href="javascript:;"
                                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('sa.playGame')); ?>?gametype=<?php echo e($item->game_id); ?>','','width=1024,height=768')"
                                                   <?php else: ?> onclick="return alert('请先登录！')" <?php endif; ?>>
                                                    <?php $img_path = $item->img_path;?>
                                                    <div class="pic"><img
                                                                data-original="<?php echo e(asset("/web/images/games/sa/$img_path")); ?>"
                                                                class="lazy"></div>
                                                    <p class="collect"><?php echo e($item->name); ?></p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('DT', $_api_list) && 'DT' == $api_name): ?>
                        
                        <div class="module" style="display: none;">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="<?php echo e(asset('/web/images/pt-pic-bz.png')); ?>">DT厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                    <div class="search_inp">
                                        <form action="<?php echo e(route('web.eGame')); ?>" method="GET">
                                            <input type="hidden" name="api_name" value="<?php echo e($api_name); ?>">
                                            <input type="text" class="inp" placeholder="请输入游戏名称" name="name" value="<?php echo e($gameName); ?>" required>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--dt-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        <?php $__currentLoopData = $game_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->api_name == 'DT' && $item->client_type == 1): ?>
                                            <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                                <a href="javascript:;"
                                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('dt.playGame')); ?>?gametype=<?php echo e($item->game_id); ?>','','width=1024,height=768')"
                                                   <?php else: ?> onclick="return alert('请先登录！')" <?php endif; ?>>
                                                    <?php $img_path = $item->img_path;?>
                                                    <img data-original="<?php echo e(asset("/web/images/games/dt/$img_path")); ?>"
                                                         class="lazy">
                                                    <p class="collect"><?php echo e($item->name); ?></p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('TTG', $_api_list) && 'TTG' == $api_name): ?>
                        
                        <div class="module" style="display: none;">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="<?php echo e(asset('/web/images/pt-pic-bz.png')); ?>">TTG厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                    <div class="search_inp">
                                        <form action="<?php echo e(route('web.eGame')); ?>" method="GET">
                                            <input type="hidden" name="api_name" value="<?php echo e($api_name); ?>">
                                            <input type="text" class="inp" placeholder="请输入游戏名称" name="name" value="<?php echo e($gameName); ?>" required>
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--ttg-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        <?php $__currentLoopData = $game_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->api_name == 'TTG'): ?>
                                            <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                                <a href="javascript:;"
                                                   <?php if($_member): ?> onclick="javascript:window.open('<?php echo e(route('ttg.playGame')); ?>?gameId=<?php echo e($item->game_id); ?>&gameName=<?php echo e($item->game_name); ?>','','width=1024,height=768')"
                                                   <?php else: ?> onclick="return alert('请先登录！')" <?php endif; ?>>
                                                    <?php $img_path = $item->img_path;?>
                                                    <img data-original="<?php echo e(asset("/wap/images/newgame/$img_path")); ?>"
                                                         class="lazy">
                                                    <p class="collect"><?php echo e($item->name); ?></p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
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
                $('.live-ul li').on('mouseenter', function () {
                    $(this).addClass('on').siblings('li').removeClass('on');
                });
                $('.egameslide').on('click', '.disabled', function () {
                    layer.msg('暂未开通，敬请期待！', {icon: 6});
                    return false;
                });
                jQuery(".egameslide").slide({trigger: "click", mainCell: ".bd"});

                $("img.lazy").lazyload({
                    placeholder: "<?php echo e(asset('/web/images/egame-loading.gif')); ?>",
                    effect: "fadeIn",
                    skip_invisible: false  //解决滚动才显示的问题
                });

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


            });


        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>