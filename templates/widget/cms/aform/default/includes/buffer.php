<?php
$action			= $widget->ajaxUrl;
$method			= 'post';
$cmtApp			= $widget->cmtApp;
$cmtController	= $widget->cmtController;
$cmtAction		= $widget->cmtAction;
?>
<form class="form" cmt-app="<?= $cmtApp ?>" cmt-controller="<?= $cmtController ?>" cmt-action="<?= $cmtAction ?>" action="<?= $action ?>" method="<?= $method ?>">
	<div class="spinner max-area-cover bkg-transparent bkg-transparent-black">
		<div class="wrap-spinner valign-center">
			<i class="<?= $widget->spinner ?> spin text text-white"></i>
		</div>
	</div>

	<?= $fieldsHtml ?>

	<?= $captchaHtml ?>

	<div class="frm-actions">
		<input class="btn btn-medium" type="submit" name="submit" value="Submit">
	</div>

	<div class="message success"></div>
	<div class="message warning"></div>
	<div class="message error"></div>
</form>
