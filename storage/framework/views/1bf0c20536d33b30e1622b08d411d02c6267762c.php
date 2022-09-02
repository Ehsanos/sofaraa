<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>
    <section>
        <h1 class="green-color m-auto text-center text-dark text-light px-4 my-4" style="font-size:35px !important;"><?php echo e(__('lang.news')); ?></h1>
        <div class="container">
            <div class="row justify-content-center">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <figure class="snip1527" style="min-height: 320px; ">
                            <div class="image">
                                <img src="<?php echo e(asset('public/images/post/'.$post->image)); ?>" class="w-100"  height="320px"  alt="pr-sample25"/>
                            </div>
                            <figcaption class="w-100">
                               
                                <h4><?php echo e(\Illuminate\Support\Str::substr($post->title->$lang,0,30)); ?>..</h4>
                              <!--  <p>
                                    <?php echo e(\Illuminate\Support\Str::substr($post->description->$lang,0,100)); ?>...
                                </p>-->
                            </figcaption>
                            <a href="<?php echo e(route('posts.show',$post)); ?>"></a>
                        </figure>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"></div>
                <?php echo e($posts->links()); ?>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/news.blade.php ENDPATH**/ ?>