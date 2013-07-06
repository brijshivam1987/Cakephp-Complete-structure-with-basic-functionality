<script type="text/javascript">
  function generate(message,type,position) {
	var n = noty({
		text: message,
		layout: position,
		type: type,
	  	animateOpen: {"opacity": "show"}
	});
	//console.log('html: '+n.options.id);
	return n;
  }
</script>
<script type="text/javascript">
	generate('<?php echo $message; ?>','<?php echo $class; ?>','<?php echo $position; ?>');
</script>






