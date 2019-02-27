<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Basic</div>
	</div>
	<div class="box-content-wrap frm-split-40-60">
		<div class="box-content">
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'wrap', null, 'cmti cmti-checkbox' ) ?>
				</div>
				<div class="col col4">
					<?= $form->field( $config, 'wrapper' ) ?>
				</div>
				<div class="col col4x2">
					<?= $form->field( $config, 'options' )->textarea() ?>
				</div>
			</div>
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'loadAssets', null, 'cmti cmti-checkbox' ) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="filler-height"></div>
<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Auto Loading</div>
	</div>
	<div class="box-content-wrap frm-split-40-60">
		<div class="box-content">
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'autoload', null, 'cmti cmti-checkbox' ) ?>
				</div>
				<div class="col col4x2">
					<?= $form->field( $config, 'autoloadTemplate' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'autoloadApp' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'autoloadController' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'autoloadAction' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'autoloadUrl' ) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="filler-height"></div>
