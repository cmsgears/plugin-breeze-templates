<?php
$btnText = $widget->btnText;

$ajaxUrl		= $widget->ajaxUrl;
$cmtApp			= $widget->cmtApp;
$cmtController	= $widget->cmtController;
$cmtAction		= $widget->cmtAction;
?>
<form class="form row max-cols-100" cmt-app="<?= $cmtApp ?>" cmt-controller="<?= $cmtController ?>" cmt-action="<?= $cmtAction ?>" action="<?= $ajaxUrl ?>">
	<div class="max-area-cover spinner">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>

	<div class="frm-actions">
		<input type="text" name="Newsletter[email]" placeholder="Email *">
		<input class="submit" type="submit" name="submit" value="<?= $btnText ?>">
	</div>

    <div class="frm-field padding padding-small-v">
		<span class="error" cmt-error="email"></span>
    </div>

	<div class="message success"></div>
	<div class="message warning"></div>
	<div class="message error"></div>
	<div class="filler-height"> </div>
</form>
