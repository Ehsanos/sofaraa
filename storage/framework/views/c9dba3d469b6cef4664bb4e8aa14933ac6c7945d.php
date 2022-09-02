<?php
$lang = session('lang') ?? 'ar';

?>

    <!DOCTYPE html>
<html lang="<?php echo e($lang); ?>" dir="<?php echo e($lang=='ar'?'rtl':'ltr'); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo e($setting->name); ?></title>
    <style>
        .bg-green-light{
            background:#52b69a !important;
        }
        .bg-blue-light{
            background:#184e77 !important;
        }
        .snip1527 figcaption:before{
            background:#184e77 !important;
        }
    </style>
    <?php if($lang=='ar'): ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/bootstrap/css/bootstrap.min.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/styles.min.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/fonts/font-awesome.min.css')); ?>">
    <?php if($lang=='ar'): ?>
    <style>
        @font-face {
            font-face-name: 'cairo';
            src:'<?php echo e(asset('public/assets/fonts/cairo.ttf')); ?>',
           
        }
        *{
            font-family: 'cairo';
             font-size:20px !important;
        }
        body{
            min-height: 100vh;
              font-family: 'cairo';
        }
    </style>
    <?php else: ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Antonio&family=Raleway:wght@200&display=swap" rel="stylesheet">

<style>
      
        *{
            font-family: 'Antonio', sans-serif;
             font-size:20px !important;
        }
        body{
            min-height: 100vh;
             font-family: 'Antonio', sans-serif;
        }
    </style>
    <?php endif; ?>
