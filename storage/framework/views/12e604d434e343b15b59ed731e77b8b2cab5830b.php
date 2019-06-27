

<?php $__env->startSection('content'); ?>


        <div class="col-md-12">

            <div class="col-md-4">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?php echo e(Auth::guard('staff')->user()->username); ?></div>
                        <div class="desc">User Name</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="fa fa-folder"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?php echo e($total_loaner); ?></div>
                        <div class="desc">Total Loner</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?php echo e($total_depositor); ?></div>
                        <div class="desc">Total Deposit</div>
                    </div>
                </div>
            </div>

        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staff', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>