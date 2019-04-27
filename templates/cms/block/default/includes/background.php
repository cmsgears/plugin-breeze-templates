<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Max Cover ----------------

$maxCover = isset( $settings->maxCover ) ? $settings->maxCover : $widget->maxCover;

// Background ---------------

$bkg			= isset( $settings->bkg ) ? $settings->bkg : $widget->bkg;
$fixedBkg		= isset( $settings->fixedBkg ) ? $settings->fixedBkg : $widget->fixedBkg;
$scrollBkg		= isset( $settings->scrollBkg ) ? $settings->scrollBkg : $widget->scrollBkg;
$parallaxBkg	= isset( $settings->parallaxBkg ) ? $settings->parallaxBkg : $widget->parallaxBkg;
$bkgClass		= !empty( $settings->bkgClass ) ? $settings->bkgClass : $widget->bkgClass;
$bkgVideo		= !empty( $settings->bkgVideo ) ? $settings->bkgVideo : $widget->bkgVideo;
$lazyBanner		= isset( $settings->lazyBanner ) ? $settings->lazyBanner : $widget->lazyBanner;
$resBanner		= isset( $settings->resBanner ) ? $settings->resBanner : $widget->resBanner;

$texture		= isset( $settings->texture ) ? $settings->texture : $widget->texture;
$textureClass	= !empty( $model->texture ) ? $model->texture : $widget->textureClass;

$bkgVideoSrc = $bkgVideo ? ( isset( $model->video ) ? $model->video->getVideoTag( [ 'class' => $bkgClass ] ) : $widget->bkgVideoSrc ) : null;

$bannerObj	= $model->banner;
$banner		= ( isset( $settings->defaultBanner ) && $settings->defaultBanner ) || $widget->defaultBanner ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= $lazyBanner ? CodeGenUtil::getSmallUrl( $bannerObj, [ 'image' => $banner ] ) : CodeGenUtil::getFileUrl( $bannerObj, [ 'image' => $banner ] );

$lazyBanner	= isset( $bannerObj ) & $lazyBanner ? true : false;
$bkgUrl		= isset( $bannerUrl ) ? $bannerUrl : $widget->bkgUrl;

$bkgLazyClass	= $lazyBanner ? 'cmt-lazy-bkg' : ( $resBanner ? 'cmt-res-bkg' : null );
$bkgUrl			= $lazyBanner ? $bannerObj->getSmallPlaceholderUrl() : $bkgUrl;

$bkgSrcset		= isset( $bannerObj ) ? $bannerObj->generateSrcset( true ) : null;
$bkgSizes		= isset( $bannerObj ) ? $bannerObj->srcset : null;
$bkgLazyAttrs	= isset( $bannerObj ) ? "data-srcset=\"$bkgSrcset\" data-sizes=\"$bkgSizes\"" : null;
?>

<?php if( !empty( $bkgUrl ) ) { ?>
	<?php if( $bkg ) { ?>
		<div class="block-bkg <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } ?>

	<?php if( $fixedBkg ) { ?>
		<div class="block-bkg-fixed <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } ?>

	<?php if( $scrollBkg ) { ?>
		<div class="block-bkg-scroll <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } ?>

	<?php if( $parallaxBkg ) { ?>
		<div class="block-bkg-parallax <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } ?>
<?php } ?>

<?php if( !empty( $bkgVideoSrc ) ) { ?>
	<?= $bkgVideoSrc ?>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>
