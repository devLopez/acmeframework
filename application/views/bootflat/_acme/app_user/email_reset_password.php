<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo APP_NAME ?></title>

<!-- Core CSS - Include with every page -->
<link href="<?php echo URL_CSS ?>/bootstrap.css" rel="stylesheet">

<!-- ACME CSS - Include with every page -->
<link href="<?php echo URL_CSS ?>/app-core.css" rel="stylesheet">

</head>

<body>
	
	<p><strong><?php echo lang('Hello') ?>, <?php echo get_value($user, 'name') ?></strong></p>

	<p><?php echo lang('Use this email message to reset your application access password. Check your information below and if they are not correct just dispose this message and request it again.')?></p>
		
	<div>

		<label><?php echo lang('Your e-mail') ?>:</label>
		<?php echo get_value($user, 'email') ?>

	</div>

	<p><?php echo lang('To change your access password, click')?> <a href="<?php echo URL_ROOT ?>/app_access/reset_password/<?php echo get_value($user, 'id_user') ?>/<?php echo $key_access; ?>" target="_blank"><?php echo lang('here') ?></a>.</p>
	<p>
		<?php echo lang('If you have problems with the link above just copy and paste the following URL in a new browser tab:')?>
		<br />
		<?php echo URL_ROOT ?>/app_access/reset_password/<?php echo get_value($user, 'id_user') ?>/<?php echo $key_access; ?>
	</p>
		
</body>
</html>


