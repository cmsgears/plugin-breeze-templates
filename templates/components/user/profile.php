<?php
// Yii Imports
use yii\helpers\Html;

// Config
$coreProperties = $this->context->getCoreProperties();

$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$frmSpinner = isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
?>
<div class="data-crud data-crud-profile">
	<div class="data-crud-title">Basic Info</div>
	<form class="form" cmt-app="user" cmt-controller="user" cmt-action="profile" action="<?= $apixBase ?>/profile" cmt-keep>
		<?php include $frmSpinner; ?>
		<div class="data-crud-form">
			<div class="row max-cols-50">
				<div class="col col4">
					<label>First Name*</label>
					<input type="text" name="User[firstName]" placeholder="First Name" value="<?= $model->firstName ?>" />
					<span  class="error" cmt-error="User[firstName]"></span>
				</div>
				<div class="col col4">
					<label>Last Name</label>
					<input type="text" name="User[lastName]" placeholder="Last Name" value="<?= $model->lastName ?>" />
					<span  class="error" cmt-error="lastName"></span>
				</div>
				<div class="col col4">
					<label>Email*</label>
					<?php if( !$coreProperties->isChangeEmail() ) { ?>
						<input type="text" name="User[email]" placeholder="Email" value="<?= $model->email ?>" readonly />
					<?php } else { ?>
						<input type="text" name="User[email]" placeholder="Email" value="<?= $model->email ?>" />
					<?php } ?>
					<span class="error" cmt-error="User[email]"></span>
				</div>
				<div class="col col4">
					<label>Username*</label>
					<?php if( !$coreProperties->isChangeUsername() ) { ?>
						<input type="text" name="User[username]" placeholder="Username" value="<?= $model->username ?>" readonly />
					<?php } else { ?>
						<input type="text" name="User[username]" placeholder="Username" value="<?= $model->username ?>" />
					<?php } ?>
					<span  class="error" cmt-error="User[username]"></span>
				</div>
			</div>
			<div class="row max-cols-50">
				<div class="col col4">
					<label>Date of Birth</label>
					<div class="frm-icon-element icon-right">
						<span class="icon cmti cmti-calendar"></span>
						<input type="text" name="User[dob]" placeholder="Date of Birth" value="<?= $model->dob ?>" class="dt-dob-picker" />
					</div>
					<span  class="error" cmt-error="User[dob]"></span>
				</div>
				<div class="col col4">
					<label>Gender</label>
					<?= Html::dropDownList( 'User[genderId]', $model->genderId, $genderMap, [ 'class' => 'element-60 cmt-select' ] ); ?>
					<span  class="error" cmt-error="User[genderId]"></span>
				</div>
				<div class="col col4">
					<label>Mobile</label>
					<input type="text" name="User[mobile]" placeholder="Mobile" value="<?= $model->mobile ?>" />
					<span  class="error" cmt-error="User[mobile]"></span>
				</div>
				<div class="col col4">
					<label>Phone</label>
					<input type="text" name="User[phone]" placeholder="Phone" value="<?= $model->phone ?>" />
					<span  class="error" cmt-error="User[phone]"></span>
				</div>
			</div>
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
