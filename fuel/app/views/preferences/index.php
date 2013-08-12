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

<p style="color:white">Remove any titles from the list to see them at the channels page again.</p>
<br>
<?php if ($preferences): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Email</th>
			<th>Filter</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($preferences as $preference): ?>		<tr>

			<td><?php echo $preference->email; ?></td>
			<td><?php echo $preference->filter; ?></td>
			<td>
				<?php echo Html::anchor('preferences/view/'.$preference->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('preferences/edit/'.$preference->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('preferences/delete/'.$preference->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Preferences.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('preferences/create', 'Add new Preference', array('class' => 'btn btn-success')); ?>

</p>
