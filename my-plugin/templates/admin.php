<div class="wrap">
	<h1>Example Plugin</h1>
	<?php settings_errors();?>

	<form method="post" action="options.php">
		<?php
settings_fields('example_options_group');
do_settings_sections('example_plugin');
submit_button();
?>
	</form>
</div>