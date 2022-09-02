<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>

    <section>
     
        <div class="container">
           
            <div class="row">
                <div class="col-md-12">
                         <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $__currentLoopData = $project['images_'.$lang]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo e($key); ?>"
                        class="active" aria-current="true" aria-label="Slide <?php echo e($key+1); ?>"></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="carousel-inner my-2 px-2" style="max-height: 600px !important">
            <?php $__currentLoopData = $project['images_'.$lang]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
    
               
                    
                    
                    
                    
                    
                    
                  
                </div>
                <div class="col-md-4">
                     <h1 class="my-4"><?php echo e($project->title->$lang); ?><br></h1>
                    <h3 class="my-3"><?php echo e(__('lang.description')); ?></h3>
                    <p><?php echo $project->description->$lang; ?></p>
                    <h3 class="my-3"><?php echo e(__('lang.details')); ?> </h3>
                    <ul class="list-unstyled">
                        <li><span class="green-color"><?php echo e(__('lang.target')); ?> : </span><?php echo e($project->total_amount); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.current')); ?> : </span><?php echo e($project->current_amount); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.num_donate')); ?> : </span><?php echo e($project->number_of_donors); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.section')); ?> : </span><?php echo e($project->section->name->$lang); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.state')); ?> : </span><?php if($project->finish_state): ?><?php echo e(__('lang.active_pro')); ?> <?php else: ?> <?php echo e(__('lang.unactive_pro')); ?> <?php endif; ?></li>


                    </ul>
                </div>
                <div class="col-md-8">
                       <?php if(!empty($project->vedio_url)): ?>
        <div class="d-block d-flex justify-content-center embed-responsive-16by9">

       <?php echo $project->vedio_url; ?>

        </div>
        <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><br></div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/project.blade.php ENDPATH**/ ?>