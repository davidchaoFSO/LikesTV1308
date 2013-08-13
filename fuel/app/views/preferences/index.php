<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="brand" href="../home/index"><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
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

<h2>Remove any titles from the list to see them at the channels page again.</h2>

<?php echo Form::open(array("class"=>"form-vertical")); ?>

	<fieldset>
		
		
		<div class="control-group">
			<?php echo Form::label('Title', 'filter', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('filter', Input::post('filter', isset($preference) ? $preference->filter : ''), array('class' => 'span4', 'placeholder'=>'')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>

<?php
echo Form::open(array("class"=>"form-vertical", 'action' => 'preferences', 'method' => 'post')); ?>
	<fieldset>

<?php if (count($preferences)>0): ?>

<?php		
foreach ($preferences as $pref){

	echo '<label class="checkbox">';
	echo '<input type="checkbox" name="filtered[]" value="'.$pref->filter.'"> '.$pref->filter;
	echo '</label>';

}
?>
	
	<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>

<?php else: ?>
<h2>Your filter is currently empty.</h2>

<?php endif; ?><p>
