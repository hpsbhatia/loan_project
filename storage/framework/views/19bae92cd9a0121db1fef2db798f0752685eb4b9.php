

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <?php echo Form::model($general,['route'=>['update_general',$general->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]); ?>

                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Website Name</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="title" value="<?php echo e($general->title); ?>"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Website Logo</strong></label>

                                <div class="col-md-6">
                                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Change Logo</strong></label>
                                <div class="col-md-6">
                                    <input name="image" type="file" class="form-control"  />
                                    <b style="color:red; margin-top:10px; font-weight: bold; float: right;margin-right: 10px">Image Must be PNG & Resize: 225x60</b>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Web Color</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="color" value="<?php echo e($general->color); ?>"
                                           type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Address</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="address" value="<?php echo e($general->address); ?>"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Mobile</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="number" value="<?php echo e($general->number); ?>"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Email</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="email" value="<?php echo e($general->email); ?>"
                                           type="email">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Paypal Email</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="paypal_email" value="<?php echo e($general->paypal_email); ?>"
                                           type="email">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Top Text</strong></label>
                                <div class="col-md-6">
                                    <textarea name="top_text" class="wysihtml5 form-control input-lg" id="" cols="30" rows="5"><?php echo e($general->top_text); ?></textarea>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Facebook</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="facebook" value="<?php echo e($general->facebook); ?>"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Twitter</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="twitter" value="<?php echo e($general->twitter); ?>"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Google Plus</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="google_plus" value="<?php echo e($general->google_plus); ?>"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Linkedin</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="linkedin" value="<?php echo e($general->linkedin); ?>"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Youtube</strong></label>

                                <div class="col-md-6">
                                    <input class="form-control input-lg" name="youtube" value="<?php echo e($general->youtube); ?>"
                                           type="text">
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Footer Text</strong></label>
                                <div class="col-md-6">
                                    <textarea name="footer_text" class="wysihtml5 form-control input-lg" id="" cols="30" rows="5"><?php echo e($general->footer_text); ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Footer Bottom Text</strong></label>
                                <div class="col-md-6">
                                    <textarea name="footer_bottom_text" class="wysihtml5 form-control input-lg" id="" cols="30" rows="2"><?php echo e($general->footer_bottom_text); ?></textarea>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block">Save Changes</button>
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