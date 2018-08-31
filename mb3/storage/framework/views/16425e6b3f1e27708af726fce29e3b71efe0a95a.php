<div class="m_footer">
    <div class="m_container">
        <ul class="clear">
            <li <?php if(in_array($_wap_router, ['wap.index','wap.init'])): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('wap.index')); ?>">
                    <i class="m_footer-icon m_footer-icon-home"></i>
                    <p class="m_footer-link-text">首页</p>
                </a>
            </li>
            <li>
                <a href="<?php echo e($_system_config->service_link); ?>">
                    <i class="m_footer-icon m_footer-icon-service"></i>
                    <p class="m_footer-link-text">在线客服</p>
                </a>
            </li>
            <li <?php if($_wap_router=='wap.activity_list'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('wap.activity_list')); ?>">
                    <i class="m_footer-icon m_footer-icon-promotion"></i>
                    <p class="m_footer-link-text">优惠活动</p>
                </a>
            </li>
            <li <?php if(in_array($_wap_router, ['wap.login','wap.nav'])): ?> class="active" <?php endif; ?>>
                <?php if(Auth::guard('member')->guest()): ?>
                    <a href="<?php echo e(route('wap.login')); ?>">
                        <i class="m_footer-icon m_footer-icon-about"></i>
                        <p class="m_footer-link-text">登入</p>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('wap.nav')); ?>">
                        <i class="m_footer-icon m_footer-icon-about"></i>
                        <p class="m_footer-link-text">个人中心</p>
                    </a>
                <?php endif; ?>
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