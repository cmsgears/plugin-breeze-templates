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
		<div class="switch-layout switch-layout-row-2 padding padding-small">
			<span class="cmt-checkbox switch padding padding-small-h" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=show_email&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
				<?php include $apixSpinner; ?>
				<input id="privacy_show_email" class="switch-toggle switch-toggle-round" type="checkbox" />
				<label for="privacy_show_email"></label>
				<input class="cmt-change" type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_email' ] ) ) echo $privacy[ 'show_email' ]->value; ?>" />
				<span class="label">Show email on profile</span>
			</span>
			<span class="cmt-checkbox switch padding padding-small-h" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=show_mobile&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
				<?php include $apixSpinner; ?>
				<input id="privacy_show_mobile" class="switch-toggle switch-toggle-round" type="checkbox" />
				<label for="privacy_show_mobile"></label>
				<input class="cmt-change" type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_mobile' ] ) ) echo $privacy[ 'show_mobile' ]->value; ?>" />
				<span class="label">Show mobile number on profile</span>
			</span>
			<span class="cmt-checkbox switch padding padding-small-h" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=show_address&ctype=<?= CoreGlobal::SETTINGS_PRIVACY ?>" cmt-keep>
				<?php include $apixSpinner; ?>
				<input id="privacy_show_address" class="switch-toggle switch-toggle-round" type="checkbox" />
				<label for="privacy_show_address"></label>
				<input class="cmt-change" type="hidden" name="value" value="<?php if( isset( $privacy[ 'show_address' ] ) ) echo $privacy[ 'show_address' ]->value; ?>" />
				<span class="label">Show address on profile</span>
			</span>
		</div>
	</div>
</div>
