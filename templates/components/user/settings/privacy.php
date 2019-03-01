<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$apixSpinner = isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";
?>
<div class="data-crud data-crud-settings data-crud-settings-privacy">
	<div class="data-crud-title">Privacy</div>
	<div class="data-crud-form">
		<div class="row max-cols-50">
			<div class="col col2">
				<div class="frm-field row" cmt-app="user" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=show_email&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
					<?php include $apixSpinner; ?>
					<span class="cmt-switch cmt-checkbox">
						<input id="privacy_show_email" class="cmt-change cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="privacy_show_email"></label>
						<input type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_email' ] ) ) echo $privacy[ 'show_email' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Show email on profile</span>
				</div>
			</div>
			<div class="col col2">
				<div class="frm-field row" cmt-app="user" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=show_mobile&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
					<?php include $apixSpinner; ?>
					<span class="cmt-switch cmt-checkbox">
						<input id="privacy_show_mobile" class="cmt-change cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="privacy_show_mobile"></label>
						<input type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_mobile' ] ) ) echo $privacy[ 'show_mobile' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Show mobile number on profile</span>
				</div>
			</div>
		</div>
		<div class="filler-height filler-height-small"></div>
		<div class="row max-cols-50">
			<div class="col col2">
				<div class="frm-field row" cmt-app="user" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=show_address&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
					<?php include $apixSpinner; ?>
					<span class="cmt-switch cmt-checkbox">
						<input id="privacy_show_address" class="cmt-change cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="privacy_show_address"></label>
						<input type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_address' ] ) ) echo $privacy[ 'show_address' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Show primary address on profile</span>
				</div>
			</div>
		</div>
	</div>
</div>
