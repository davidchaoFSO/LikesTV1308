<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Find live video games on Twitch by game" name="description">
	<meta content="likestv, video game streams, twitch streams, watch live streams, watch streams, watch video games, watch games, live streams, facebook, video games" name="keywords">
	<title>LikesTV | <?php echo $title; ?></title>
	<?php 
	echo Asset::css('bootstrap.min.css');
	echo Asset::css('bootstrap-responsive.min.css');
	echo Asset::css('likestv.css'); 



	?>
	<style>
		body { margin: 40px 0px 0px 0px; }
	</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43580000-1', 'gopagoda.com');
  ga('send', 'pageview');

</script>
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
