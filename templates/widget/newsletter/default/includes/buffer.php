<?php
$btnText	= $widget->btnText;
$spinner	= $widget->spinner;

$ajaxUrl		= $widget->ajaxUrl;
$cmtApp			= $widget->cmtApp;
$cmtController	= $widget->cmtController;
$cmtAction		= $widget->cmtAction;
?>
<form class="form row max-cols-100" cmt-app="<?= $cmtApp ?>" cmt-controller="<?= $cmtController ?>" cmt-action="<?= $cmtAction ?>" action="<?= $ajaxUrl ?>">
	<div class="max-area-cover spinner">
		<div class="valign-center <?= $spinner ?> spin"></div>
	</div>
    <div class="frm-field">
		<div class="frm-icon-element">
			<i class="cmti cmti-at"></i>
			<input type="text" name="SignUpForm[email]" placeholder="Email *">
			<span class="error" cmt-error="SignUpForm[email]"></span>
		</div>
    </div>
	<div class="frm-actions">
		<input class="submit" type="submit" name="submit" value="<?= $btnText ?>">
	</div>
    <div class="filler-height"></div>
	<div class="message success"></div>
	<div class="message warning"></div>
	<div class="message error"></div>
	<div class="filler-height"></div>
</form>
