<?php $__env->startSection('content'); ?>





    <?php if(count($comments) > 0): ?>

        <h1>Comments</h1>


    <table class="table">
       <thead>
         <tr>
            <th>id</th>
            <th>Author</th>
            <th>Email</th>
             <th>Body</th>
          </tr>
        </thead>
        <tbody>

        <?php foreach($comments as $comment): ?>


          <tr>
              <td><?php echo e($comment->id); ?></td>
              <td><?php echo e($comment->author); ?></td>
              <td><?php echo e($comment->email); ?></td>
              <td><?php echo e($comment->body); ?></td>
            <td><a href="<?php echo e(route('home.post',$comment->post->id)); ?>">View Post</a></td>
              <td><a href="<?php echo e(route('admin.comment.replies.show', $comment->id)); ?>">View Replies</a></td>

              <td>

                  <?php if($comment->is_active == 1): ?>


                      <?php echo Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]); ?>



                      <input type="hidden" name="is_active" value="0">


                           <div class="form-group">
                               <?php echo Form::submit('Un-approve', ['class'=>'btn btn-success']); ?>

                           </div>
                      <?php echo Form::close(); ?>



                      <?php else: ?>



                      <?php echo Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]); ?>



                      <input type="hidden" name="is_active" value="1">


                      <div class="form-group">
                          <?php echo Form::submit('Approve', ['class'=>'btn btn-info']); ?>

                      </div>
                      <?php echo Form::close(); ?>





                  <?php endif; ?>



              </td>

              <td>


                  <?php echo Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]); ?>



                  <div class="form-group">
                      <?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

                  </div>
                  <?php echo Form::close(); ?>




              </td>


          </tr>


            <?php endforeach; ?>

       </tbody>
     </table>



        <?php else: ?>


        <h1 class="text-center">No Comments</h1>



    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>