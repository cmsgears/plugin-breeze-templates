<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$content		= isset( $settings->content ) ? $settings->content : false;
$contentTitle	= isset( $settings->contentTitle ) && $settings->contentTitle ? ( !empty( $model->title ) ? $model->title : $model->name ) : null;
$contentInfo	= isset( $settings->contentInfo ) && $settings->contentInfo ? $model->description : null;
$contentSummary	= isset( $settings->contentSummary ) && $settings->contentSummary && isset( $modelContent->summary ) ? $modelContent->summary : null;

$contentAvatar	= isset( $settings->contentAvatar ) ? $settings->contentAvatar : false;
$contentBanner	= isset( $settings->contentBanner ) ? $settings->contentBanner : false;
$contentGallery	= isset( $settings->contentGallery ) ? $settings->contentGallery : false;

$contentSocial	= isset( $settings->contentSocial ) ? $settings->contentSocial : false;
$contentLabels	= isset( $settings->contentLabels ) ? $settings->contentLabels : false;

$contentData		= isset( $settings->contentData ) && $settings->contentData && isset( $modelContent->content ) ? $modelContent->content : null;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : null;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';

$purifySummary	= isset( $settings->purifySummary ) ? $settings->purifySummary : true;
$purifyContent	= isset( $settings->purifyContent ) ? $settings->purifyContent : true;

$contentBanner	= $contentBanner && !empty( $bannerUrl );
$contentGallery	= $contentGallery && !empty( $slides );

$cbkgLazyClass	= isset( $lazyBanner ) && $lazyBanner && $contentBanner ? 'cmt-lazy-img' : null;

$cbkgSrcset		= isset( $cbkgLazyClass ) ? $bkgSmallUrl . " 1x, " . $bkgMediumUrl . " 1.5x, " . $bannerObj->getFileUrl() . " 2x" : null;
$cbkgSizes		= isset( $cbkgLazyClass ) ? "(min-width: 1025px) 2x, (min-width: 481px) 1.5x, 1x" : null;
$cbkgLazyAttrs	= isset( $cbkgLazyClass ) ? "data-src=\"$bkgSmallUrl\" data-srcset=\"$cbkgSrcset\" data-sizes=\"$cbkgSizes\"" : null;

$sliderIncludes	= isset( $sliderIncludes ) ? $sliderIncludes : $defaultIncludes;
?>
<?php if( $content ) { ?>
	<div class="page-content <?= $contentClass ?>">
		<?php if( $contentBanner ) { ?>
			<div class="page-content-banner">
				<img class="width width-100 <?= $cbkgLazyClass ?>" src="<?= $bkgUrl ?>" title="<?= "{$model->displayName}" ?>" alt="<?= "{$model->displayName}" ?>" <?= $cbkgLazyAttrs ?> />
			</div>
		<?php } ?>
		<?php if( !empty( $contentTitle ) ) { ?>
			<h1 class="page-content-title"><?= $contentTitle ?></h1>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<h2 class="page-content-info reader"><?= $contentInfo ?></h2>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<h3 class="page-content-summary reader"><?= $purifySummary ? HtmlPurifier::process( $contentSummary ) : $contentSummary ?></h3>
		<?php } ?>
		<?php if( $contentSocial ) { ?>
			<?php include isset( $socialIncludes ) ? "$socialIncludes/social.php" : "$defaultIncludes/social.php"; ?>
		<?php } ?>
		<?php include $preObjects; ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="page-content-data <?= $contentDataClass ?>"><?= $purifyContent ? HtmlPurifier::process( $contentData ) : $contentData ?></div>
		<?php } ?>
		<?php if( $contentGallery ) { ?>
			<?php include "$sliderIncludes/slider.php"; ?>
		<?php } ?>
		<?php if( $contentLabels ) { ?>
			<?php include "$defaultIncludes/labels.php"; ?>
		<?php } ?>
		<?php include $buffer; ?>
		<?php include $innerObjects; ?>
	</div>
<?php } ?>
