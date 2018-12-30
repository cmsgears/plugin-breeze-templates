<?php
// CMG Imports
use cmsgears\core\common\widgets\Captcha;

$model = $widget->model;

$captcha	= $widget->captcha;
$title		= $widget->title;
$success	= $widget->success;
$rating		= $widget->rating;
$allFields	= $widget->allFields;
$labels		= $widget->labels;

$ajax		= $widget->ajax;
$ajaxUrl	= $widget->ajaxUrl;
$controller	= $widget->cmtController;
$app		= $widget->cmtApp;
$action		= $widget->cmtAction;

$user = Yii::$app->user->getIdentity();
?>
<?php if( isset( $title ) ) { ?>
	<div class="h4"><?= $title ?></div><hr/>
	<div class="filler-height"></div>
<?php } ?>
<form class="form" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $ajaxUrl ?>">
	<div class="spinner max-area-cover">
		<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
	</div>
	<div class="row max-cols-100">
	<?php if( !isset( $user ) ) { ?>
		<div class="colf colf15x7">
			<div class="clear">
				<?php if( $labels ) { ?>
					<label>Name *</label>
				<?php } ?>
				<input type="text" name="Comment[name]" placeholder="Name" />
				<span class="error" cmt-error="Comment[name]"></span>
			</div>
			<div class="clear">
				<?php if( $labels ) { ?>
					<label>Email *</label>
				<?php } ?>
				<input type="text" name="Comment[email]" placeholder="Email" />
				<span class="error" cmt-error="Comment[email]"></span>
			</div>
			<div class="clear">
				<?php if( $labels ) { ?>
					<label>Website Link</label>
				<?php } ?>
				<input type="text" name="Comment[websiteUrl]" placeholder="Website Link">
				<span class="error" cmt-error="Comment[websiteUrl]"></span>
			</div>
			<?php if( $allFields ) { ?>
				<div class="clear">
					<?php if( $labels ) { ?>
						<label>Avatar Link</label>
					<?php } ?>
					<input type="text" name="Comment[avatarUrl]" placeholder="Avatar Link">
					<span class="error" cmt-error="Comment[avatarUrl]"></span>
				</div>
			<?php } ?>
		</div>
		<div class="colf colf15"></div>
		<div class="colf colf15x7">
			<div class="clear">
				<?php if( $labels ) { ?>
					<label>Comment</label>
				<?php } ?>
				<textarea name="Comment[content]" rows="4" placeholder="Write here..."></textarea>
				<span class="error" cmt-error="Comment[content]"></span>
			</div>
			<?php if( !isset( $user ) ) { ?>
				<div class="clear captcha">
					<?= Captcha::widget([ 'name' => 'Comment[captcha]', 'captchaAction' =>	 '/core/site/captcha', 'options' => [ 'placeholder' => 'Captcha Key*' ] ] ) ?>
					<div class="info margin margin-small-v">Click on the captcha image to get new code.</div>
					<span class="error" cmt-error="Comment[captcha]"></span>
				</div>
			<?php } ?>
		</div>
	<?php } else if( isset( $user ) ) { ?>
		<div class="colf colf15x7">
			<?php if( $labels ) { ?>
				<label>Website Link</label>
			<?php } ?>
			<input type="text" name="Comment[websiteUrl]" placeholder="Website">
			<span class="error" cmt-error="Comment[websiteUrl]"></span>
		</div>
		<div class="colf colf15"></div>
		<div class="colf colf15x7">
			<?php if( $labels ) { ?>
				<label>Comment</label>
			<?php } ?>
			<textarea name="Comment[content]" rows="4" placeholder="Write here..."></textarea>
			<span class="error" cmt-error="Comment[content]"></span>
		</div>
	<?php } ?>
	</div>
	<div class="align align-right">
		<input type="submit" class="frm-element-medium" value="Submit">
	</div>
	<div class="margin margin-small-v">
		<div class="message success"></div>
		<div class="message warning"></div>
		<div class="message error"></div>
	</div>
</form>
