<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Wrappers</div>
	</div>
	<div class="box-content-wrap frm-split-40-60">
		<div class="box-content">
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'wrapSingle', null, 'cmti cmti-checkbox' ) ?>
				</div>
				<div class="col col4">
					<?= $form->field( $config, 'singleWrapper' ) ?>
				</div>
				<div class="col col4x2">
					<?= $form->field( $config, 'singleOptions' )->textarea() ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'textLimit' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'wrapperOptions' )->textarea() ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="filler-height"></div>
<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Path</div>
	</div>
	<div class="box-content-wrap frm-split-40-60">
		<div class="box-content">
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'basePath' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'allPath' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'singlePath' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'route' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'showAllPath', null, 'cmti cmti-checkbox' ) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="filler-height"></div>
<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Pagination</div>
	</div>
	<div class="box-content-wrap frm-split-40-60">
		<div class="box-content">
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'pagination', null, 'cmti cmti-checkbox' ) ?>
				</div>
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'paging', null, 'cmti cmti-checkbox' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'nextLabel' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'prevLabel' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'limit' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'excludeParams' )->textarea() ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="filler-height"></div>
<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Ajax Pagination</div>
	</div>
	<div class="box-content-wrap frm-split-40-60">
		<div class="box-content">
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'ajaxPagination', null, 'cmti cmti-checkbox' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'ajaxPageApp' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'ajaxPageController' ) ?>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<?= $form->field( $config, 'ajaxPageAction' ) ?>
				</div>
				<div class="col col2">
					<?= $form->field( $config, 'ajaxUrl' ) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="filler-height"></div>
<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Multisite</div>
	</div>
	<div class="box-content-wrap frm-split-40-60">
		<div class="box-content">
			<div class="row">
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'excludeMain', null, 'cmti cmti-checkbox' ) ?>
				</div>
				<div class="col col4">
					<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'siteModels', null, 'cmti cmti-checkbox' ) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="filler-height"></div>
