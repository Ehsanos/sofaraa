<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>

    <section>
        <?php if(!empty($campaign->vedio_url)): ?>
        <div class="d-block d-flex justify-content-center embed-responsive-16by9">

       <?php echo $campaign->vedio_url; ?>

        </div>
        <?php endif; ?>
        <div class="container">
            <h1 class="my-4"><?php echo e($campaign->title->$lang); ?><br></h1>
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid w-100" src="<?php echo e(asset('public/images/camping/'.$campaign->image_url->$lang  )); ?>" alt="Image">
                </div>
                <div class="col-md-4">
                    <h3 class="my-3"><?php echo e(__('lang.description')); ?></h3>
                    <p><?php echo $campaign->description->$lang; ?></p>
                    <h3 class="my-3"><?php echo e(__('lang.details')); ?> </h3>
                    <ul class="list-unstyled">
                        <li><span class="green-color"><?php echo e(__('lang.target')); ?> : </span><?php echo e($campaign->total_amount); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.current')); ?> : </span><?php echo e($campaign->current_amount); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.num_donate')); ?> : </span><?php echo e($campaign->number_of_donors); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.section')); ?> : </span><?php echo e($campaign->section->name->$lang); ?></li>
                        <li><span class="green-color"><?php echo e(__('lang.state')); ?> : </span><?php if($campaign->status): ?><?php echo e(__('lang.active_pro')); ?> <?php else: ?> <?php echo e(__('lang.unactive_pro')); ?> <?php endif; ?></li>
                          <li><span class="green-color"><?php echo e(__('lang.country')); ?> : </span>
                          
                              
                              <?php $__currentLoopData = $campaign->nations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <span > <?php echo e($nation->name->$lang); ?> <?php if($key+1 <count($campaign->nations)): ?><span style="font-weight: bold"> ,</span> <?php endif; ?> </span>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                        

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><br></div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/camp.blade.php ENDPATH**/ ?>