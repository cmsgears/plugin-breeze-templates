<?php
// Yii Imports
use yii\widgets\ActiveForm;
use yii\helpers\Html;

// Config
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Widget Configurations | ' . $coreProperties->getSiteTitle();
$returnUrl		= $this->context->returnUrl;

$widgetOptions = [
	'featured' => 'featured', 'popular' => 'popular',
	'recent' => 'recent', 'related' => 'related',
	'similar' => 'similar', 'category' => 'category', 'tag' => 'tag'
];

$defaultConfig = Yii::getAlias( '@breeze' ) . '/templates/widget/config';
?>
<div class="box-crud-wrap row">
	<div class="box-crud-wrap-main row">
		<?php $form = ActiveForm::begin( [ 'id' => 'frm-config', 'options' => [ 'class' => 'form' ] ] ); ?>
		<?php include "$defaultConfig/basic.php"; ?>
		<?php include "$defaultConfig/paging.php"; ?>
		<div class="box box-crud">
			<div class="box-header">
				<div class="box-header-title">Page Config</div>
			</div>
			<div class="box-content-wrap frm-split-40-60">
				<div class="box-content">
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'texture' ) ?>
						</div>
						<div class="col col2">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'defaultBanner', null, 'cmti cmti-checkbox' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col4x2">
							<?= $form->field( $config, 'widget' )->dropDownList( $widgetOptions, [ 'class' => 'cmt-select' ] ) ?>
						</div>
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'authorParam', null, 'cmti cmti-checkbox' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'categoryParam', null, 'cmti cmti-checkbox' ) ?>
						</div>
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'tagParam', null, 'cmti cmti-checkbox' ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="filler-height filler-height-medium"></div>
		<div class="align align-right">
			<?= Html::a( 'View All', $returnUrl, [ 'class' => 'btn btn-medium' ] ); ?>
			<input class="frm-element-medium" type="submit" value="Submit" />
		</div>
		<div class="filler-height filler-height-medium"></div>
		<?php ActiveForm::end(); ?>
	</div>
</div>
