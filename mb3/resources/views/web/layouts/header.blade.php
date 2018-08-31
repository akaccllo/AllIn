<!--登录模态框-->
<div id="login" class="modal modal-login">
    <div class="modal-content">
        <form method="POST" action="{{ route('member.login.post') }}">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>用户登录</h2>
                <div class="modal-login_line">
                    <input class="username" type="text" placeholder="请输入用户名" required name="name">
                </div>
                <div class="modal-login_line">
                    <input class="psw" type="password" placeholder="请输入密码" required name="password">
                </div>
                <!-- <div class="modal-login_line code">
                    <input type="text" placeholder="请输入验证码" required name="code">
                    <img src="" alt="" width="100">
                </div> -->
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">登录</button>
                </div>
                <div class="modal-login_link clear">
                    <p class="pullRight">
                        还没有账号？
                        <a href="{{ route('web.register_one') }}">点击注册</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
<!--半透明遮罩层-->
<div class="backdrop"></div>


<div class="tai_header">
    <div class="tai_header-top">
        <div class="container">
            <div class="language">
                <span class="pic01"></span>
            </div>
            <div class="div-tel">
                24小时客服QQ: {{ $_system_config->qq }}
                <span style="margin-left: 10px;">美东时间: <em id="mdtime"></em></span>
            </div>
            <ul class="top-nav">
                {{--<li>--}}
                {{--<a href="http://agent.l18888.com" style="color: red" target="_blank">代理登录</a>--}}
                {{--&nbsp;&nbsp;<span style="color:#fff;">|</span>&nbsp;&nbsp;--}}
                {{--</li>--}}
                <li>
                    <a style="color: red" href="javascript:;" class="slide_down">
                        牌照展示
                        <img src="{{ asset('/web/images/paizhao.png') }}" alt="">
                    </a>&nbsp;&nbsp;|&nbsp;&nbsp;
                </li>
                <li>
                    <a style="color: red" href="{{ route('member.finance_center') }}">快速充值</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                </li>
                <li>
                    <a style="color: red" href="javascript:;" class="daili_apply">代理合作</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                </li>
                <li>
                    <a style="color: red" href="{{ route('web.activityList') }}">活动大厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                </li>
                <li>
                    <a style="color: red" href="{{ $_system_config->app_link }}" target="_blank">手机APP下载</a>
                </li>
                {{--<li class="slideDown">--}}
                {{--<a href="javascript:;">手机投注</a>--}}
                {{--<div class="slideDown-item">--}}
                {{--<img src="{{  asset('/web/images/taiyang_w.png') }}" alt="">--}}
                {{--<img class="erwei" src="{{ asset('/web/images/taiyang_weixin.png') }}" alt="">--}}
                {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
    <div class="tai_nav">
        <span class="logo-bg">
            <img src="{{ $_system_config->site_logo}}" alt="">
        </span>
        <ul class="pullRight">
            <li @if($web_route == 'web.index') class="on" @endif>
                <a href="{{ route('web.index') }}">
                    首页
                    <span>HOME</span>
                </a>
            </li>
            <li class="has-menu @if($web_route == 'web.liveCasino')on @endif">
                <a href="{{ route('web.liveCasino') }}">
                    真人视讯
                    <span>LIVE CASINO</span>
                </a>
                {{--<ol class="subnav">--}}
                {{--<li @if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?id=12','','width=1024,height=768')"--}}
                {{--@else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>AG国际厅</li>--}}
                {{--<li @if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?id=13','','width=1024,height=768')"--}}
                {{--@else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>AG旗舰厅</li>--}}
                {{--<li @if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?pageSite=live','','width=1024,height=768')"--}}
                {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BB旗舰厅</li>--}}
                {{--<li @if($_member) onclick="javascript:window.open('{{ route('og.playGame') }}','','width=1024,height=768')"--}}
                {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>OG真人厅</li>--}}
                {{--</ol>--}}
            </li>
            <li @if($web_route == 'web.lottory') class="on" @endif>
                <a href="{{ route('web.lottory') }}">
                    彩票游戏
                    <span>LOTTORY</span>
                </a>
            </li>
            <li @if($web_route == 'web.eGame') class="on" @endif>
                <a href="{{ route('web.eGame') }}">
                    电子游艺
                    <span>EGAMES</span>
                </a>
            </li>
            <li @if($web_route == 'web.catchFish') class="on" @endif>
                <a href="{{ route('web.catchFish') }}">
                    捕鱼游戏
                    <span>CATCHFISH</span>
                </a>
            </li>
            <li @if($web_route == 'web.esports') class="on" @endif>
                <a href="{{ route('web.esports') }}">
                    体育游戏
                    <span>ESPORTS</span>
                </a>
            </li>
            <li>
                <a href="{{ route('web.poker') }}">
                    棋牌游戏 <span class="en">Poker</span>
                </a>
            </li>
            <li @if($web_route == 'web.activityList') class="on" @endif>
                <a href="{{ route('web.activityList') }}">
                    优惠活动
                    <span>PROMOTIONS</span>
                </a>
            </li>
            <li>
                <a href="{{ $_system_config->app_link }}" target="_blank">
                    手机投注
                    <span>MOBILE</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"
                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                    在线客服
                    <span>SERVICE</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?38de67e8eb5fe11e77912770f1dc32a5";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<div class="tai_header-bot @if($web_route !='web.index') scrollTop @endif">
    <div class="wrapper">
        <div class="account-box">
            @if (Auth::guard('member')->guest())
                <form method="POST" action="{{ route('member.login.post') }}">
                    <input type="text" id="login_account" placeholder="账号" class="username" required name="name">
                    <input type="password" id="login_password" placeholder="密码" class="psw" required name="password">
                    <div class="check-code-wrapper">
                        <input type="text" placeholder="请输入验证码" required name="captcha" onfocus="re_captcha_re();">
                        <img onclick="javascript:re_captcha_re();" src="{{ URL('kit/captcha/1') }}"
                             id="c2c98f0de5a04167a9e427d883690ff11"
                             style="display: inline-block;width: 80px;">
                        <script>
                            function re_captcha_re() {
                                $url = "{{ URL('kit/captcha') }}";
                                $url = $url + "/" + Math.random();
                                document.getElementById('c2c98f0de5a04167a9e427d883690ff11').src = $url;
                            }
                        </script>
                    </div>
                    <button class="login-box modal-login_submit ajax-submit-btn" type="button">立即登录</button>
                    {{--                    <a class="forget-btn" href="javascript:;" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">忘记?</a>--}}
                    <a href="{{ route('web.register_one') }}" class="join-btn">免费开户</a>
                </form>
            @else
                <div class="">
                    <ul class="account-info">
                        <li>
                            帐号 :
                            <span class="account">{{ $_member->name }}</span>
                        </li>
                        <li>
                            账户余额 :
                            <span class="account">${{ $_member->money }}</span>
                        </li>
                    </ul>
                    <ul class="account-nav">
                        <li>
                            <a href="{{ route('member.userCenter') }}">
                                个人中心
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('member.member_drawing') }}">
                                线上取款
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('member.finance_center') }}">
                                线上存款
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('member.indoor_transfer') }}">
                                额度转换
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('member.safe_psw') }}">
                                修改取款密码
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('member.login_psw') }}">
                                修改密碼
                            </a>
                        </li>
                    </ul>
                    <div class="action-box">
                        <a class="logout-btn quit_btn" href="{{ route('member.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>
                    </div>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>