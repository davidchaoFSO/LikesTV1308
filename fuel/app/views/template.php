<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LikesTV | <?php echo $title; ?></title>
	<?php 
	echo Asset::css('bootstrap.min.css');
	echo Asset::css('bootstrap-responsive.min.css');
	echo Asset::css('likestv.css'); 



	?>
	<style>
		body { margin: 40px 0px 0px 0px; }
	</style>
	
</head>
<body>
	<div class="container-fluid">
		<div class="span12">
			
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
	<div class = "footer">
			<p>&copy;LikesTV 2013. All rights reserved.</p>
</div>

<?php 
echo Asset::js('http://code.jquery.com/jquery-1.10.0.min.js');
echo Asset::js('bootstrap.min.js');

?>
</body>

</html>
