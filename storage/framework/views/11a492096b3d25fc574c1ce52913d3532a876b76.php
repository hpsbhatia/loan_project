
<?php $__env->startSection('title', 'Edit Menu'); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <?php echo Form::model($menu,['route'=>['menu-update',$menu->id],'method'=>'PUT']); ?>

                    <div class="form-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Menu Name</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="name" value="<?php echo e($menu->name); ?>"
                                           type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Menu Description</strong></label>

                                <div class="col-md-6">
                                    <textarea name="description" id="" cols="30" rows="20"
                                              class="wysihtml5 input-lg"><?php echo e($menu->description); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn blue btn-block margin-top-20">Update Menu</button>
                            </div>
                        </div>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>


        </div>
    </div><!---ROW-->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo e(asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('assets/pages/scripts/components-editors.min.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>