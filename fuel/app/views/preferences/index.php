
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="brand" href="../home/"><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
		<ul class="nav">
			<!--<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('home/','Home');?></li>-->
			<li class='<?php echo Arr::get($subnav, "channels" ); ?>'><?php echo Html::anchor('channels/','Channels');?></li>
			<li class='<?php echo Arr::get($subnav, "preferences" ); ?>'><?php echo Html::anchor('preferences/','Preferences');?></li>
			<li class='<?php echo Arr::get($subnav, "about" ); ?>'><?php echo Html::anchor('about/','About Us');?></li>
			<li class='<?php echo Arr::get($subnav, "testimonials" ); ?>'><?php echo Html::anchor('testimonials/','Testimonials');?></li>
			<li class='<?php echo Arr::get($subnav, "contact" ); ?>'><?php echo Html::anchor('contact/','Contact Us');?></li>
			<li class=''><?php echo Html::anchor($logoutUrl,'Log Out');?></li>
		</ul>
	</div>
</div>

<h2>Remove any titles from the list to see them at the channels page again.</h2>

<?php echo Form::open(array("class"=>"form-vertical")); ?>
<div class='whitebg'>
	<div class = 'row'>
	<fieldset>
		
		
		<div class="control-group span4">
			<?php echo Form::label('Title', 'filter', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('filter', Input::post('filter', isset($preference) ? $preference->filter : ''), array('class' => 'span4', 'placeholder'=>'Enter the title you wish to filter here.')); ?>

			</div>
		</div>
		<div class="control-group span4">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Add to Filter', array('class' => 'btn btn-primary btn-inverse')); ?>			</div>
		</div>
	</fieldset>
</div>
<?php echo Form::close(); ?>

<p><strong>Which titles would you like to remove from the filter?</strong></p>

<?php echo Form::open(array("class"=>"form-vertical", 'action' => 'preferences', 'method' => 'post')); ?>

	<fieldset>

	<?php if (count($preferences)>0): ?>

	<?php	
	$counter = 0;	
	foreach ($preferences as $pref){

	if($counter==0){
		echo '<div class = "row">';
		
	}

	echo '<div class = "span3" style="height:36px" title="'.$pref->filter.'">';
	echo '<label class="checkbox ">';
	echo '<input type="checkbox" name="filtered[]"  value="'.$pref->filter.'"> '.$pref->filter;
	echo '</label>';
	echo '</div>';

	if($counter==3){
		echo '</div>';
	}

	$counter++;

	if($counter > 3){
		$counter = 0;
	}
	} 

	if($counter !==0){
		echo '</div>';
	}
	?>
	<div class='row'>
	<div class="control-group span12">
			<!--<label class='control-label'>&nbsp;</label>-->
			<div class='controls'>
				<?php echo Form::submit('submit', 'Remove from Filter', array('class' => 'btn btn-primary btn-warning')); ?>			</div>
		</div>
	</div>
	</fieldset>
	<?php echo Form::close(); ?>

<?php else: ?>
<h2>Your filter is currently empty.</h2>

<?php endif; ?><p>
</div>