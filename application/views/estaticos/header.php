<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Cache-control" content="private">
	<title><?= @$title; ?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>css/foundation.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/normalize.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/font-awesome.min.css">
	<?php foreach($css as $style): ?>
		<link rel="stylesheet" href="<?= base_url(); ?>css/<?=@$style.'?v='.rand(0,99); ?>">
	<?php endforeach; ?>
	<script src="<?= base_url(); ?>js/vendor/modernizr.js"></script>
	<script src="<?= base_url(); ?>js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>js/vendor/fastclick.js"></script>
	<script src="<?= base_url(); ?>js/foundation.min.js"></script>
	<script src="<?= base_url(); ?>js/admin/accesos.js<?= '?v='.rand(0,99); ?>"></script>
	<?php foreach($js as $script): ?>
	<script src="<?= base_url(); ?>js/<?= @$script.'?v='.rand(0,99); ?>"></script>
	<?php endforeach; ?>
	<script type="text/javascript">
		$(document).foundation({
	 	  equalizer : {
	    // Specify if Equalizer should make elements equal height once they become stacked.
		  equalize_on_stack: true
		  	},reveal : {
		    animation_speed: 500
		  },
		  tooltip : {
		    disable_for_touch: true
		  },
		  topbar : {
		    custom_back_text: false,
		    is_hover: false,
		    mobile_show_parent_link: true
		  }})
	</script>
</head>
<body>
