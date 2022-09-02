<?php
    $lang=session('lang')??'ar';
?>
<?php $__env->startSection('content'); ?>



 <section>
      <div class="container"> 
     <div class="row justify-content-center">
         
         <div class="col-12"> <div class="ratio ratio-16x9"> <?php echo $about->video; ?> </div>
         </div>
     </div> 
      </div>
    <div class="row">
        
         <div class="col-lg-6 col-sm-12 px-5 py-5">
                 <?php echo $about->description->$lang; ?> 
         </div>
          <div class="col-md-6 col-sm-12">
                <?php $__currentLoopData = $about->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <center >
                    <img  class=" img-fluid  w-50 h-70" src="<?php echo e(asset('public/images/aboutUs/'.$image)); ?>" alt="Image">
                </center>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
    </div>
    
    
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u399325736/domains/sufraaalkhayr.com/public_html/sofa/resources/views/about.blade.php ENDPATH**/ ?>