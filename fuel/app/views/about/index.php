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
<h3>What is LikesTV?</h3>
<p>LikesTV is a new and innovative way to search for Twitch viewers to discover more stream channels using the video games they have already “liked” on Facebook. Currently, Twitch only allows you to follow individual channels at their site, so LikesTV is convenient method to follow an entire game. Users can also adjust their preferences to filter out any particular game they don't wish to see within their recommended channels.</p>
<strong></strong>
<p></p>
<h3>Frequently Asked Questions</h3>
<strong>Why is my game not shown?</strong>
<p>There are a few reasons for this. Currently, Twitch's game search does not account for differences in punctuation or phrasing (the, a, etc.) Please contact us at the "Contact Us" page so we can recommend a course of action. Secondly, it is possible that there are currently no live streams at the time for the given game. Another reason your game may not be listed is if you have a large number of games "liked." We are working on a way to improve this condition.</p>
<strong>I added a game to my filter but it still shows in my channels.</strong>
<p>Please make sure that the case and spelling of the game matches in either Facebook or at the channels page. If that does not work, please contact us via the "Contact Us" page.</p>
<strong>Why does it take so long for the channels page to load?</strong>
<p>We are currently looking into this issue. We are hoping to have it improved with the next update. We appreciate your patience.</p>
<strong></strong>
<p></p>
</div>

</div>
</div>