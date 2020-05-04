<?php $__env->startSection('content'); ?>


    <h1>Categories</h1>


    <div class="col-sm-6">

        <?php echo Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']); ?>

             <div class="form-group">
                 <?php echo Form::label('name', 'Name:'); ?>

                 <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

             </div>

             <div class="form-group">
                 <?php echo Form::submit('Create Category', ['class'=>'btn btn-primary']); ?>

             </div>
        <?php echo Form::close(); ?>




    </div>




    <div class="col-sm-6">


        <?php if($categories): ?>


            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created date</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($categories as $category): ?>

                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>"><?php echo e($category->name); ?></a></td>
                        <td><?php echo e($category->created_at ? $category->created_at->diffForHumans() : 'no date'); ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif; ?>



    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>