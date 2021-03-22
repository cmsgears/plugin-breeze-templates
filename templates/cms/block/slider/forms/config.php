<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Slider Gallery Config | ' . $coreProperties->getSiteTitle();
$returnUrl		= $this->context->returnUrl;
?>
<div class="box-crud-wrap row">
	<div class="box-crud-wrap-main row">
		<?php $form = ActiveForm::begin( [ 'id' => 'frm-config', 'options' => [ 'class' => 'form' ] ] ); ?>
		<div class="box box-crud">
			<div class="box-header">
				<div class="box-header-title">Text</div>
			</div>
			<div class="box-content-wrap frm-split-40-60">
				<div class="box-content">
					<div class="row">
						<div class="col col3">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'flip' ) ?>
						</div>
						<div class="col col3">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'split' ) ?>
						</div>
						<div class="col col3">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'splitRight' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'flipClass' ) ?>
						</div>
						<div class="col col2">
							<?= $form->field( $config, 'splitClass' ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="filler-height filler-height-medium"></div>
		<div class="box box-crud">
			<div class="box-header">
				<div class="box-header-title">Controls</div>
			</div>
			<div class="box-content-wrap frm-split-40-60">
				<div class="box-content">
					<div class="row">
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'circular' ) ?>
						</div>
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'mediumImage' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'lControlContent' )->textarea() ?>
						</div>
						<div class="col col2">
							<?= $form->field( $config, 'rControlContent' )->textarea() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="filler-height"></div>
		<div class="box box-crud">
			<div class="box-header">
				<div class="box-header-title">Callbacks</div>
			</div>
			<div class="box-content-wrap frm-split-40-60">
				<div class="box-content">
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'smallerContent' ) ?>
						</div>
						<div class="col col2">
							<?= $form->field( $config, 'onSlideClick' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'preSlideChange' ) ?>
						</div>
						<div class="col col2">
							<?= $form->field( $config, 'postSlideChange' ) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="filler-height"></div>
		<div class="box box-crud">
			<div class="box-header">
				<div class="box-header-title">Collage</div>
			</div>
			<div class="box-content-wrap frm-split-40-60">
				<div class="box-content">
					<div class="row">
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'collage' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'collageLimit' ) ?>
						</div>
						<div class="col col2">
							<?= $form->field( $config, 'collageClass' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'collageConfig' )->textarea() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="filler-height"></div>
		<div class="box box-crud">
			<div class="box-header">
				<div class="box-header-title">Lightbox</div>
			</div>
			<div class="box-content-wrap frm-split-40-60">
				<div class="box-content">
					<div class="row">
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'lightbox' ) ?>
						</div>
						<div class="col col4">
							<?= Yii::$app->formDesigner->getIconCheckbox( $form, $config, 'lightboxPopup' ) ?>
						</div>
					</div>
					<div class="row">
						<div class="col col2">
							<?= $form->field( $config, 'lightboxId' ) ?>
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
