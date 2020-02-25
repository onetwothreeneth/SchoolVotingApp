<script type="text/javascript">
	$('body .confirm-add').click(() => {
		if(!window.confirm('Are you sure you want to add this ?')){
			return false;
		}
	});
	$('body .confirm-save').click(() => {
		if(!window.confirm('Are you sure you want to save this changes ?')){
			return false;
		}
	});
	$('body .confirm-delete').click(() => {
		if(!window.confirm('Are you sure you want to delete this ?')){
			return false;
		}
	}); 
	$('body .confirm-reset').click(() => {
		if(!window.confirm('Are you sure you want to reset this ?')){
			return false;
		}
	}); 
</script>