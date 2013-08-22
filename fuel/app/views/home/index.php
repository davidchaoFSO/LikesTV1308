
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</a>
		<a class="brand" href=""><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
		<div class="nav-collapse collapse">
		<ul class="nav">
			<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('home/','Home');?></li>
		<?php if($user): ?>
			<li class='<?php echo Arr::get($subnav, "channels" ); ?>'><?php echo Html::anchor('channels/','Channels');?></li>
			<li class='<?php echo Arr::get($subnav, "preferences" ); ?>'><?php echo Html::anchor('preferences/','Preferences');?></li>
		<?php endif; ?>
			<li class='<?php echo Arr::get($subnav, "about" ); ?>'><?php echo Html::anchor('about/','About Us');?></li>
			<li class='<?php echo Arr::get($subnav, "testimonials" ); ?>'><?php echo Html::anchor('testimonials/','Testimonials');?></li>
			<li class='<?php echo Arr::get($subnav, "contact" ); ?>'><?php echo Html::anchor('contact/','Contact Us');?></li>
		<?php if ($user): ?>
			<li class=''><?php echo Html::anchor($logoutUrl,'Log Out');?></li>
		<?php endif; ?>
		</ul>
	</div>
	</div>
</div>

<?php
/*
// Test Login Button
if ($user){
echo '<h2>Welcome '.$user_profile["first_name"].'!</h2>';
//echo '<a href="'.$logoutUrl.'" class="btn btn-large btn-primary">Facebook Logout</a>';
}
else{
	echo '<h2>You are not logged in.</h2>';
//	echo '<a href="'.$loginUrl.'" class="btn btn-large btn-primary">Facebook Login</a>';
}*/

echo Asset::img('likestvsplashfinal.png', array("alt" => "LikesTV", "class"=>"splashimg"));

echo HTML::anchor($url,Asset::img('FBLogin_278x44.png', array("alt" => "Log In Here!")),array("class"=>"loginbtn"));


?>