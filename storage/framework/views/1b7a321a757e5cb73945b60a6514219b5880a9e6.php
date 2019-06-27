
<?php $__env->startSection('title', 'All Currency'); ?>
<?php $__env->startSection('content'); ?>


    <?php if(count($currency)): ?>

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
                                <th>Currency Name</th>
                                <th>Conversion Rate</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i=0;?>
                            <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++;?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($p->name); ?></td>
                                    <td><?php echo e($p->rate); ?> <?php echo e($p->name); ?> = 1 USD</td>
                                    <td>

                                        <a href="<?php echo e(route('currency_edit',$p->id)); ?>" class="btn purple btn-sm"><i class="fa fa-edit"></i> EDIT</a>

                                        <button type="button" class="btn btn-danger btn-sm delete_button"
                                                data-toggle="modal" data-target="#DelModal"
                                                data-id="<?php echo e($p->id); ?>">
                                            <i class='fa fa-times'></i> DELETE
                                        </button>

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
            <?php echo $currency->render(); ?>

        </div>
    <?php else: ?>

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
        <?php endif; ?>

                <!-- Modal for DELETE -->
        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                    </div>

                    <div class="modal-body">
                        <strong>Are you sure you want to Delete ?</strong>
                    </div>

                    <div class="modal-footer">
                        <form method="post" action="<?php echo e(route('currency_delete')); ?>" class="form-inline">
                            <?php echo csrf_field(); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <input type="hidden" name="id" class="abir_id" value="0">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>