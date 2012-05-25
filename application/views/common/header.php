<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Curatr Peer Marking Showcase</title>
		<link href="<?php echo bootcss_url(); ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo datatablescss_url(); ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo css_url('style'); ?>" type="text/css" rel="stylesheet" />
		<script src="<?php echo js_url('jquery'); ?>"></script>
		<script src="<?php echo js_url('jquery.validate.min'); ?>"></script>
		<script src="<?php echo bootjs_url(); ?>"></script>
		<script src="<?php echo datatablesjs_url(); ?>"></script>
		<script src="<?php echo js_url('common'); ?>"></script>
		<script type='text/javascript'>
			$(document).ready(init);
			
			function init(){
				$('.validate').validate();
			}
		</script>
	</head>
	<body>
		<div id="page">
			