<div class="m_header">
    <div class="m_container">
        <div class="pullLeft">
            <img class="logo" src="<?php echo e($_system_config->m_site_logo); ?>" alt="">
        </div>
        <div class="pullRight m_header-info">
            <?php if(Auth::guard('member')->guest()): ?>
            <?php else: ?>
                <div><?php echo e($_member->name); ?></div>
                <div><?php echo e($_member->money); ?>&nbsp;RMB</div>
            <?php endif; ?>
        </div>
    </div>
</div>