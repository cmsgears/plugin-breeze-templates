<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$content			= isset( $settings->content ) ? $settings->content : $widget->content;
$contentTitle		= isset( $settings->contentTitle ) && $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : $widget->contentTitle;
$contentInfo		= isset( $settings->contentInfo ) && $settings->contentInfo && !empty( $model->description ) ? $model->description : $widget->contentInfo;
$contentSummary		= isset( $settings->contentSummary ) && $settings->contentSummary && !empty( $model->summary ) ? $model->summary : $widget->contentSummary;

$contentAvatar	= isset( $settings->contentAvatar ) ? $settings->contentAvatar : false;
$contentBanner	= isset( $settings->contentBanner ) ? $settings->contentBanner : false;

$contentData		= isset( $settings->contentData ) && $settings->contentData && !empty( $model->content ) ? $model->content : $widget->contentData;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;

$purifySummary	= isset( $settings->purifySummary ) ? $settings->purifySummary : true;
$purifyContent	= isset( $settings->purifyContent ) ? $settings->purifyContent : true;

$contentBanner	= $contentBanner && !empty( $bannerUrl );

$cbkgLazyClass	= isset( $lazyBanner ) && $lazyBanner && $contentBanner ? 'cmt-lazy-img' : null;

$cbkgSrcset		= isset( $cbkgLazyClass ) ? $bkgSmallUrl . " 1x, " . $bkgMediumUrl . " 1.5x, " . $bannerObj->getFileUrl() . " 2x" : null;
$cbkgSizes		= isset( $cbkgLazyClass ) ? "(min-width: 1025px) 2x, (min-width: 481px) 1.5x, 1x" : null;
$cbkgLazyAttrs	= isset( $cbkgLazyClass ) ? "data-src=\"$bkgSmallUrl\" data-srcset=\"$cbkgSrcset\" data-sizes=\"$cbkgSizes\"" : null;
?>
<?php if( $content ) { ?>
	<div class="block-content <?= $contentClass ?>">
		<?php if( $contentBanner ) { ?>
			<div class="block-content-banner">
				<img class="width width-100 <?= $cbkgLazyClass ?>" src="<?= $bkgUrl ?>" title="<?= "{$model->displayName}" ?>" alt="<?= "{$model->displayName}" ?>" <?= $cbkgLazyAttrs ?> />
			</div>
		<?php } ?>
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="block-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="block-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="block-content-summary reader"><?= $purifySummary ? HtmlPurifier::process( $contentSummary ) : $contentSummary ?></div>
		<?php } ?>
		<?php include $preObjects; ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="block-content-data <?= $contentDataClass ?>"><?= $purifyContent ? HtmlPurifier::process( $contentData ) : $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
		<?php include $attributes; ?>
		<?php include $postObjects; ?>
	</div>
<?php } ?>
