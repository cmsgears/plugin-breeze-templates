<?php
// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$frmSpinner = isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
?>
<div class="data-crud data-crud-password">
	<div class="data-crud-title">Change Password</div>
	<form class="form" cmt-app="core" cmt-controller="user" cmt-action="account" action="<?= $apixBase ?>/account">
		<?php include $frmSpinner; ?>
		<div class="data-crud-form">
			<div class="row max-cols-100">
				<div class="col col3 hidden-easy">
					<div class="form-group">
						<label>Old Password *</label>
						<input type="password" name="ResetPassword[oldPassword]" placeholder="Old Password" />
						<span  class="error" cmt-error="ResetPassword[oldPassword]"></span>
					</div>
				</div>
				<div class="col col3">
					<div class="form-group">
						<label>Password *</label>
						<input type="password" name="ResetPassword[password]" placeholder="Password" />
						<span  class="error" cmt-error="ResetPassword[password]"></span>
					</div>
				</div>
				<div class="col col3">
					<div class="form-group">
						<label>Repeat Password *</label>
						<input type="password" name="ResetPassword[password_repeat]" placeholder="Repeat Password" />
						<span  class="error" cmt-error="ResetPassword[password_repeat]"></span>
					</div>
				</div>
			</div>
		</div>
		<div>
			<input type="hidden" name="ResetPassword[email]" value="<?= $user->email ?>" />
		</div>
		<div class="row data-crud-message">
			<div class="col col1 message success"></div>
			<div class="col col1 message warning"></div>
			<div class="col col1 message error"></div>
		</div>
		<div class="row data-crud-actions">
			<div class="col col1">
				<input class="frm-element-small" type="submit" value="Update" />
			</div>
		</div>
	</form>
</div>
