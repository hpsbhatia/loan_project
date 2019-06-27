
<?php $__env->startSection('content'); ?>


    <?php if(count($schedule)): ?>

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
                                <th>Installment Date</th>
                                <th>Installment Amount</th>
                                <th>Installment Fine</th>
                                <th>Installment Status</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i=0;?>
                            <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++;?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e(date('d-F-Y',strtotime($p->date))); ?></td>
                                    <td><?php echo e($p->depositor->package->rate); ?> - <?php echo e($p->depositor->package->currency->name); ?></td>
                                    <td>
                                        <?php if($p->pay_status == 0): ?>
                                            <span class="label control-label label-primary"><i class="fa fa-spinner"></i> Upcoming</span>
                                        <?php elseif($p->pay_status == 2): ?>
                                            <span class="label control-label label-primary"><i class="fa fa-check"></i> No Fine</span>
                                        <?php else: ?>
                                            <span class="label control-label label-danger"><i class="fa fa-plus"></i> <?php echo e($p->depositor->package->fine); ?> <?php echo e($p->depositor->package->currency->name); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($p->paid_status == 1): ?>
                                            <span class="label control-label label-primary"><i class="fa fa-check"></i> Completed</span>
                                        <?php elseif($p->pay_status == 1): ?>
                                            <span class="label control-label label-danger"><i class="fa fa-exclamation-triangle"></i> Not Pay</span>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-primary btn-sm pay_button"
                                                    data-toggle="modal" data-target="#PayModal"
                                                    data-id="<?php echo e($p->id); ?>">
                                                <i class='fa fa-check'></i> Paid
                                            </button>
                                        <?php endif; ?>
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
            <?php echo $schedule->render(); ?>

        </div>
    <?php else: ?>

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    <?php endif; ?>


    <!-- Modal for DELETE -->
    <div class="modal fade" id="PayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-money'></i> Paid !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you Sure you want to Paid ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="<?php echo e(route('loaner-paid')); ?>" class="form-inline">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" class="hasan_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-send"></i> Yes Sure..!</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>

        $(document).ready(function () {

            $(document).on("click", '.pay_button', function (e) {
                var id = $(this).data('id');
                $(".hasan_id").val(id);

            });

        });
    </script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>