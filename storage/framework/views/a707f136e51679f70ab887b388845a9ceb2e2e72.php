<?php $__env->startSection('content'); ?>


    <h1>Categories</h1>


    <div class="col-sm-6">

        <?php echo Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]); ?>

        <div class="form-group">
            <?php echo Form::label('name', 'Name:'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6 ']); ?>

        </div>
        <?php echo Form::close(); ?>



        <?php echo Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]); ?>



        <div class="form-group">
            <?php echo Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']); ?>

        </div>
        <?php echo Form::close(); ?>




    </div>




    <div class="col-sm-6">






    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>