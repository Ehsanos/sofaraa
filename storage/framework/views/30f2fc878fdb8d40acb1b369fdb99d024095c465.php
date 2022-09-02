<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>
 
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo e($key); ?>"
                        class="active" aria-current="true" aria-label="Slide <?php echo e($key+1); ?>"></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="carousel-inner my-2 px-2" style="max-height: 600px !important">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>">
                    
                
                    <img src="<?php echo e(asset('public/images/slider/'.$slider->url->$lang)); ?>" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="bottom:75%">
                        <!--<?php if($slider->title->$lang!=''): ?>-->
                        <!--    <h5><?php echo e($slider->title->$lang); ?></h5>-->
                        <!--<?php endif; ?>-->
                        <?php if($slider->description->$lang!='' &&$slider->description->$lang!=null &&$slider->description->$lang!="null"): ?>
                            <p style=""><?php echo $slider->description->$lang; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section>
        <div>
            <marquee bgcolor="#184e77" direction="<?php echo e($lang=='ar'?'right':'left'); ?>" height="50">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>&nbsp;&nbsp;  <a class="d-inline-block py-2 text-light text-decoration-none"
                                                          href="<?php echo e($post->$lang); ?>"><?php echo e($post->$lang); ?></a>&nbsp;
                &nbsp;  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </marquee>
        </div>
    </section>
    <section class="testimonials-clean pb-3">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?php echo e(__('lang.testimonials')); ?> </h2>
              <!--  <p class="text-center"><?php echo e(__('lang.testimonials_description')); ?></p>-->
            </div>
            <div class="row">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 " >
                       <div class="card"  style="background: transparent;">
                            <div class="card-header  d-flex flex -row justify-content-start" style="background: transparent;
box-shadow: none;
border: none;">
                                <img class="" style="border-radius:50%;" src="<?php echo e(asset('public/images/testimonial/'.$testimonial->url)); ?>" width="60" height="50">
                                 <h5 class="name"><?php echo e($testimonial->title->$lang); ?></h5>
                                </div>
                        <div class="card-body" >
                            <p class="description" style=""><?php echo e($testimonial->description->$lang); ?></p>
                           
                        </div>
                       </div>
                       
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
    <section id="count-down" class="py-5  text-white">
        <div class="container text-center boxed-countdown" data-countdown="">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="text-light p-4 text-center" style="font-size:20px; font-weight:bold;background:#52b69a"><?php echo e(__('lang.statistics')); ?></h1>
                    <!--<p><?php echo e(__('lang.statistics_description')); ?><br></p>-->
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-days m-0 rounded-top"><?php echo e($count_office); ?></p>
                    <p class="text-countdown rounded-bottom"><?php echo e(__('lang.office_us')); ?></p>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-hours m-0 rounded-top"><?php echo e($count_camp); ?></p>
                    <p class="text-countdown rounded-bottom"><?php echo e(__('lang.campaigns')); ?></p>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-minutes m-0 rounded-top"><?php echo e($areas); ?></p>
                    <p class="text-countdown rounded-bottom"><?php echo e(__('lang.areas')); ?></p>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-seconds m-0 rounded-top"><?php echo e($count_projects); ?></p>
                    <p class="text-countdown rounded-bottom"><?php echo e(__('lang.projects_us')); ?></p>
                </div>
            </div>
        </div>

    </section>
    <section>
        <h1 class="text-light m-auto   p-4 text-center" style="font-size:20px; font-weight:bold;background:#133e5f"><?php echo e(__('lang.campaigns_active')); ?></h1>
        <div class="container">
          <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000" data-bs-pause="false" id="carousel-top-margin">
            <div class="carousel-inner" style="max-height:unset  !important;">
               
                <?php $__currentLoopData = $comps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key%4==0): ?>
                    <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>" style="background: #ffffff;">
                        <div class="row g-0 slider-row justify-content-center">
                <?php endif; ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <figure class="snip1527" style="min-height: 320px; max-height: 320px">
                                        <div class="image">
                                            <img src="<?php echo e(asset('public/images/camping/'.$comp->image_url->$lang)); ?>" class="w-100"  height="320px"  alt="pr-sample25"/>
                                        </div>
                                        <figcaption class="w-100">
                                            <div class="date">
                                                <span class="day"><?php echo e($comp->total_amount); ?></span>
                                                <span class="month text-danger">$</span>
                                            </div>
                                            <h4><?php echo e(\Illuminate\Support\Str::substr($comp->title->$lang,0,25)); ?>..</h4>
                                           <!-- <p class="text-samll" style="min-height:120px">
                                                <?php echo e(\Illuminate\Support\Str::substr($comp->description->$lang,0,45)); ?>...
                                            </p>-->
                                        </figcaption>
                                        <a href="<?php echo e(route('campaigns.show',['campaign'=>$comp])); ?>"></a>
                                    </figure>
                                </div>
                <?php if(($key+1)%4==0): ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
            
        
        </div>
    </section>
    <section class="mt-1">
        <h1 class="text-light m-auto   p-4 text-center" style="font-size:20px; font-weight:bold;background:#52b69a"><?php echo e(__('lang.news')); ?></h1>
        
        
        
        
        <div class="container ">
            
         <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false" id="carousel-top-margin">
            <div class="carousel-inner" style="max-height:unset  !important;">
               
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key%4==0): ?>
                    <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>" style="background: #ffffff;">
                        <div class="row g-0 slider-row justify-content-center">
                <?php endif; ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                        <figure class="snip1527" style=" max-height: 320px">
                            <div class="image">
                                <img src="<?php echo e(asset('public/images/post/'.$post->image)); ?>" class="w-100"  height="320px" alt="pr-sample25"/>-->
                            </div>
                            <figcaption class="w-100">
                                
                                <h4><?php echo e(\Illuminate\Support\Str::substr($post->title->$lang,0,25)); ?>..</h4>
                                <!--<p class="text-small" style="min-heght:120px;">
                                    <?php echo e(\Illuminate\Support\Str::substr($post->description->$lang,0,45)); ?>...
                                </p>-->
                            </figcaption>
                            <a href="<?php echo e(route('posts.show',$post)); ?>"></a>
                        </figure>
                    </div>
                       
                    <?php if(($key+1)%4==0): ?>
                        </div>
                    </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="d-none"><a class="carousel-control-prev" href="#carousel-top-margin" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-top-margin" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        </div>
            
            
            
            
            
            
         
        </div>
        
        
        
        
        
    </section>
    <section class="my-4">
        <h1 class="text-light   p-4 text-center" style="font-size:20px; font-weight:bold;background:#133e5f"><?php echo e(__('lang.partner')); ?></h1>
        <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000" data-bs-pause="false" id="carousel-top-margin">
            <div class="carousel-inner">
               
                <?php $__currentLoopData = $partner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$par): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($key%4==0): ?>
                    <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>" style="background: #ffffff;">
                        <div class="row g-0 slider-row justify-content-center">
                <?php endif; ?>
                            <div class="col-3">
                                <img class="img-fluid rounded " style="max-height: 100px" src="<?php echo e(asset('public/images/partner/'.$par->image)); ?>">
                                <!--<div class="card card-body border-0">
                                    <div class="card-body text-center" style="border-radius: 15px;">
                                         
                                    </div>
                                </div>-->
                            </div>
                       
                    <?php if(($key+1)%4==0): ?>
                        </div>
                    </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="d-none"><a class="carousel-control-prev" href="#carousel-top-margin" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-top-margin" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        </div>
    </section>
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/index.blade.php ENDPATH**/ ?>