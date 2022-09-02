<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>
    <section>
        <h1 class="green-color m-auto bg-info text-light px-4"><?php echo e(__('lang.projects_us')); ?></h1>
        <div class="container">
            <div class="row justify-content-center">
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <figure class="snip1527" style="min-height: 320px; max-height: 400px">
                            <div class="image">
                                <img src="<?php echo e(asset('public/images/project/'.$project->image_url)); ?>"  alt="pr-sample25"/>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                <?php echo e($projects->links()); ?>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u660431075/domains/mada-dev.tech/public_html/resources/views/projects.blade.php ENDPATH**/ ?>