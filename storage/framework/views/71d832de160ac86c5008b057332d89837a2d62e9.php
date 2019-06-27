

<?php $__env->startSection('content'); ?>

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_half text-center">
                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-<?php echo session()->get('type'); ?> alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo session()->get('message'); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <!-- Contact Form
                ============================================= -->
                <div class="col_full">

                    <div class="fancy-title title-dotted-border">
                        <h3>Send us an Email</h3>
                    </div>

                    <div class="contact-widget1">

                        <form class="nobottommargin1" action="<?php echo e(route('contact-send')); ?>" name="template-contactform" method="post">

                            <?php echo csrf_field(); ?>

                            <div class="form-process"></div>

                            <div class="col_one_third">
                                <label for="template-contactform-name">Name <small>*</small></label>
                                <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control required" />
                            </div>

                            <div class="col_one_third">
                                <label for="template-contactform-email">Email <small>*</small></label>
                                <input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="template-contactform-phone">Phone</label>
                                <input type="text" id="template-contactform-phone" name="phone" value="" class="sm-form-control" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-subject">Subject <small>*</small></label>
                                <input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Message <small>*</small></label>
                                <textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
                            </div>


                            <div class="col_full">
                                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d btn-block nomargin"><i class="fa fa-send"></i> Submit Message</button>
                            </div>

                        </form>
                    </div>

                </div><!-- Contact Form End -->

                <!-- Google Map
                ============================================= -->
                <!-- Google Map End -->

                <div class="clear"></div>

                <!-- Contact Info
                ============================================= -->
                <div class="row clear-bottommargin">

                    <div class="col-md-4 col-sm-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                            </div>
                            <h3>Our Headquarters<span class="subtitle"><?php echo e($general->address); ?></span></h3>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="fa fa-phone"></i></a>
                            </div>
                            <h3>Speak to Us<span class="subtitle"><?php echo e($general->number); ?></span></h3>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="fa fa-envelope"></i></a>
                            </div>
                            <h3>Send A Mail<span class="subtitle"><?php echo e($general->email); ?></span></h3>
                        </div>
                    </div>


                </div><!-- Contact Info End -->

            </div>

        </div>

    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>