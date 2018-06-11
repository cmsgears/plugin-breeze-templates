<?php
// CMG Imports
use cmsgears\widgets\blog\PostWidget;

use cmsgears\core\common\utilities\CodeGenUtil;

$featuredModels	= Yii::$app->factory->get( 'postService' )->getFeatured();
$textureClass	= 'texture texture-black';

$model			= $this->params[ 'model' ];
$modelContent	= $model->modelContent;
$data			= json_decode(  $model->data );
$settings		= $data->settings ?? null;

$content			= $settings->content ?? true;
$contentTitle		= isset( $settings ) && $settings->contentTitle ? $model->displayName : null;
$contentInfo		= isset( $settings ) && $settings->contentInfo ? $model->description : null;
$contentSummary		= isset( $settings ) && $settings->contentSummary ? $modelContent->summary : null;

$contentData		= isset( $settings ) && $settings->contentData ? $modelContent->content : null;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : 'row content-90';
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';

$pageIncludes = Yii::getAlias( '@cmsgears/plugin-btemplates/templates/pages/banner' ) . '/includes';
?>
<div class="page page-banner page-banner-search">
	<div class="page-content-wrap">
		<?php if( !empty( $featuredModels ) ) { ?>
			<div class="page-header-wrap page-header-banner">
				<div id="post-slider" class="fx-slider fx-slider-regular">
					<?php
						foreach( $featuredModels as $featuredModel ) {

							$content	= $featuredModel->modelContent;
							$bannerUrl	= CodeGenUtil::getFileUrl( $content->banner );
					?>
						<div>
							<?php if( !empty( $bannerUrl ) ) { ?>
								<div class="wrap-slide-content" style="background-image:url(<?= $bannerUrl ?>)">
									<div class="<?= $textureClass ?>"></div>
							<?php } else { ?>
								<div class="wrap-slide-content color color-tertiary">
							<?php } ?>
									<div class="slide-content">
										<div class="fxs-content reader">
											<div class="h3"><?= $featuredModel->displayName ?></div>
											<?php if( !empty( $featuredModel->description ) ) { ?>
												<div class="text text-default-r">
													<?= $featuredModel->description ?>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		<?php } ?>
		<?php if( $content ) { ?>
			<div class="page-content <?= $contentClass ?>">
				<div class="page-content-info search-bar row max-cols-50">
					<div class="col col3x2 h3 margin margin-bottom-small"><?= $contentTitle ?></div>
					<div class="col col3 margin margin-bottom-small">
						<div class="widget widget-search">
							<div class="frm-icon-element icon-right">
								<i class="cmti cmti-search"></i>
								<input id="search-post" type="text" placeholder="Search Posts" />
							</div>
						</div>
					</div>
				</div>
				<?php if( !empty( $contentInfo ) ) { ?>
					<div class="page-content-info reader"><?= $contentInfo ?></div>
				<?php } ?>
				<?php if( !empty( $contentSummary ) ) { ?>
					<div class="page-content-summary reader"><?= $contentSummary ?></div>
				<?php } ?>
				<?php if( !empty( $contentData ) ) { ?>
					<div class="page-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
				<?php } ?>
				<div class="filler-height"></div>
				<div class="page-content-buffer">
					<?= PostWidget::widget([
						'pagination' => true, 'limit' => 9,
						'texture' => 'texture texture-brown', 'defaultBanner' => true,
						'options' => [ 'class' => 'card-posts' ], 'tag' => $model,
						'wrapperOptions' => [ 'class' => 'card-post-wrap row max-cols-50' ],
						'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
						'templateDir' => '@cmsgears/plugin-btemplates/templates/posts/widgets', 'template' => 'card'
					]);
					?>
				</div>
				<?php include "$pageIncludes/elements.php"; ?>
			</div>
		<?php } ?>
		<?php include "$pageIncludes/blocks.php"; ?>
		<?php include "$pageIncludes/widgets.php"; ?>
	</div>
</div>
