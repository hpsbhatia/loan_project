
<?php $__env->startSection('title', 'All Currency'); ?>
<?php $__env->startSection('content'); ?>


    <?php if(count($loner)): ?>

        <div class="row">
            <div class="col-md-12">


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Loan Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Staff</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i=0;?>
                            <?php $__currentLoopData = $loner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++;?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($p->loaner_number); ?></td>
                                    <td><?php echo e($p->first_name); ?> <?php echo e($p->last_name); ?></td>
                                    <td><?php echo e($p->email_name); ?></td>
                                    <td><?php echo e($p->phone_number); ?></td>
                                    <td><?php echo e($p->package->name); ?></td>
                                    <td><?php echo e($p->package->amount); ?> - <?php echo e($p->package->currency->name); ?></td>
                                    <td><?php echo e($p->staff->username); ?></td>
                                    <td><?php echo e($p->rating); ?></td>
                                    <td>

                                        <a href="<?php echo e(route('loan-schedule',$p->loaner_number)); ?>" class="btn purple btn-sm"><i class="fa fa-eye"></i> Schedule</a>


                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->


        <div class="text-center">
            <?php echo $loner->render(); ?>

        </div>
    <?php else: ?>

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    <?php endif; ?>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>