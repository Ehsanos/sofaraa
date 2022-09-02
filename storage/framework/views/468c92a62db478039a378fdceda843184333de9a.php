<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>

    <section>

<style>
    /*.video_post{*/
    /*    display:flex;*/
    /*    width:100%;*/
    /*    justify-content:center;*/
    /*    margin: 20px 0;*/
        
    /*}*/
    iframe{
        width:100%;
        /*height:100%;*/
    }
</style>
        <div class="container">
            <h1 class="my-4"><?php echo e($post->title->$lang); ?><br></h1>
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid w-100" src="<?php echo e(asset('public/images/post/'.$post->image)); ?>" alt="Image">
                </div>
                <div class="col-md-4">
                    <h3 class="my-3"><?php echo e(__('lang.description')); ?></h3>
                    <p><?php echo $post->description->$lang; ?></p>
                    <!--<h3 class="my-3"><?php echo e(__('lang.details')); ?> </h3>-->
                </div>
            </div>
            <div class="row justify-content-md-center">
            
            <div class="row justify-content-md-center">
              
                <div class="col col-sm-12  col-xs-12 col-md-8">
                 <?php echo $post->video; ?>

                </div>
             
              </div>
            
                <!--<div class="col-md-12 col-lg-6 "><br></div>-->
                <!--<div class="col col-lg-2"><?php echo $post->video; ?></div>-->
            </div>
            
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/post.blade.php ENDPATH**/ ?>