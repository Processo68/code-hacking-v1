<?php $__env->startSection('content'); ?>


    <h1>Edit User</h1>


    <div class="row">
    

        <div class="col-sm-3">


            <img src="<?php echo e($user->photo ? $user->photo->file : 'http://placehold.it/400x400'); ?>" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            <?php echo Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],'files'=>true]); ?>



            <div class="form-group">
                <?php echo Form::label('name', 'Name:'); ?>

                <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

            </div>


            <div class="form-group">
                <?php echo Form::label('email', 'Email:'); ?>

                <?php echo Form::email('email', null, ['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('role_id', 'Role:'); ?>

                <?php echo Form::select('role_id',  $roles , null, ['class'=>'form-control']); ?>

            </div>


            <div class="form-group">
                <?php echo Form::label('is_active', 'Status:'); ?>

                <?php echo Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), null , ['class'=>'form-control']); ?>

            </div>


            <div class="form-group">
                <?php echo Form::label('photo_id', 'Photo:'); ?>

                <?php echo Form::file('photo_id', null, ['class'=>'form-control']); ?>

            </div>



            <div class="form-group">
                <?php echo Form::label('password', 'Password:'); ?>

                <?php echo Form::password('password', ['class'=>'form-control']); ?>

            </div>





            <div class="form-group">
                <?php echo Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']); ?>

            </div>

            <?php echo Form::close(); ?>







             <?php echo Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]); ?>




                 <div class="form-group">
                    <?php echo Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-6']); ?>

                 </div>

               <?php echo Form::close(); ?>





        </div>



    </div>



    <div class="row">

        <?php echo $__env->make('includes.form_error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>