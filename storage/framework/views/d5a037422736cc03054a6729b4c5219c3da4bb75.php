<?php $__env->startSection('content'); ?>



    <!-- Blog Post -->

    <!-- Title -->
    <h1><?php echo e($post->title); ?></h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#"><?php echo e($post->user->name); ?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted <?php echo e($post->created_at->diffForHumans()); ?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="<?php echo e($post->photo->file); ?>" alt="">

    <hr>

    <!-- Post Content -->

    <p><?php echo e($post->body); ?></p>

    <hr>


    <?php if(Session::has('comment_message')): ?>

            <?php echo e(session('comment_message')); ?>



       <?php endif; ?>

    <!-- Blog Comments -->


<?php if(Auth::check()): ?>

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>


        <?php echo Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']); ?>



              <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">


             <div class="form-group">
                 <?php echo Form::label('body', 'Body:'); ?>

                 <?php echo Form::textarea('body', null, ['class'=>'form-control','rows'=>3]); ?>

             </div>

             <div class="form-group">
                 <?php echo Form::submit('Submit comment', ['class'=>'btn btn-primary']); ?>

             </div>
        <?php echo Form::close(); ?>



    </div>


<?php endif; ?>

    <hr>

    <!-- Posted Comments -->



<?php if(count($comments) > 0): ?>


        <?php foreach($comments as $comment): ?>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="<?php echo e(Auth::user()->gravatar); ?>" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo e($comment->author); ?>

                <small><?php echo e($comment->created_at->diffForHumans()); ?></small>
            </h4>
            <p><?php echo e($comment->body); ?></p>



            <?php if(count($comment->replies) > 0): ?>


                  <?php foreach($comment->replies as $reply): ?>


                        <?php if($reply->is_active == 1): ?>



                        <!-- Nested Comment -->
                        <div id="nested-comment" class=" media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="<?php echo e($reply->photo); ?>" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"<?php echo e($reply->author); ?>

                                    <small><?php echo e($reply->created_at->diffForHumans()); ?></small>
                                </h4>
                                <p><?php echo e($reply->body); ?></p>
                            </div>


                            <div class="comment-reply-container">


                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>


                                <div class="comment-reply col-sm-6">


                                        <?php echo Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']); ?>

                                             <div class="form-group">

                                                 <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>">

                                                 <?php echo Form::label('body', 'Body:'); ?>

                                                 <?php echo Form::textarea('body', null, ['class'=>'form-control','rows'=>1]); ?>

                                             </div>

                                             <div class="form-group">
                                                 <?php echo Form::submit('submit', ['class'=>'btn btn-primary']); ?>

                                             </div>
                                        <?php echo Form::close(); ?>



                                </div>

                          </div>
            <!-- End Nested Comment -->


                    </div>

                             <?php else: ?>


                                 <h1 class="text-center">No Replies</h1>




                            <?php endif; ?>

                     <?php endforeach; ?>

            <?php endif; ?>






        </div>
    </div>

     <?php endforeach; ?>

<?php endif; ?>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){


            $(this).next().slideToggle("slow");




        });




    </script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.blog-post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>