<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\widgets\ActiveForm;
use cmsgears\core\common\widgets\Editor;
use cmsgears\icons\widgets\IconChooser;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Group Settings | ' . $coreProperties->getSiteTitle();
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
						<div class="box-header-title">Media</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'defaultAvatar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'defaultBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'fixedBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'scrollBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'parallaxBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'fluidBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'texture', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'background', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'backgroundClass' ) ?>
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
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'header', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerIcon', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerTitle', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerInfo', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerGallery', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerElements', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerFluid', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'headerScroller', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'headerElementType' ) ?>
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
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'content', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentTitle', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentInfo', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentSummary', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentAvatar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentBanner', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentGallery', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentData', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'maxCover', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentSocial', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'contentLabels', null, 'cmti cmti-checkbox' ) ?>
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
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Footer</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footer', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerIcon', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerTitle', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerInfo', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= IconChooser::widget( [ 'model' => $model, 'attribute' => 'footerIconClass', 'options' => [ 'class' => 'icon-picker-wrap' ] ] ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'footerElements', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'footerElementType' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'footerIconUrl' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'footerTitleData' )->textarea() ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'footerInfoData' )->textarea() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Attributes</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'metas', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'metasWithContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4x2">
									<?= $form->field( $settings, 'metasOrder' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col4x2">
									<?= $form->field( $settings, 'metaType' ) ?>
								</div>
								<div class="col col4x2">
									<?= $form->field( $settings, 'metaWrapClass' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Elements</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'elements', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'elementsBeforeContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'elementsWithContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= $form->field( $settings, 'elementsOrder' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'elementType' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'boxWrapClass' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'boxWrapper' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'boxClass' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Widgets</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'widgets', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'widgetsBeforeContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'widgetsWithContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= $form->field( $settings, 'widgetsOrder' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'widgetType' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'widgetWrapClass' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'widgetWrapper' ) ?>
								</div>
								<div class="col col2">
									<?= $form->field( $settings, 'widgetClass' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Blocks</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'blocks', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'blocksBeforeContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'blocksWithContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= $form->field( $settings, 'blocksOrder' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'blockType' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Sidebars</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'sidebars', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'sidebarsBeforeContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'sidebarsWithContent', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4x2">
									<?= $form->field( $settings, 'sidebarsOrder' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col2">
									<?= $form->field( $settings, 'sidebarType' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col5">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'topSidebar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col5x4">
									<?= $form->field( $settings, 'topSidebarSlugs' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col5">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'bottomSidebar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col5x4">
									<?= $form->field( $settings, 'bottomSidebarSlugs' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col5">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'leftSidebar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col5x4">
									<?= $form->field( $settings, 'leftSidebarSlug' ) ?>
								</div>
							</div>
							<div class="row">
								<div class="col col5">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'rightSidebar', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col5x4">
									<?= $form->field( $settings, 'rightSidebarSlug' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="box box-crud">
					<div class="box-header">
						<div class="box-header-title">Group Data and Widgets</div>
					</div>
					<div class="box-content-wrap frm-split-40-60">
						<div class="box-content">
							<div class="row">
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'author', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'related', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'popular', null, 'cmti cmti-checkbox' ) ?>
								</div>
								<div class="col col4">
									<?= Yii::$app->formDesigner->getIconCheckbox( $form, $settings, 'similar', null, 'cmti cmti-checkbox' ) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col3">
				<div class="content-wysiwyg">
					<label>Page Styles</label>
					<?= $form->field( $settings, 'styles' )->textarea( [ 'rows' => '6' ] )->label( false ) ?>
				</div>
				<div class="content-wysiwyg">
					<label>Page Scripts</label>
					<?= $form->field( $settings, 'scripts' )->textarea( [ 'rows' => '6' ] )->label( false ) ?>
				</div>
				<div class="content-wysiwyg">
					<label>Footer Content Data</label>
					<?= $form->field( $settings, 'footerContentData' )->textarea( [ 'class' => 'content-editor' ] )->label( false ) ?>
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
