<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$apixSpinner = isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";
?>
<div class="data-crud data-crud-settings data-crud-settings-reminders">
	<div class="data-crud-title">Reminders</div>
	<div class="data-crud-form">
		<div class="cmt-switch-wrap cmt-switch-row-2 padding padding-small">
			<span class="cmt-checkbox switch padding padding-small-h" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=receive_email&ctype=<?= CoreGlobal::SETTINGS_REMINDER ?>" cmt-keep>
				<?php include $apixSpinner; ?>
				<input id="remind_receive_email" class="switch-toggle switch-toggle-round" type="checkbox" />
				<label for="remind_receive_email"></label>
				<input class="cmt-change" type="hidden" name="value" value="<?php if( isset( $reminder[ 'receive_email' ] ) ) echo $reminder[ 'receive_email' ]->value; ?>" />
				<span class="label">Receive emails</span>
			</span>
		</div>
	</div>
</div>
