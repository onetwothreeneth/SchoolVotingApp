<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<div class="alert alert-danger"> 
            <?php echo e($error); ?>

		</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php endif; ?>

<?php if(session('error')): ?> 
	<div class="alert alert-danger"> 
        <?php echo e(session('error')); ?>

	</div> 
<?php endif; ?>

<?php if(session('success')): ?> 
	<div class="alert alert-success"> 
        <?php echo e(session('success')); ?>

	</div> 
<?php endif; ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/errors/forms/index.blade.php */ ?>