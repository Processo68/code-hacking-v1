<?php $__env->startSection('styles'); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    
    
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>


    <h1>Upload Media</h1>

    <?php echo Form::open(['method'=>'POST', 'action'=> 'AdminMediasController@store', 'class'=>'dropzone']); ?>





    <?php echo Form::close(); ?>





<?php $__env->stopSection(); ?>





<?php $__env->startSection('scripts'); ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>