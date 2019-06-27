
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="bootstrap-iso margin-bottom-10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <?php echo Form::open(['method'=>'post','files'=>true]); ?>


                                <span style="color: #000;font-size: 20px;font-weight: bold;border-bottom: 2px solid #000;border-bottom: 2px dotted #000;padding-bottom: 5px;">Select Deposit Package</span>
                                <div class="row" style="margin-top: 15px">
                                    <div class="col-md-12">
                                        <label>Select Deposit Package:</label>
                                        <select name="package_id" id="" class="form-control input-lg" required>
                                            <option value="">Select One</option>
                                            <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?> - <?php echo e($s->amount); ?> <?php echo e($s->currency->name); ?> - <?php echo e($s->rate); ?> <?php echo e($s->currency->name); ?> - <?php echo e($s->installment); ?> Installment</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row" style="margin-top: 15px">
                                    <div class="col-md-12">
                                        <label>Select Staff Under Depositor:</label>
                                        <select name="staff_id" id="" class="form-control input-lg" required>
                                            <option value="">Select One</option>
                                            <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?> - <?php echo e($s->username); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>
                                <hr>

                                <span style="color: #000;font-size: 20px;font-weight: bold;border-bottom: 2px solid #000;border-bottom: 2px dotted #000;padding-bottom: 5px;">Personal Information</span>

                                <div class="row" style="margin-top:15px">

                                    <div class="col-md-6">
                                        <label>First Name:</label>
                                        <input name="first_name" class="form-control input-lg" type="text"
                                               required="" placeholder="First Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Last Name:</label>
                                        <input name="last_name" class="form-control input-lg" type="text"
                                               required="" placeholder="Last Name">
                                    </div>

                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Spouse Name:</label>
                                        <input name="spouse_name" class="form-control input-lg" type="text"
                                               placeholder="Spouse Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Date Of Birth :</label>
                                        <input type="text" class="form-control input-lg" name="birth_date" id="date1"
                                               placeholder="dd-mm-yyyy" required>
                                    </div>

                                </div>
                                <br>


                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Email Address:</label>
                                        <input id="email" name="email_name" class="form-control input-lg"
                                               type="email"
                                               required="" placeholder="Email Address">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Phone Number:</label>
                                        <input id="phone_number" name="phone_number" class="form-control input-lg" type="text"
                                               required="" placeholder="Phone Number">
                                    </div>

                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Father Name:</label>
                                        <input name="father_name" class="form-control input-lg" type="text"
                                               required="" placeholder="Father Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Mother Name:</label>
                                        <input name="mother_name" class="form-control input-lg" type="text"
                                               required="" placeholder="Mother Name">
                                    </div>

                                </div>

                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Present Address:</label>
                                        <textarea name="present_address" id="" cols="30" rows="5"
                                                  class="input-lg form-control" required
                                                  placeholder="Present Address"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Permanent Address:</label>
                                        <textarea name="permanent_address" id="" cols="30" rows="5"
                                                  class="input-lg form-control" required
                                                  placeholder="Permanent Address"></textarea>
                                    </div>

                                </div>

                                <hr>
                                <span style="font-size: 20px;font-weight: bold;border-bottom: 2px solid #ddd;border-bottom: 2px dotted #ddd;padding-bottom: 5px;">Emergency Contact</span>


                                <div class="row" style="margin-top: 15px">

                                    <div class="col-md-6">
                                        <label>Name:</label>
                                        <input name="emergency_name" class="form-control input-lg" type="text"
                                               required="" placeholder="Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Relationship:</label>
                                        <input name="emergency_relationship" class="form-control input-lg" type="text"
                                               required="" placeholder="Relationship">
                                    </div>


                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Phone:</label>
                                        <input name="emergency_phone" class="form-control input-lg" type="text"
                                               required="" placeholder="Emergency Phone">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Address:</label>
                                        <textarea name="emergency_address" id="" cols="30" rows="1"
                                                  class="input-lg form-control" required
                                                  placeholder="Emergency Address"></textarea>
                                    </div>


                                </div>
                                <hr>

                                <span style="color: #000;font-size: 20px;font-weight: bold;border-bottom: 2px solid #000;border-bottom: 2px dotted #000;padding-bottom: 5px;">Requirement Files</span>

                                <div class="row" style="margin-top: 15px">

                                    <div class="col-md-12">
                                        <label>Depositor Picture:</label>
                                        <input type="file" name="depositor_image" id="" class="form-control input-lg" required>
                                    </div>

                                </div>
                                <br>
                                <div class="row" style="margin-top: 15px">

                                    <div class="col-md-12">
                                        <label>National ID Card:</label>
                                        <input type="file" name="nid_image" id="" class="form-control input-lg" required>
                                    </div>

                                </div>
                                <br>

                                <div class="col_full nobottommargin">
                                    <button class="button btn btn-primary btn-block margin-top-10 nomargin"
                                            id="register-form-submit"
                                            name="register-form-submit" value="register"><i class="fa fa-send"></i> Confirm & Next Step
                                    </button>
                                </div>

                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!---ROW-->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('date-picker/bootstrap-datepicker.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('date-picker/bootstrap-datepicker3.css')); ?>"/>


    <script>
        $(document).ready(function () {
            var date_input = $('input[name="birth_date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "input";
            var options = {
                format: 'dd-mm-yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>