<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>
    <section>
        <h1 class=" text-center my-5  text-dark px-4" style="font-size:32px !important"><?php echo e(__('lang.campaigns')); ?></h1>
        <div class="container">
            <div class="row justify-content-center">
                <?php $__currentLoopData = $campaings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">

                        <figure class="snip1527" style="min-height: 320px; max-height: 400px">
                            <div class="image">
                                <img src="<?php echo e(asset('public/images/camping/'.$com->image_url->$lang)); ?>" class="w-100"  height="320px"  alt="pr-sample25"/>
                            </div>
                            <figcaption class="w-100">
                                <?php if($com->status): ?>
                                <i class="fa fa-star fa-2x green-color"></i>
                                <?php endif; ?>
                                <div class="date">
                                    <span class="day"><?php echo e($com->total_amount); ?></span>
                                    <span class="month">$</span>
                                </div>
                                <h4><?php echo e(\Illuminate\Support\Str::substr($com->title->$lang,0,30)); ?>..</h4>
                               <!-- <p>
                                    <?php echo e(\Illuminate\Support\Str::substr($com->description->$lang,0,100)); ?>...
                                </p>-->
                            </figcaption>
                            <a href="<?php echo e(route('campaigns.show',['campaign'=>$com])); ?>"></a>
                        </figure>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                <?php echo e($campaings->links()); ?>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/campaigns.blade.php ENDPATH**/ ?>