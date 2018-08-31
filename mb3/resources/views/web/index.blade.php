@extends('web.layouts.main')
@section('after.js')

@if($_system_config->is_alert_on == 0)
    <div id="modal-tit" class="modal modal-login">
        <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
            <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
            <a href="javascript:;">
                <img src="{{ $_system_config->alert_img }}" alt="">
            </a>
        </div>
    </div>
    <script>
        (function($){
            $(function(){
                $('#modal-tit').modal();
            })
        })(jQuery);
    </script>
@endif

@endsection
@section('content')
    <div class="tai_banner"></div>

    <div class="tai_news">
        <div class="container">
            <marquee behavior="scroll" direction="left"  onMouseOut="this.start()" onMouseOver="this.stop()">
                @foreach($_system_notices as $v)
                    <span>~{{ $v->title }}~</span>
                    <span>{{ $v->content }}</span>
                @endforeach
            </marquee>
        </div>
    </div>

    <div class="tai_content">
        <div>
            <ul class="tai_game-box">
                <li class="game notLast">
                    <a href="{{ route('web.eGame') }}"></a>
                </li>
                <li class="live notLast">
                    <a href="{{ route('web.liveCasino') }}"></a>
                </li>
                <li class="sport notLast">
                    <a href="{{ route('web.esports') }}"></a>
                </li>
                <li class="lottery notLast">
                    <a href="{{ route('web.lottory') }}"></a>
                </li>
                <li class="middle">
                    <a href="{{ $_system_config->app_link }}" target="_blank"></a>
                </li>
            </ul>

            <ul class="tai_home-contact">
                <li class="phone">
                    代理qq：
                    <span>{{ $_system_config->qq }}</span>
                </li>
                <li class="phone">
                    澳门热线：
                    <span>{{ $_system_config->phone1 }}</span>
                </li>
                <li class="email">
                    邮箱：
                    <span>{{ $_system_config->qq }}@qq.com</span>
                </li>
                <li class="kefu">
                    客服中心：
                    <a href="javascript:;"
                       onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        SERVICE CENTER
                    </a>
                </li>
            </ul>

            <ul class="branding-area">
                <li>
                    <h2>国际顶级品牌</h2>
                    <h3>亚洲博彩龙头企业</h3>
                </li>
                <li>
                    <h2>国际顶级品牌</h2>
                    <h3>亚洲博彩龙头企业</h3>
                </li>
                <li>
                    <h2>国际顶级品牌</h2>
                    <h3>亚洲博彩龙头企业</h3>
                </li>
                <li>
                    <h2>国际顶级品牌</h2>
                    <h3>亚洲博彩龙头企业</h3>
                </li>
            </ul>
        </div>
    </div>

    {{--<div id="modal-tit" class="modal modal-login">--}}
        {{--<div class="modal-content" style="width: 650px;height: 414px;padding: 0">--}}
            {{--<a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>--}}
            {{--<a href="http://wpa.qq.com/msgrd?v=3&uin=394857168&site=qq&menu=yes">--}}
                {{--<img src="{{ asset('/web/images/modal-tit.jpg') }}" alt="">--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<script>--}}
        {{--(function($){--}}
            {{--$(function(){--}}
                {{--$('#modal-tit').modal();--}}
            {{--})--}}
        {{--})(jQuery);--}}
    {{--</script>--}}


<script>


    (function ($) {
        $(function () {
            $(window).on('scroll',function(){
                var windowScroll = $('body').scrollTop();
                console.log(windowScroll);
                if(windowScroll>=310){
                    $('.tai_header-bot').addClass('scrollTop');
                }else{
                    $('.tai_header-bot').removeClass('scrollTop');
                }
            })

            $('.flexslider').flexslider({
                animation: 'fade',
                directionNav: false
            });

            $('.menuBox').on('click', 'li', function () {
                var index = $(this).index();
                var $contentBox_item=$(this).closest('.menuBox').next('.contentBox').find('.contentBox_item');
                $(this).addClass('active').siblings('li').removeClass('active');
                $contentBox_item.removeClass('active').eq(index).addClass('active');
            });

            //公告
            $('#mar0').on('click',function(){
                var notice_index=layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: ['680px'],
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('.notice_layer')
                });

                $('.notice_layer').on('click','.close',function(){
                    layer.close(notice_index)
                })
            })


            //superslide
           /* jQuery(".txtScroll-top").slide({mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:9,pnLoop:true});*/

           //superslide
           var listMarqueIndex=0;
           var listMarqueShow=7;  //要显示的个数
           var listMarqueLength=$('.txtScroll-top .ntb-egzj li').length;  //总共显示的条数
           if(listMarqueLength>listMarqueShow){  //大于要显示的个数才执行动画
            var listMarque=setInterval(function(){

                console.log(listMarqueIndex);
                if(listMarqueLength-listMarqueIndex>listMarqueShow){
                    listMarqueIndex++;
                    $('.txtScroll-top .ntb-egzj li').removeClass('on')
                    $('.txtScroll-top .ntb-egzj li').eq(listMarqueIndex).addClass('on');
                    $('.txtScroll-top .ntb-egzj').animate({
                    "top":"-=45px"
                   },800);
                }else{
                    $('.txtScroll-top .ntb-egzj').animate({"top":'0'})
                    listMarqueIndex=0;
                    $('.txtScroll-top .ntb-egzj li').removeClass('on')
                    $('.txtScroll-top .ntb-egzj li').eq(listMarqueIndex).addClass('on')
                }
               },4000);
           }

            $('.disabled').on('click', function () {
                layer.msg('暂未开放，敬请期待', {icon: 6});
            });
        })
    })(jQuery)
</script>
<script id="jsID" type="text/javascript">

</script>
@endsection
