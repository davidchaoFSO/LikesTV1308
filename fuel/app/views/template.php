<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LikesTV | <?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px 0px; }
	</style>
</head>
<body>
	<div class="container">
		<div class="span12">
			<h1><?php echo $title; ?></h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-error">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="span12">
<?php echo $content; ?>
		</div>
		
	</div>
</body>
<footer style="background-color:black;padding: 20px 0;margin:20px 0">
			<center style="color:white">&copy;LikesTV 2013. All rights reserved.</center>
</footer>
</html>
