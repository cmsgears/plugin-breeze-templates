<?php
// Yii Imports
use yii\captcha\Captcha;

$model		= $widget->model;
$ajax		= $widget->ajax;
$ajaxUrl	= $widget->ajaxUrl;
$controller	= $widget->cmtController;
$app		= $widget->cmtApp;
$action		= $widget->cmtAction;
$captcha	= $widget->captcha;
$title		= $widget->title;
$success	= $widget->success;
$rating		= $widget->rating;

$user = Yii::$app->user->getIdentity();
?>
<div class="h4">Write a Comment</div>
<hr/>
<div class="filler-height"></div>
<form class="row max-cols-100 frm-rounded-all" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $ajaxUrl ?>">
	<div class="spinner max-area-cover">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>
	<?php if( !isset( $user ) ) { ?>
		<div class="col col12x6 padding padding-small-h">
			<div class="clear">
				<label>Name *</label>
				<input type="text" name="ModelComment[name]" placeholder="Name" />
				<span class="error" cmt-error="name"></span>
			</div>
			<div class="clear">
				<label>Email *</label>
				<input type="text" name="ModelComment[email]" placeholder="Email" />
				<span class="error" cmt-error="email"></span>
			</div>
			<div class="clear">
				<label>Website Link</label>
				<input type="text" name="ModelComment[websiteUrl]" placeholder="Website Link">
				<span class="error" cmt-error="websiteUrl"></span>
			</div>
			<div class="clear">
				<label>Avatar Link</label>
				<input type="text" name="ModelComment[avatarUrl]" placeholder="Avatar Link">
				<span class="error" cmt-error="avatarUrl"></span>
			</div>
		</div>
		<div class="col col12x6 padding padding-small-h">
			<div class="clear">
				<label>Comment</label>
				<textarea name="ModelComment[content]" rows="4" placeholder="Write here..."></textarea>
				<span class="error" cmt-error="content"></span>
			</div>
			<?php if( !isset( $user ) ) { ?>
				<div class="clear captcha">
					<?= Captcha::widget([ 'name' => 'ModelComment[captcha]', 'captchaAction' =>	 '/core/site/captcha', 'options' => [ 'placeholder' => 'Captcha Key*' ] ] ) ?>
					<span class="info">Click on the captcha image to get new code.</span>
					<span class="error" cmt-error="captcha"></span>
				</div>
			<?php } ?>
		</div>
	<?php } else if( isset( $user ) ) { ?>
		<div class="clear row row-medium left">
			<label>Website (Optional)</label>
			<input type="text" name="ModelComment[websiteUrl]" placeholder="Website">
			<span class="error" cmt-error="websiteUrl"></span>
		</div>
		<div class="clear">
			<label>Comment</label>
			<textarea name="ModelComment[content]" rows="4" placeholder="Write here..."></textarea>
			<span class="error" cmt-error="content"></span>
		</div>
	<?php } ?>

	<div class="clear col col1 padding padding-small-h align align-right">
		<input type="submit" class="element-medium" value="Submit">
		<div class="filler-height filler-height-medium"> </div>
		<div class="message success"></div>
		<div class="message warning"></div>
		<div class="message error"></div>
	</div>
</form>
