
<?php $__env->startSection('style'); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- Slider
    ============================================= -->
    <section id="slider" class="swiper_wrapper full-screen clearfix" data-loop="true" data-autoplay="5000">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">

                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide"
                     style="background-image: url('<?php echo e(asset('images')); ?>/<?php echo e($s->image); ?>')">
                    <div class="container clearfix">
                        <div class="slider-caption" style="max-width: 700px;">
                            <h2 data-caption-animate="flipInX"><span
                                        style="color: #fff;"><?php echo e($s->text); ?></span></h2>
                            <p data-caption-animate="flipInX" data-caption-delay="500" style="color: #fff;"></p>


                            <b style="color: #fff;" class="hidden-sm hidden-md hidden-lg"></b>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>

        </div>

    </section><!-- #slider end -->


    <!-- Content
    ============================================= -->
    <section id="content" style="color:#<?php echo e($site_color); ?>">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row text-center">
                    <div align="center">
                        <h3 style="text-align: center; text-transform: uppercase; margin-top: 0px;">
                            <span style="color:#<?php echo e($site_color); ?>"> What We Do</span></h3>
                    </div>
                    <br>
                    <div align="center">
                        <p style="font-size: 18px"><?php echo $top_text; ?></p>
                    </div>
                </div>


            </div>
        </div>


        <div class="row clearfix bottommargin-lg">




            <div class="col-md-12 col-sm-12 center col-padding" style="background-color: #<?php echo e($site_color); ?>; height: 120px; !important;">
                <div>
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1" style="margin-top: 15px;">
                            <form action="<?php echo e(route('search-schedule')); ?>" method="post" class="form-inline">
                                <?php echo csrf_field(); ?>

                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="number" class="form-control input-lg" placeholder="Enter Loan Or Deposit Number" style="background: #fff;width: 285px;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control input-lg" placeholder="Enter Email Address" style="background: #fff;width: 250px;" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-block btn-lg"><i class="fa fa-search" aria-hidden="true"></i> View Log Sheet</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="content-wrap">
            <div class="container clearfix">


                <h3 style="text-align: center; text-transform: uppercase; margin-top: -40px;">
                    <span style="color:#<?php echo e($site_color); ?>"> Loan Package Below</span></h3>

                <div class="pricing bottommargin clearfix">

                    <?php $__currentLoopData = $loan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="pricing-box"
                             style="border-radius: 8px !important;">
                            <div class="pricing-title">
                                <h3><?php echo e($p->name); ?></h3>
                            </div>
                            <div class="pricing-price">
                                <span class="price-unit"><?php echo e($p->amount); ?> <span style="font-size: 19px"> - <?php echo e($p->currency->name); ?> </span></span>
                            </div>
                            <div class="pricing-features">
                                <ul>
                                    <li>
                                        <p><i class="fa fa-check"></i> <?php echo e($p->percentage); ?>% - Interest</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> <?php echo e($p->installment); ?> - Installment</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> <?php echo e($p->rate); ?> - <?php echo e($p->currency->name); ?> Par Installment</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> <?php echo e($p->type->name); ?> - Installment Type</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> <?php echo e($p->fine); ?> - <?php echo e($p->currency->name); ?> - Fine Par Installment</p>
                                    </li>

                                </ul>
                            </div>

                            <div class="pricing-action">
                                <strong style="color: #<?php echo e($site_color); ?>; text-transform: uppercase;">


                                    <div id="wc1"></div>

                                    <a href="<?php echo e(route('contact-us')); ?>" class="btn btn-block btn-lg"
                                       style="color: #fff; text-transform: none;  background: #<?php echo e($site_color); ?>">Contact Now</a> </strong>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


                <h3 style="text-align: center; text-transform: uppercase; margin-top: 40px;">
                    <span style="color:#<?php echo e($site_color); ?>"> Deposit Package Below</span></h3>

                <div class="pricing bottommargin clearfix">

                    <?php $__currentLoopData = $deposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="pricing-box"
                                 style="border-radius: 8px !important;">
                                <div class="pricing-title">
                                    <h3><?php echo e($p->name); ?></h3>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit"><?php echo e($p->amount); ?> <span style="font-size: 19px"> - <?php echo e($p->currency->name); ?> </span></span>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-check"></i> <?php echo e($p->percentage); ?>% - Interest</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> <?php echo e($p->installment); ?> - Installment</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> <?php echo e($p->rate); ?> - <?php echo e($p->currency->name); ?> Par Installment</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> <?php echo e($p->type->name); ?> - Installment Type</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> <?php echo e($p->fine); ?> - <?php echo e($p->currency->name); ?> - Fine Par Installment</p>
                                        </li>

                                    </ul>
                                </div>

                                <div class="pricing-action">
                                    <strong style="color: #<?php echo e($site_color); ?>; text-transform: uppercase;">


                                        <div id="wc1"></div>

                                        <a href="<?php echo e(route('contact-us')); ?>" class="btn btn-block btn-lg"
                                           style="color: #fff; text-transform: none;  background: #<?php echo e($site_color); ?>">Contact Now</a> </strong>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


                <h3 style="text-align: center; text-transform: uppercase; margin-top: 40px;">
                    <span style="color:#<?php echo e($site_color); ?>"> TESTIMONIALS </span></h3>

                <ul class="testimonials-grid grid-3 clearfix">

                    <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="height: 198px;">
                        <div class="testimonial" style="color:#<?php echo e($site_color); ?>">
                            <div class="testi-content">
                                <p style="text-transform: lowercase; font-weight: normal;"><?php echo e(substr($t->description,0,180)); ?></p>
                                <div class="testi-meta">
                                    <?php echo e($t->name); ?>

                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>


            </div>
        </div>
    </section><!-- #content end -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>


    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <script type="text/javascript">
        $(function() {

            $('input[name="date"]').daterangepicker({
                autoUpdateInput: false,
                format : 'YYYY-MM-DD',
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + '/' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>