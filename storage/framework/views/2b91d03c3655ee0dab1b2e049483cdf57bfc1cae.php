<?php $__env->startSection('content'); ?>


    <h1>Media</h1>

    <?php if($photos): ?>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>


            <?php foreach($photos as $photo): ?>

                <tr>
                    <td><?php echo e($photo->id); ?></td>
                    <td><img height="50" src="<?php echo e($photo->file); ?>" alt=""></td>
                    <td><?php echo e($photo->created_at ? $photo->created_at : 'no date'); ?></td>
                    <td>

                        <?php echo Form::open(['method'=>'DELETE', 'action'=> ['AdminMediasController@destroy', $photo->id]]); ?>



                             <div class="form-group">
                                 <?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

                             </div>
                        <?php echo Form::close(); ?>





                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>