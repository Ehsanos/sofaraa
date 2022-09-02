<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>

    <section>

        <div class="container">
            <h1 class="my-4"><?php echo e($office->name->$lang); ?><br></h1>
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid w-100" src="<?php echo e(asset('public/images/office/'.$office->image_url)); ?>" alt="Image">
                </div>
                <div class="col-md-4">
                    <h3 class="my-3"><?php echo e(__('lang.description')); ?></h3>
                    <p><?php echo e($office->description->$lang); ?></p>
                    <ul class="list-inline">
                        <?php $__currentLoopData = $office->areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-inline-item mx-1"><a href="<?php echo e(route('projects.area',$area->id)); ?>"><?php echo e($area->name->$lang); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <!--<h3 class="my-3"><?php echo e(__('lang.details')); ?> </h3>-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     
                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/office.blade.php ENDPATH**/ ?>