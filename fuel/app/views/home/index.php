<?php 

// Facebook API setup

require APPPATH.'facebook.php'; 

$facebook = new Facebook(array(
  'appId' => '515649145162571',
  'secret' => '46c7fe25ef7c1c7e03059024049d676f',
));

$user = $facebook->getUser();

// The redirect is needed because facebook's logout url function doesn't actually clear session variables

$sessionlogout = 'http://localhost:8888/likestv/public/logout';

if ($user) {

  $logoutUrl = $facebook->getLogoutUrl( array('next' => $sessionlogout));

  try {

    // Retrieve profile information since user is logged in
  	$user_profile = $facebook->api('/me');
    
    
  } catch (FacebookApiException $e) {

    error_log($e);
    $user = null;

  }

} else {
  $loginUrl = $facebook->getLoginUrl(array('scope'=>'user_likes'));
}

?>



<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="brand" href="#"><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
		<ul class="nav">
			<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('home/index','Home');?></li>
			<li class='<?php echo Arr::get($subnav, "channels" ); ?>'><?php echo Html::anchor('channels/index','Channels');?></li>
			<li class='<?php echo Arr::get($subnav, "preferences" ); ?>'><?php echo Html::anchor('preferences/index','Preferences');?></li>
			<li class='<?php echo Arr::get($subnav, "about" ); ?>'><?php echo Html::anchor('about/index','About Us');?></li>
			<li class='<?php echo Arr::get($subnav, "testimonials" ); ?>'><?php echo Html::anchor('testimonials/index','Testimonials');?></li>
			<li class='<?php echo Arr::get($subnav, "contact" ); ?>'><?php echo Html::anchor('contact/index','Contact Us');?></li>
		</ul>
	</div>
</div>

<?php



// Test Login Button

if ($user){
echo '<h2>Welcome '.$user_profile["first_name"].'!</h2>';
echo '<a href="'.$logoutUrl.'">Facebook Logout</a>';
}
else{
	echo '<h2>You are not logged in.</h2>';
	echo '<a href="'.$loginUrl.'" class="btn btn-large btn-primary">Facebook Login</a>';
}

?>