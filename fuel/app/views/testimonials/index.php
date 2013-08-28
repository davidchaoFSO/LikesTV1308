<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</a>
		<a class="brand" href="../home/"><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
		<div class="nav-collapse collapse">
		<ul class="nav">
			<?php if(!$user): ?>
			<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('home/','Home');?></li>
			<?php endif; ?>
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
<h1>Testimonials</h1>
<hr>
<h2>Hear what our users have to say about LikesTV!</h2>
<div class = "whitebg">
	<div class = "row">
	<div class = "span5">
	<h3>Developer Comments</h3>
	<i>"Greetings Facebook users and Twitch stream watchers! We are pleased to bring you LikesTV - a new way for you to discover new video games streams categorized by game. The idea started out as a way for users to "follow" an entire game instead of just by individual channel, but we've also added features for you to further customize your recommended channels. We've got more features on the way, so please enjoy!"</i><p style = "text-align:right"> - David Chao, Lead Web Developer</p>
	</div>
	<div class = "span6">
	<h3>Feedback</h3>
	<p>This area is reserved for future feedback.</p>
</div>
</div>
</div>

