<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$apixSpinner = isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";
?>
<div class="data-crud data-crud-settings data-crud-settings-notifications">
	<div class="data-crud-title">Notifications</div>
	<div class="data-crud-form">
		<div class="row">
			<div class="col col2">
				<div class="frm-field row" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/toggle-meta?key=receive_mail&ctype=<?= CoreGlobal::SETTINGS_NOTIFICATION ?>" cmt-keep>
					<?php include $apixSpinner; ?>
					<span class="cmt-switch cmt-checkbox">
						<input id="notify_receive_mail" class="cmt-change cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
						<label for="notify_receive_mail"></label>
						<input type="hidden" name="value" value="<?php if( isset( $notification[ 'receive_mail' ] ) ) echo $notification[ 'receive_mail' ]->value; ?>" />
					</span>
					<span class="inline-block padding padding-default-h">Receive emails</span>
				</div>
			</div>
		</div>
	</div>
</div>
