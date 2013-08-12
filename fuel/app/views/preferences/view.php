<h2>Viewing <span class='muted'>#<?php echo $preference->id; ?></span></h2>

<p>
	<strong>Email:</strong>
	<?php echo $preference->email; ?></p>
<p>
	<strong>Filter:</strong>
	<?php echo $preference->filter; ?></p>

<?php echo Html::anchor('preferences/edit/'.$preference->id, 'Edit'); ?> |
<?php echo Html::anchor('preferences', 'Back'); ?>