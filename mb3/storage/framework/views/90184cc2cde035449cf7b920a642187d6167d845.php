<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">接口列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.api.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <h3 style="color: red" class="text-center"></h3>
                 <h3 style="color: red" class="text-center">以上接口只用填写 NG接口并且已下线</h3>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th>平台名称</th>
                         <th  style="width: 10%">余额</th>
                         <th  style="width: 20%">最后更新时间</th>
                         <th  style="width: 10%">排序</th>
                         <th  style="width: 20%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->api_name); ?>

                             </td>
                             <td>
                                 <span class="balance"><?php echo e($item->api_money); ?></span>
                                 <?php if(!in_array($item->api_name, ['BI','EG'])): ?>
                                 <a class="refresh" href="javascript:void(0)"  data-uri="<?php echo e(route('api.credit')); ?>?api_name=<?php echo e($item->api_name); ?>"></a>
                                <?php endif; ?>
                             </td>
                             <td>
                                 <?php echo e($item->updated_at); ?>

                             </td>
                             <td>
                                 <?php echo e($item->sort); ?>

                             </td>
                             <td>
                                 <?php echo \App\Models\Base::$ON_LINE_HTML[$item->on_line]; ?>

                             </td>
                             <td>
                                 <?php if($item->on_line == 0): ?>
                                     <a href="<?php echo e(route('api.check', ['id' => $item->getKey(), 'status' => 1])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 <?php elseif($item->on_line == 1): ?>
                                     <a href="<?php echo e(route('api.check', ['id' => $item->getKey(), 'status' => 0])); ?>" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 <?php endif; ?>
                                 <button type="button" class="btn btn-info btn-xs show-cate" data-uri="<?php echo e(route('api.show', ['id' => $item->getKey()])); ?>">查看</button>
                                 <a href="<?php echo e(route('api.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 
                                         
                                         
                                         
                                 
                                     
                                 
                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     <?php echo $data->render(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
     <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '信息',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })

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
         });
     </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个接口吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>