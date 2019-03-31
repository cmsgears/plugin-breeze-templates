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
$lazyBanner		= isset( $settings->lazyBanner ) ? $settings->lazyBanner : $widget->lazyBanner;

$texture		= isset( $settings->texture ) ? $settings->texture : $widget->texture;
$textureClass	= !empty( $model->texture ) ? $model->texture : $widget->textureClass;

$bannerObj	= $model->banner;
$banner		= ( isset( $settings->defaultBanner ) && $settings->defaultBanner ) || $widget->defaultBanner ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= CodeGenUtil::getSmallUrl( $bannerObj, [ 'image' => $banner ] );

$lazyBanner	= isset( $bannerObj ) & $lazyBanner ? true : false;
$bkgUrl		= isset( $bannerUrl ) ? $bannerUrl : $widget->bkgUrl;

$bkgLazyClass	= $lazyBanner ? 'cmt-lazy-bkg' : 'cmt-res-bkg';
$bkgUrl			= $lazyBanner ? $bannerObj->getSmallPlaceholderUrl() : $bkgUrl;

$bkgSrcset		= isset( $bannerObj ) ? $bannerObj->getFileUrl() . ", " . $bannerObj->getMediumUrl() . ", " . $bannerObj->getSmallUrl() : null;
$bkgSizes		= isset( $bannerObj ) ? "1025, 481" : null;
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

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>
