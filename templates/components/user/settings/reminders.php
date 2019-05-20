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
		<div class="row max-cols-50">
			<div class="col col2">
				<div class="frm-field row" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=receive_email&ctype=<?= CoreGlobal::SETTINGS_REMINDER ?>" cmt-keep>
					<?php include $apixSpinner; ?>
					<span class="cmt-switch cmt-checkbox">
						<input id="remind_receive_email" class="cmt-change cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="remind_receive_email"></label>
						<input type="hidden" name="value" value="<?php if( isset( $reminder[ 'receive_email' ] ) ) echo $reminder[ 'receive_email' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Receive emails</span>
				</div>
			</div>
		</div>
	</div>
</div>
