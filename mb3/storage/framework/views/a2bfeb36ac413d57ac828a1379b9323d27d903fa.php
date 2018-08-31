<?php $__env->startSection('content'); ?>
    <div class="userbasic_head">
        <a href="<?php echo e(route('member.finance_center')); ?>" class="active">会员存款</a>
        <a href="<?php echo e(route('member.member_drawing')); ?>" >会员提款</a>
        <a href="<?php echo e(route('member.indoor_transfer')); ?>">户内转账</a>
        
    </div>

    <!--第二个页面开始-->
    <div class="userbasic_body">
        <div class="bank_tips">温馨提示: 如当前支付方式未能支付成功，请您尝试其他支付方式进行支付！</div>
        <div class="pay_way_wrap">
            <form action="<?php echo e(route('member.post_ali_pay')); ?>" method="post">
                <div class="pay_way_line">
                    <div class="tit">收款二维码</div>
                    <div class="con">
                        <img src="<?php echo e($_system_config->alipay_qrcode); ?>">
                    </div>
                </div>
                <div class="pay_way_line">
                    <div class="tit">温馨提示</div>
                    <div class="con">
                        <ul>
                            <li>1、请使用微信扫描二维码</li>
                            <li>2、请核对收款账号名称为：<?php echo e($_system_config->alipay_nickname); ?></li>
                            <li>3、在金额转出后请务必填写改页下方的付款信息表！</li>
                            <li>4、填写完毕后，再次确认信息，并提交申请，财务会在三分钟内为您处理！</li>
                        </ul>
                    </div>
                </div>
                <div class="pay_way_line">
                    <div class="tit">填写表单</div>
                    <div class="con">
                        <p>用户账号：<?php echo e($_member->name); ?></p>
                        <p>存款金额：<input type="text" class="inp" name="money"> 元</p>
                        <p>付款账号：<input type="text" class="inp" name="account"> </p>
                        <div>付款时间：<div id="rendez-vous"></div>
                            时间：
                            <select class="select" name="date_h" style="width: 70px;">
                                <option value="<?php echo e(date('H')); ?>"><?php echo e(date('H')); ?></option>
                                <?php $__currentLoopData = range(00, 24); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($v < 10): ?> value="0<?php echo e($v); ?>" <?php else: ?> value="<?php echo e($v); ?>" <?php endif; ?>><?php if($v < 10): ?> 0<?php echo e($v); ?> <?php else: ?> <?php echo e($v); ?> <?php endif; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>时
                            <select class="select" name="date_i" style="width: 70px;">
                                <option value="<?php echo e(date('i')); ?>"><?php echo e(date('i')); ?></option>
                                <?php $__currentLoopData = range(00, 59); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($v < 10): ?> value="0<?php echo e($v); ?>" <?php else: ?> value="<?php echo e($v); ?>" <?php endif; ?>><?php if($v < 10): ?> 0<?php echo e($v); ?> <?php else: ?> <?php echo e($v); ?> <?php endif; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>分
                            <select class="select" name="date_s" style="width: 70px;">
                                <option value="<?php echo e(date('s')); ?>"><?php echo e(date('s')); ?></option>
                                <?php $__currentLoopData = range(00, 59); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($v < 10): ?> value="0<?php echo e($v); ?>" <?php else: ?> value="<?php echo e($v); ?>" <?php endif; ?>><?php if($v < 10): ?> 0<?php echo e($v); ?> <?php else: ?> <?php echo e($v); ?> <?php endif; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>秒
                        </div>
                    </div>
                </div>
                <div class="pay_way_line">
                    <div class="tit"></div>
                    <div class="con">
                        <button type="button" class="ajax-submit-without-confirm-btn account_save">提 交</button> <a href="<?php echo e(route('member.finance_center')); ?>" class="account_save">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script>
        (function ($) {
            $(function () {

                //time picker
                $('#rendez-vous').RendezVous({
                    inputEmptyByDefault: false,
                    defaultDate: {
                        day: new Date().getDate(),    // 1 through 31
                        month: new Date().getMonth(),  // 0 through 11
                        year: new Date().getFullYear() // No limits
                    },
                    i18n: {
                        calendar: {
                            month: {
                                previous: '上一月',
                                next:     '下一月',
                                up:       '选择月份'
                            },
                            year: {
                                previous: '上一年',
                                next:     '下一年',
                                up:       '选择年份'
                            },
                            decade: {
                                previous: '上十年',
                                next:     '下十年',
                                up:       '选择日期'
                            }
                        },
                        days: {
                            abbreviation: {
                                monday:    '一',
                                tuesday:   '二',
                                wednesday: '三',
                                thursday:  '四',
                                friday:    '五',
                                saturday:  '六',
                                sunday:    '日'
                            },
                            entire: {
                                monday:    '星期一',
                                tuesday:   '星期二',
                                wednesday: '星期三',
                                thursday:  '星期四',
                                friday:    '星期五',
                                saturday:  '星期六',
                                sunday:    '星期日'
                            }
                        },
                        months: {
                            abbreviation:
                                {
                                    january:   '1',
                                    february:  '2',
                                    march:     '3',
                                    april:     '4',
                                    may:       '5',
                                    june:      '6',
                                    july:      '7',
                                    august:    '8',
                                    september: '9',
                                    october:   '10',
                                    november:  '11',
                                    december:  '12'
                                },
                            entire: {
                                january:   '1',
                                february:  '2',
                                march:     '3',
                                april:     '4',
                                may:       '5',
                                june:      '6',
                                july:      '7',
                                august:    '8',
                                september: '9',
                                october:   '10',
                                november:  '11',
                                december:  '12'
                            }
                        }
                    },
                    formats: {
                        display: {
                            date: ' %Y-%Month-%d  '
                        }
                    }
                });

            })
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('member.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>