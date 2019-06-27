<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo e($site_title); ?> - <?php echo e($page_title); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- ASSETS -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/uniform/css/uniform.default.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/global/css/components-rounded.min.css')); ?>" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/global/css/plugins.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/layouts/layout/css/layout.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/layouts/layout/css/themes/darkblue.min.css')); ?>" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="<?php echo e(asset('assets/layouts/layout/css/custom.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <!-- END ASSETS -->

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('//cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css')); ?>">

    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>"/>


    <style>
        @media (min-width: 768px) {
            .abir {
                margin-left: 66px !important;
                margin-top: -44px !important;
            }

            .abir2 {
                margin-left: 166px !important;
                margin-top: -44px !important;
            }

            .abir3 {
                margin-top: -20px !important;
            }
        }
    </style>
    <?php echo $__env->yieldContent('style'); ?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">


        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="">
                <img src="<?php echo asset('images/logo.png'); ?>" class="logo-default" alt="-"
                     style="filter: brightness(0) invert(1); width: 150px;height: 45px" />

            </a>

            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <!-- END LOGO -->


        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">


                        <span class="username"> Welcome, <?php echo Auth::guard('admin')->user()->name; ?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li><a href="<?php echo route('change-pass'); ?>"><i class="fa fa-cogs"></i> Change Password </a>
                        </li>
                        <li><a href="<?php echo route('logout'); ?>"><i class="fa fa-sign-out"></i> Log Out </a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END HEADER -->


<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">


            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler"></div>
                </li>


                <li class="nav-item start">
                    <a href="<?php echo route('dashboard'); ?>" class="nav-link ">
                        <i class="icon-home"></i><span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo route('loan-installment'); ?>" class="nav-link nav-toggle"><i class="fa fa-list-alt"></i>
                        <span class="title">Loan Installment</span></a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo route('depositor-installment'); ?>" class="nav-link nav-toggle"><i class="fa fa-list-alt"></i>
                        <span class="title">Depositor Installment</span></a>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-user"></i>
                        <span class="title">Manage Loaner</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo route('lend-create'); ?>" class="nav-link"><i class="fa fa-plus"></i> New Loan</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo route('lend-show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> All Loan</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-user"></i>
                        <span class="title">Manage Depositor</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo route('depositor-create'); ?>" class="nav-link"><i class="fa fa-plus"></i> New Depositor</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo route('depositor-show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> All Depositor</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-bars"></i>
                        <span class="title">Loan Package</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo route('loan-create'); ?>" class="nav-link"><i class="fa fa-plus"></i> Add New Package</a>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo route('lend-calc'); ?>" class="nav-link"><i class="fa fa-desktop"></i> Calculate Loan</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo route('loan-show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> View All Package</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-bars"></i>
                        <span class="title">Deposit Package</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo route('deposit-create'); ?>" class="nav-link"><i class="fa fa-plus"></i> Add New Package</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo route('deposit-show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> View All Package</a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-server"></i>
                        <span class="title">Installment Type</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo route('type-create'); ?>" class="nav-link"><i class="fa fa-plus"></i> Add New Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo route('type-show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> View All Type</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-users"></i>
                        <span class="title">Manage Staff</span><span class="arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo route('staff-create'); ?>" class="nav-link"><i class="fa fa-plus"></i> Add New Staff</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo route('staff-show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> View All Staff</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-money"></i>
                        <span class="title">Manage Currency</span><span class="arrow"></span></a>
                    <ul class="sub-menu">

                        <li class="nav-item">
                            <a href="<?php echo route('currency-create'); ?>" class="nav-link"><i class="fa fa-plus"></i> Add Currency</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo route('currency_show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> View Currency</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo route('manage-testimonial'); ?>" class="nav-link"><i class="fa fa-align-left"></i>
                        Manage Testimonial </a>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-cogs"></i>
                        <span class="title">Web Setting</span><span class="arrow"></span></a>
                    <ul class="sub-menu">

                        <li class="nav-item">
                            <a href="<?php echo route('general-setting'); ?>" class="nav-link"><i class="fa fa-cogs"></i>
                                General Setting </a>
                        </li>

                        <li class="nav-item"><a href="<?php echo route('slider'); ?>" class="nav-link"><i
                                        class="fa fa-cogs"></i> Slider Setting </a></li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-cogs"></i>
                                <span class="title"> Menu Setting</span><span class="arrow"></span></a>

                            <ul class="sub-menu">
                                <li class="nav-item"><a href="<?php echo route('menu_create'); ?> " class="nav-link"><i class="fa fa-plus"></i> ADD Menu</a></li>
                                <li class="nav-item"><a href="<?php echo route('menu_show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> View Menu's</a></li>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-cogs"></i>
                                <span class="title"> API Settings</span><span class="arrow"></span></a>

                            <ul class="sub-menu">
                                <li class="nav-item"><a href="<?php echo route('api_create'); ?> " class="nav-link"><i class="fa fa-plus"></i> ADD API</a></li>
                                <li class="nav-item"><a href="<?php echo route('api_show'); ?>" class="nav-link"><i class="fa fa-desktop"></i> View API's</a></li>
                            </ul>
                            
                        </li>


                    </ul>
                </li>

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->


    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper" >
        <div class="page-content">
            <h3 class="page-title"><?php echo $page_title; ?> </h3>
            <hr>


            <!--  ==================================VALIDATION ERRORS==================================  -->
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $error; ?>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <!--  ==================================SESSION MESSAGES==================================  -->

            <?php echo $__env->yieldContent('content'); ?>


        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->


<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?php echo date("Y")?> &copy; All Copyright Reserved.</div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->


<!-- BEGIN SCRIPTS -->
<script src="<?php echo e(asset('assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/js.cookie.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/uniform/jquery.uniform.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/scripts/app.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/layouts/layout/scripts/layout.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/layouts/layout/scripts/demo.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/layouts/global/scripts/quick-sidebar.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/pages/scripts/table-datatables-buttons.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js')); ?>"></script>
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