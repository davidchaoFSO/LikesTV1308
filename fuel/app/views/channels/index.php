
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
			<li class='<?php echo Arr::get($subnav, "channels" ); ?>'><?php echo Html::anchor('channels/','Channels');?></li>
			<li class='<?php echo Arr::get($subnav, "preferences" ); ?>'><?php echo Html::anchor('preferences/','Preferences');?></li>
			<li class='<?php echo Arr::get($subnav, "about" ); ?>'><?php echo Html::anchor('about/','About Us');?></li>
			<li class='<?php echo Arr::get($subnav, "testimonials" ); ?>'><?php echo Html::anchor('testimonials/','Testimonials');?></li>
			<li class='<?php echo Arr::get($subnav, "contact" ); ?>'><?php echo Html::anchor('contact/','Contact Us');?></li>
			<li class=''><?php echo Html::anchor($logoutUrl,'Log Out');?></li>
		</ul>
	</div>
	</div>
</div>
<h1>Your Recommended Channels</h1>
<hr>
<h2>Don’t like a particular game? Filter it out! If you want to see it again, you can always manage your filter at the preferences page. </h2>


<div id="myCarousel" class="carousel slide">

    <!-- Carousel items -->
<div class="carousel-inner">
    <div class="active item">
    <ul class="thumbnails">
<?php
	$counter = 0;
	foreach($streams as $stream){
	if($counter==6){
		echo '</ul>';
		echo '</div>';
		echo '<div class="item">';
		echo '<ul class="thumbnails">';
		$counter = 0;
	}
	echo    '<li>';
	echo	'<div class="thumbnail">';
	echo	   '<img src="'.$stream->preview->medium.'" alt="'.$stream->game.'stream thumbnail" width=300>';
	echo   		'<h3 title="'.$stream->game.'">'.$stream->game.'</h3>';
	echo   		'<h4>played by '.$stream->channel->display_name.'</h4>';

	
	echo 	Form::open(array("class"=>"form-vertical", 'action' => 'channels/filter.php', 'method' => 'post'));
	echo 		'<fieldset>';
	
	echo  		'<div class="control-group">';
	  		
	echo  			'<div class="controls">';
	echo  			Form::hidden('filter', Input::post('filter', $stream->game), array('class' => 'span4', 'id'=>'filter_'.$stream->_id));
	  		
	echo  			'</div>';
	echo  		'</div>';
	
	echo  		'<div class="control-group">';
	
	echo  				'<div class="controls">';
	
	echo 	Html::anchor($stream->channel->url, 'Watch Now',array('class'=>'btn btn-warning watch','target'=>'_blank'));

	echo  				Form::submit('submit', 'Remove Game', array('class' => 'btn btn-inverse filterbtn','id'=>'submit_'.$stream->_id));			
	echo 				'</div>';
	echo  		'</div>';
	echo 		'</fieldset>';
	echo 	Form::close();

	echo   '</div>';
	echo   '</li>';
	$counter++;
}
?>
	<!-- closing tags for last stream -->
	</ul>
    </div>
</div>

    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>







