<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('username', Input::post('username', isset($preference) ? $preference->username : ''), array('class' => 'span4', 'placeholder'=>'Username')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Filter', 'filter', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('filter', Input::post('filter', isset($preference) ? $preference->filter : ''), array('class' => 'span4', 'placeholder'=>'Filter')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>