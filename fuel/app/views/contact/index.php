<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<a class="brand" href="../home/"><?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV","width"=>"90"));?></a>
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
<h2>Have questions or comments? We’ll respond to your email within 1 business day!</h2>

<div class="whitebg">
	<div class = "row">
		<!-- form -->
		<div class = "span8">
		<?php echo Form::open(array("class"=>"form-vertical")); ?>			
			<fieldset>

				<div class="control-group">
					<?php echo Form::label('Your Email Address', 'emaddress', array('class'=>'control-label')); ?>

					<div class="controls">
						<?php echo Form::input('emaddress', Input::post('emaddress', ''), array('class' => 'span4', 'type'=>'email', 'placeholder'=>'Enter your email address here.','required')); ?>

					</div>
				</div>
				<div class="control-group">
					<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

					<div class="controls">
						<?php echo Form::textarea('message', Input::post('message', ''), array('class'=>'span8','rows'=>6, 'placeholder'=>'Enter your email address here.', 'required', 'maxlength'=>2048)); ?>

					</div>
				</div>
				<div class="control-group">
					<!--<label class='control-label'>&nbsp;</label>-->
					<div class='controls'>
						<?php echo Form::submit('submit', 'Send Email', array('class' => 'btn btn-primary btn-warning')); ?>			
					</div>
				</div>
			</fieldset>
		<?php echo Form::close(); ?>
		</div>
		<!-- contact info -->
		<div class = "span3 addressblock">
		<?php echo Asset::img('LTVlogo.png', array("alt" => "LikesTV", "width"=>"125px"));?>
		<div class = "">
		<p>DCWeb Innovations, Inc.<br>
		P.O. Box XXXXX<br>
		Plano, Texas 75025<br>
		</p>
		<p>Phone: 555-555-5555<br>
			Fax: 555-555-5556
		</p>
		</div>
		</div>
	</div>
</div>
