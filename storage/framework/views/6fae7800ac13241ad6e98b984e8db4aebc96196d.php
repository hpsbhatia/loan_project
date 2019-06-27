
<?php $__env->startSection('title', 'Menu Show'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <div class="row">
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6">
                            <div class="text-center"><b><?php echo e($m->name); ?></b></div>
                            <br>
                            <p class="text-center">
                                <?php echo $m->description; ?>

                            </p>
                            <div class="col-md-6">
                                <a href="<?php echo e(route('menu-edit',$m->id)); ?>" class="btn blue btn-block margin-top-20"><i class="fa fa-edit"></i> Edit Menu </a>
                            </div>
                            <?php echo e(Form::open(['route'=>['menu-delete',$m->id],'method'=>'DELETE'])); ?>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger btn-block margin-top-20" onclick="return confirm('Are You Sure..!')"><i class="fa fa-trash"></i> Delete Menu </button>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>


        </div>
    </div><!---ROW-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>