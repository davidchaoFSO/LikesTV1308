
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



<ul class="thumbnails">
<?php
	foreach($streams as $stream){
	echo    '<li>';
	echo	'<div class="thumbnail">';
	echo	   '<img src="'.$stream->preview->medium.'" alt="preview" width=275>';
	echo   		'<h3>'.$stream->game.'</h3>';
	echo   		'<h4>played by '.$stream->channel->display_name.'</h4>';

	echo   '<a href='.$stream->channel->url.' class="btn btn-warning" target="_blank">Watch Now</a>';

	echo 	Form::open(array("class"=>"form-vertical", 'action' => 'channels', 'method' => 'post'));
	echo 		'<fieldset>';
	
	echo  		'<div class="control-group">';
	  		
	echo  			'<div class="controls">';
	echo  			Form::hidden('filter', Input::post('filter', $stream->game), array('class' => 'span4', 'placeholder'=>''));
	  		
	echo  			'</div>';
	echo  		'</div>';
	
	echo  		'<div class="control-group">';
	echo  				'<label class="control-label">&nbsp;</label>';
	echo  				'<div class="controls">';
	echo  				Form::submit('submit', 'Filter', array('class' => 'btn btn-inverse'));			
	echo 				'</div>';
	echo  		'</div>';
	echo 		'</fieldset>';
	echo 	Form::close();

	echo   '</div>';
	echo   '</li>';
}
?>
</ul>;
