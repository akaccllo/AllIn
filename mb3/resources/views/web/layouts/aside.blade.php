<div class="aside">
    <div>
        {{--<a href="javascript:;" class="aside_kefu on">--}}
        {{--<span class="bg-icon"></span>--}}
        {{--<p>在线客服</p>--}}
        {{--</a>--}}
        {{--<a href="javascript:;" class="aside_qq">--}}
        {{--<span class="bg-icon"></span>--}}
        {{--<p>QQ客服</p>--}}
        {{--</a>--}}
        {{--<a href="javascript:;" class="aside_phone">--}}
        {{--<span class="bg-icon"></span>--}}
        {{--<p>客户端</p>--}}
        {{--</a>--}}
        <ul>
            <li>
                <a href="javascript:;" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                    <img src="{{ asset('/web/images/aside_r1.png') }}" alt="">
                </a>
            </li>
            {{--<li>--}}
                {{--<img src="{{ asset('/web/images/aside_r2.png') }}" alt="">--}}
                {{--<a href="javascript:;" class="aside_qq"></a>--}}
                {{--<a href="javascript:;" class="aside_qq">{{ $_system_config->phone1}}</a>--}}
            {{--</li>--}}
            <li>
                <a href="javascript:;" class="daili_apply">
                    <img src="{{ asset('/web/images/aside_r4.png') }}" alt="">
                </a>
                {{--<img class="aside_erweima" src="{{ asset('/web/images/aside_erweima1.png') }}" alt="">--}}
            </li>
            <li>
                <a href="javascript:;">
                    <img src="{{ asset('/web/images/aside_r3.png') }}" alt="">
                </a>
                <img class="aside_erweima" src="{{ $_system_config->wap_qrcode }}" alt="">
            </li>
        </ul>
    </div>
</div>


{{--<div class="aside_l">--}}
{{--<ul>--}}
{{--<li>--}}

{{--<img src="{{ asset('/web/images/aside_r6.png') }}" alt="">--}}
{{--<img src="{{ asset('/web/images/aside_r3.png') }}" alt="">--}}
{{--<img class="aside_erweima" src="{{ asset('/web/images/xierdun/erweima.png') }}" alt="">--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}