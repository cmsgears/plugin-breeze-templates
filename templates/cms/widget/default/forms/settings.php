<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\widgets\ActiveForm;
use cmsgears\core\common\widgets\Editor;

$coreProperties = $this->context->getCoreProperties();
$title			= $this->context->title;
$this->title	= "{$title} Settings | " . $coreProperties->getSiteTitle();
$returnUrl		= $this->context->returnUrl;

Editor::widget();
?>
<div class="box-crud-wrap row">
	<div class="box-crud-wrap-main row">
		<?php $form = ActiveForm::begin( [ 'id' => 'frm-settings', 'options' => [ 'class' => 'form' ] ] ); ?>
		<div class="row max-cols-100">
			<div class="col col3x2">
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Background</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'bkg' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'texture' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'defaultAvatar' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'defaultBanner' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'lazyBanner' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'resBanner' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'bkgClass' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'bkgVideo' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Header</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'header' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerIcon' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerTitle' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'lazyAvatar' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'resAvatar' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'headerIconUrl' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Content</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'content' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentInfo' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentTitle' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentSummary' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'contentClass' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'contentDataClass' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentData' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'purifySummary' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'purifyContent' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Attributes</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col5">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'metas' ) ?>
								</div>
								<div class="col col5x2">
									<?= $form->field( $settings, 'metaTypes' ) ?>
								</div>
								<div class="col col5x2">
									<?= $form->field( $settings, 'metaWrapClass' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Files</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'files' ) ?>
								</div>
								<div class="col col4x3">
									<?= $form->field( $settings, 'fileTypes' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col3">
				<div class="content-wysiwyg">
					<label>Widget Styles</label>
					<?= $form->field( $settings, 'styles' )->textarea( [ 'rows' => '5' ] )->label( false ) ?>
				</div>
				<div class="content-wysiwyg">
					<label>Widget Scripts</label>
					<?= $form->field( $settings, 'scripts' )->textarea( [ 'rows' => '5' ] )->label( false ) ?>
				</div>
				<div class="content-wysiwyg">
					<label>Raw Content</label>
					<?= $form->field( $settings, 'contentRaw' )->textarea( [ 'rows' => '5' ] )->label( false ) ?>
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
