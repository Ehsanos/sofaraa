<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>
    <section> 
        <h1 class="green-color m-auto text-center text-light px-4 text-dark my-4" style="font-size:35px !important"><?php echo e(__('lang.archive')); ?></h1>
        <div class="container">
            <div class="row justify-content-center">
                <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <figure class="snip1527" style="min-height: 320px; max-height: 400px">
                       
                            
                                                
                             <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <?php $__currentLoopData = $project->image_url; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo e($key); ?>"
                                                class="active" aria-current="true" aria-label="Slide <?php echo e($key+1); ?>"></button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="carousel-inner my-2 px-2" style="max-height: 600px !important">
                                    <?php $__currentLoopData = $project->image_url; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                        <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>">
                                                
                                             <img class="img-fluid w-100" src="<?php echo e(asset('public/images/project/'.$img)); ?>" alt="Image">
                                            
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
                            
                            
                            
                            
                            
                            
                            
                            
                            <figcaption class="w-100">
                                <div class="date">
                                    <span class="day"><?php echo e($project->total_amount); ?></span>
                                    <span class="month">$</span>
                                </div>
                                <h4><?php echo e(\Illuminate\Support\Str::substr($project->title->$lang,0,30)); ?>..</h4>
                                <p>
                                    <?php echo e(\Illuminate\Support\Str::substr($project->description->$lang,0,100)); ?>...
                                </p>
                            </figcaption>
                            <a href="<?php echo e(route('projects.show',$project)); ?>"></a>
                        </figure>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h3><?php echo e(__('lang.no_project')); ?></h3>
                <?php endif; ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                <?php echo e($projects->links()); ?>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/archive.blade.php ENDPATH**/ ?>