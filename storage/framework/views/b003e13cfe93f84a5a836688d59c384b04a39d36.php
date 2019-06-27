
<?php $__env->startSection('title', "$menu_name" ); ?>
<?php $__env->startSection('content'); ?>


<!-- =-=-=-=-=-=-= About Us =-=-=-=-=-=-= -->
<section class="padding-top-70 white" id="content">
    <div class="container">
        <div class="row">
            <div class="about">
                <!-- end col-md-6 -->
                <div class="col-md-12 col-sm-12">
                    <p><?php echo $menu_description; ?></p>
                </div>
                <!-- end col-md-5 -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= About Us END =-=-=-=-=-=-= -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>