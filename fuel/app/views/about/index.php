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
<h1>About LikesTV</h1>
<hr>
<h2>Find out more about LikesTV below!</h2>
<div class = "whitebg">
<div class = "row">
<div class = "FAQimg span3">
	<?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV"));?>
</div>
<div class = "FAQtxt span8">
<strong>What is LikesTV?</strong>
<p>LikesTV is a new and innovative way to search for Twitch viewers to discover more stream channels using the video games they have already “liked” on Facebook. Currently, Twitch only allows you to follow individual channels at their site, so LikesTV is convenient method to follow an entire game. Users can also adjust their preferences to filter out any particular game they don't wish to see within their recommended channels.</p>
<strong></strong>
<p>A more detailed FAQ will be coming soon as we receive more feedback. Please use the Contact Us page to send us any questions or comments.</p>
<strong></strong>
<p></p>
</div>

</div>
</div>