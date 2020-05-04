<?php $__env->startSection('content'); ?>


    <h1>Posts</h1>


    <table class="table">
       <thead>
         <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Owner</th>
             <th>Category</th>
             <th>Title</th>
             <th>body</th>
             <th>Post link</th>
             <th>Comments</th>
             <th>Created at</th>
             <th>Update</th>
        </thead>
        <tbody>

        <?php if($posts): ?>


            <?php foreach($posts as $post): ?>

          <tr>
              <td><?php echo e($post->id); ?></td>
              <td><img height="50" src="<?php echo e($post->photo ? $post->photo->file : 'http://placehold.it/400x400'); ?> " alt=""></td>
              <td><a href="<?php echo e(route('admin.posts.edit', $post->id)); ?>"><?php echo e($post->user->name); ?></a></td>
              <td><?php echo e($post->category ? $post->category->name : 'Uncategorized'); ?></td>
              <td><?php echo e($post->title); ?></td>
              <td><?php echo e(str_limit($post->body, 30)); ?></td>
              <td><a href="<?php echo e(route('home.post', $post->slug)); ?>">View Post</a></td>
              <td><a href="<?php echo e(route('admin.comments.show', $post->id)); ?>">View Comments</a></td>
              <td><?php echo e($post->created_at->diffForhumans()); ?></td>
              <td><?php echo e($post->updated_at->diffForhumans()); ?></td>

          </tr>

            <?php endforeach; ?>

            <?php endif; ?>

       </tbody>
     </table>



    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            <?php echo e($posts->render()); ?>


        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>