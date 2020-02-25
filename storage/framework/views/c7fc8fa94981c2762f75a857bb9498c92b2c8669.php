<?php if(session('success') || @$success !== null): ?>
	<div class="message alert alert-info alert-dismissible animated fadeInDown" role="alert">
		<?php echo e(@$success != null ? $success : session('success')); ?>

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true" class="la la-close"></span>
		</button>
	</div>
	<script type="text/javascript">
		setTimeout(() => {
			$('body .message').fadeOut();
		},3000);
	</script>
<?php elseif(session('error') || @$error !== null): ?>
	<div class="message alert alert-danger alert-dismissible animated shake" role="alert">
		<?php echo e(@$error != null ? $error : session('error')); ?>

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true" class="la la-close"></span>
		</button>
	</div>
	<script type="text/javascript">
		setTimeout(() => {
			$('body .message').fadeOut();
		},3000);
	</script>
<?php endif; ?>

<style type="text/css">
	.message{
		width: 30%;
		position: fixed;
		bottom: 0;
		right: 1%;
	}
</style>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/notifications/resource/message.blade.php */ ?>