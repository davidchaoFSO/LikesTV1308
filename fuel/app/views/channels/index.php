
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="brand" href="../home/"><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
		<ul class="nav">
			<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('home/','Home');?></li>
			<li class='<?php echo Arr::get($subnav, "channels" ); ?>'><?php echo Html::anchor('channels/','Channels');?></li>
			<li class='<?php echo Arr::get($subnav, "preferences" ); ?>'><?php echo Html::anchor('preferences/','Preferences');?></li>
			<li class='<?php echo Arr::get($subnav, "about" ); ?>'><?php echo Html::anchor('about/','About Us');?></li>
			<li class='<?php echo Arr::get($subnav, "testimonials" ); ?>'><?php echo Html::anchor('testimonials/','Testimonials');?></li>
			<li class='<?php echo Arr::get($subnav, "contact" ); ?>'><?php echo Html::anchor('contact/','Contact Us');?></li>
		</ul>
	</div>
</div>
<h2>Don’t like a particular game? Filter it out! If you want to see it again, you can always manage your filter at the preferences page. </h2>


<div id="myCarousel" class="carousel slide">
    <!--<ol class="carousel-indicators">
    <<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->

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
	echo	   '<img src="'.$stream->preview->medium.'" alt="preview" width=290>';
	echo   		'<h3 title="'.$stream->game.'"">'.$stream->game.'</h3>';
	echo   		'<h4>played by '.$stream->channel->display_name.'</h4>';

	
	echo 	Form::open(array("class"=>"form-vertical", 'action' => 'channels/filter.php', 'method' => 'post'));
	echo 		'<fieldset>';
	
	echo  		'<div class="control-group">';
	  		
	echo  			'<div class="controls">';
	echo  			Form::hidden('filter', Input::post('filter', $stream->game), array('class' => 'span4', 'placeholder'=>''));
	  		
	echo  			'</div>';
	echo  		'</div>';
	
	echo  		'<div class="control-group">';
	//echo  				'<label class="control-label">&nbsp;</label>';
	echo  				'<div class="controls">';
	//echo   '<a href='.$stream->channel->url.' class="btn btn-warning watch" target="_blank">Watch Now</a>';
	echo 	Html::anchor($stream->channel->url, 'Watch Now',array('class'=>'btn btn-warning watch','target'=>'_blank'));

	echo  				Form::submit('submit', 'Filter Game', array('class' => 'btn btn-inverse filterbtn','data-loading-text)'=>'Filtering...'));			
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







