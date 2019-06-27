<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content=""/>
    <meta name="description" content="<?php echo e($site_title); ?>">
    <meta property="og:image" content=""/>


    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">


    <link href="//fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Montserrat:400,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/fonts.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/colors.php?color')); ?>=<?php echo e($site_color); ?>" type="text/css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('//cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css')); ?>">

    <title><?php echo e($site_title); ?> - <?php echo e($page_title); ?></title>

    <?php echo $__env->yieldContent('style'); ?>
    <style>

        .panel > .panel-heading {
            background: #<?php echo e($site_color); ?>;
            color: white;
        }

        .panel-primary {
            border: 3px solid #<?php echo e($site_color); ?>;
        }

        .panel-warning {
            border: 3px solid #<?php echo e($site_color); ?>;
        }

        .panel-danger {
            border: 3px solid #<?php echo e($site_color); ?>;
        }

        .panel-info {
            border: 3px solid #<?php echo e($site_color); ?>;
        }

        .panel-success {
            border: 3px solid #<?php echo e($site_color); ?>;
        }
        .bottommargin-lg {
            margin-bottom: 40px !important;
        }

        .pricing-title {
            padding: 15px 0;
            background-color: #<?php echo e($site_color); ?>;
            border-radius: 3px 3px 0 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            color: #fff;
        }

        .pricing-box {
            position: relative;
            border: 3px solid #<?php echo e($site_color); ?>;
            border-radius: 3px;
            text-align: center;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);

            margin: 10px;
        }
        #content{
            background: url("<?php echo e(asset('images/symphony.png')); ?>") !important ;
        }
        .clients-grid li:before, .testimonials-grid li:before{
            border-left: 1px dashed #<?php echo e($site_color); ?> !important;
        }
        .clients-grid li:after, .testimonials-grid li:after{
            border-bottom: 1px dashed #<?php echo e($site_color); ?> !important;
        }
        .pricing-features ul li p{
            margin-bottom:0px !important;
        }
        .pricing-price{
            padding: 15px 0px 0px 0px !important;
        }
        .feature-box,.fbox-icon,.fancy-title h3{
            background: none !important;
        }
        label{
            color: #<?php echo e($site_color); ?> !important;
        }

    </style>


</head>
<body class="stretched" style="background-image: url('images/footer_lodyas.png')">
<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">


    <header id="header" class="full-header dark">

        <div id="header-wrap" class="">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="fa fa-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="<?php echo e(route('home')); ?>" class="standard-logo"><img
                                src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo"></a>
                    <a href="<?php echo e(route('home')); ?>" class="retina-logo"><img
                                src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-3">

                    <ul class="sf-js-enabled">

                        <li><a href="<?php echo e(route('home')); ?>">
                                <div>Home</div>
                            </a>
                        </li>
                        <li><a href="<?php echo e(route('staff-login')); ?>">
                                <div>Staff Login</div>
                            </a>
                        </li>
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="hidden-sm">
                                <a href="<?php echo e(url('menu/')); ?>/<?php echo e($m->id); ?>/<?php echo e(urlencode(strtolower($m->name))); ?>">
                                    <div><?php echo e($m->name); ?></div>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <li><a href="<?php echo e(route('contact-us')); ?>">
                                <div>Contact Us</div>
                            </a>
                        </li>


                    </ul>


                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header>


    <?php echo $__env->yieldContent('content'); ?>



    <footer id="footer" class="dark"
            style="background: url('<?php echo e(asset('images/footer-bg.jpg')); ?>') repeat fixed; background-size: 100% 100%;">

        <div class="container">


            <div class="footer-widgets-wrap clearfix">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" class="alignleft"
                             style="width: 100%; padding-right: 18px; border-right: 1px solid #4A4A4A; filter: brightness(0) invert(1);">
                    </div>

                    <div class="col-md-9 col-sm-12">
                        <p style="text-align: justify;">
                        <?php echo $footer_text; ?>

                        </p>
                    </div>


                </div><!-- row -->
            </div><!-- .footer-widgets-wrap end -->


        </div><!-- container -->


        <!-- Copyrights ============================================= -->
        <div id="copyrights">
            <div class="container clearfix">


                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <?php echo $footer_bottom_text; ?>

                    </div>

                </div>

                <!--
                <div class="col-md-6">

                <div class="pull-right" style="text-transform: uppercase; color: #fff;">
                TECHNOLOGY BY <a href="http://thesoftking.com/donation" target="_blank"> THESOFTKING </a>
                </div>

                </div>-->
            </div>
            <!-- Copyrights ============================================= -->


    </footer>


</div><!-- #wrapper end -->

<div id="gotoTop" class="fa fa-angle-up"></div>

<script type="text/javascript" src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/functions.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.countdown.js')); ?>"></script>
<script src="<?php echo e(asset('sweet-alert/sweetalert.min.js')); ?>"></script>
<script>
    <?php if(session()->has('message')): ?>
        swal({
        title: "<?php echo session()->get('title'); ?>",
        text: "<?php echo session()->get('message'); ?>",
        type: "<?php echo session()->get('type'); ?>",
        confirmButtonText: "OK"
    });
    <?php endif; ?>

</script>

<?php echo $__env->yieldContent('scripts'); ?>


</body>
</html>