<link rel="stylesheet" href="<?php echo base_url('assets/admin/examples/css/pages/login-v2.css'); ?>">
<body class="animsition page-login-v2 layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <style>
        body {
            background: transparent;
        }
    </style>
    <!-- Page -->
    <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content">
            <div class="page-brand-info">
                <div class="brand">
                    <img class="brand-img" src="<?php echo base_url('assets/admin/images/logo1.png'); ?>" alt="...">
                    <h2 class="brand-text font-size-40">Student Management</h2>
                </div>
                <p class="font-size-20"> To awaken quite alone in a strange town is one of the pleasantest sensations in the world</p>
            </div>
            <div class="page-login-main animation-slide-right animation-duration-1">
                <div class="brand hidden-md-up">
                    <img class="brand-img" src="<?php echo base_url('assets/admin/images/logo1.png'); ?>" alt="...">
                    <h3 class="brand-text font-size-40">Student Management</h3>
                </div>
                <h3 class="font-size-24">Sign In</h3>
                <p>It's about finding yourself...!</p>
                 <?php $arr=array('class'=>"form-horizontal",'id'=>"LoginForm");
                            echo form_open_multipart('auth/login',$arr); ?>
                    <div class="form-group">
                        <label class="sr-only" for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    </div>
                    <div class="form-group clearfix">
                        <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <label for="rememberMe">Remember me</label>
                        </div>
                        <a class="float-right" href="forgot-password.html">Forgot password?</a>
                    </div>
                    <?php if($this->session->flashdata('error')) { ?>
                        <?php echo $this->session->flashdata('error'); ?>
                    <?php } ?>
                    <?php if($this->session->flashdata('success')) { ?>
                        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                <?php echo form_close(); ?>
                <p>No account? <a href="<?php echo base_url('register');?>">Sign Up</a></p>
                <footer class="page-copyright">
                    <p>Crafted with <i class="red-600 wb wb-heart"></i></p>
                    <p>© 2017. All RIGHT RESERVED.</p>
                    <div class="social">
                        <a class="btn btn-icon btn-round social-twitter mx-5" href="javascript:void(0)">
                            <i class="icon bd-twitter" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-round social-facebook mx-5" href="javascript:void(0)">
                            <i class="icon bd-facebook" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-round social-google-plus mx-5" href="javascript:void(0)">
                            <i class="icon bd-google-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- End Page -->