</head>
<body>
<section class="bg-blue-light">
    <div class="container">
        <div class="row">
            <div class="col col-12 py-2 ">
                <div class="text-center d-xl-flex d-flex flex-row justify-content-between" style="margin: auto;">
                    <div class="d-flex flex-row justify-content-between d-md-block d-none">
                        <span class="mx-4 text-white"><?php echo e(__('lang.email')); ?> : <?php echo e($setting->email); ?></span>
                        <span class="mx-4 text-white"><?php echo e(__('lang.phone')); ?> : <?php echo e($setting->phone); ?></span>
                        <span class="mx-4 text-white"><?php echo e(__('lang.address')); ?> : <?php echo e($setting->address->$lang); ?></span>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <a class="mx-2" href="<?php echo e(route('setLang',['lang'=>'ar'])); ?>"><img width="30" src="<?php echo e(asset('public/assets/img/ksa.png')); ?>" alt=""
                                                                                        class="img-fluid"></a>
                        <a class="mx-2" href="<?php echo e(route('setLang',['lang'=>'en'])); ?>"><img width="30" src="<?php echo e(asset('public/assets/img/usa.png')); ?>" alt=""
                                                                                        class="img-fluid"></a>
                        <a class="mx-2" href="<?php echo e(route('setLang',['lang'=>'tr'])); ?>"><img width="30" src="<?php echo e(asset('public/assets/img/turk.webp')); ?>" alt=""
                                                                                        class="img-fluid"></a>
                    </div>
                </div>
            </div>
            <div class="col col-12">
                <div>
                    <a class="btn btn-md my-1 btn-success btn-block d-block d-md-none"
                       href="<?php echo e(route('payment')); ?>"><?php echo e(__('donate')); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg navbar-light bg-white " >
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('public/assets/img/logo.png')); ?>" class="img-fluid" width="150" height="75" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><?php echo e(__('lang.projects_us')); ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02">
                     <?php $__empty_1 = true; $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="dropdown dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($section->name->$lang); ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                <?php $__empty_2 = true; $__currentLoopData = $section->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('projects.show',$project)); ?>"><?php echo e($project->title->$lang); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <a class="dropdown-item" href="#"><?php echo e(__('lang.no_project')); ?></a>
                                <?php endif; ?>

                            </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <a class="dropdown-item" href="#"><?php echo e(__('lang.no_project')); ?></a>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>"><?php echo e(__('lang.home')); ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo e(__('lang.office_us')); ?>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php $__empty_1 = true; $__currentLoopData = $ofs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $of): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><a class="dropdown-item" href="#"><?php echo e($of->name->$lang); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li><a class="dropdown-item" href="#"><?php echo e(__('lang.no_office')); ?></a></li>
                        <?php endif; ?>

                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('campaigns')); ?>"><?php echo e(__('lang.campaigns')); ?></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><?php echo e(__('lang.archive')); ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02">

                        <?php $__empty_1 = true; $__currentLoopData = $nations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($nation->name->$lang); ?></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <?php $__empty_2 = true; $__currentLoopData = $nation->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <a class="dropdown-item" href="<?php echo e(route('projects',$section)); ?>"><?php echo e($section->title); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <a class="dropdown-item" href="#"><?php echo e(__('lang.no_project')); ?></a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <a class="dropdown-item" href="#"><?php echo e(__('lang.no_project')); ?></a>
                        <?php endif; ?>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo e(__('lang.about_us')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo e(__('lang.connect_us')); ?></a>
                </li>


            </ul>
            <div class="d-flex">

                <a class="btn btn-success d-none d-md-block" href="<?php echo e(route('payment')); ?>"><?php echo e(__('donate')); ?></a>
            </div>
        </div>
    </div>
</nav>
<?php echo $__env->yieldContent('content',); ?>

<div id="fixed-social">
    <div>
        <a class="fixed-facebook" href="<?php echo e($setting->face_book); ?>" target="_blank"><i
                class="fa fa-facebook"></i><span>&nbsp;Facebook</span></a>
    </div>
    <div>
        <a class="fixed-instagram" href="<?php echo e($setting->inestagram); ?>" target="_blank">
            <i class="fa fa-instagram"></i>
            <span>&nbsp;Instagram</span>
        </a>

    </div>
    <div>
        <a class="fixed-twitter" href="<?php echo e($setting->twitter); ?>" target="_blank"><i class="fa fa-twitter"></i><span>&nbsp;Twitter</span>
        </a>
    </div>
    <div>
        <a class="fixed-linkedin" href="<?php echo e($setting->linkedin); ?>" target="_blank"><i
                class="fa fa-linkedin"></i><span>&nbsp;Linkedin</span></a>
    </div>
    <div style="color: rgb(73,208,51);background: #37c345;">
        <a class="fixed-youtube" href="<?php echo e($setting->youtube); ?>" target="_blank" style="background: rgb(90,191,55);">
            <i class="fa fa-whatsapp"></i><span>&nbsp;Youtube</span>
        </a>
    </div>
</div>
<a href="<?php echo e(route('payment')); ?>" class="float bg-blue-light">

    <i class="fa fa-dollar my-float" style="color: rgb(255,255,255)"></i>
</a>
<section>
    <footer id="myFooter" class="bg-blue-light">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-12 col-sm-6 col-md-3">
                   
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('home')); ?></a></li>
                        <li><a href="<?php echo e(route('home')); ?>">Downloads<br></a></li>
                        <li><a href="<?php echo e(route('home')); ?>">Sign Up</a></li>
                        <li><a href="<?php echo e(route('home')); ?>">Other Links</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <h5>Our Company</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Company Information<br></a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help Desk<br></a></li>
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">External Links</a></li>
                    </ul>
                </div>
                <div class="col-md-3 social-networks">
                    <div></div>
                    <a class="facebook" href="<?php echo e($setting->face_book); ?>"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="<?php echo e($setting->twitter); ?>"><i
                            class="fa fa-twitter"></i></a>

                    <a class="linkedin" href="<?php echo e($setting->linkedin); ?>"><i
                            class="fa fa-linkedin"></i></a>
                    <a href="#" class="btn btn-primary" style="margin-top:20px; width: 150px ;font-size: 16px !important;" type="button">Contact us</a>
                </div>
            </div>
            <div class="row footer-copyright bg-green-light">
                <div class="col">
                    <p class="text-white">© 2016 Copyright Text ~ Designed By&nbsp;<a href="#">MySelf</a></p>
                    <!--<p class="float-left">الشركة المطورة :<a class="" href="https://mada-dev.tech">Mada</a></p>-->
                </div>
            </div>
        </div>
    </footer>
</section>
<script src="<?php echo e(asset('public/assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/script.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/bootstrap5-dropdown-ml-hack.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/u660431075/domains/mada-dev.tech/public_html/resources/views/layouts/master.blade.php ENDPATH**/ ?>