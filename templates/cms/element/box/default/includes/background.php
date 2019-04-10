<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Max Cover ----------------

$maxCover = isset( $settings->maxCover ) ? $settings->maxCover : $widget->maxCover;

// Background ---------------

$bkg		= isset( $settings->bkg ) ? $settings->bkg : $widget->bkg;
$bkgClass	= !empty( $settings->bkgClass ) ? $settings->bkgClass : $widget->bkgClass;
$lazyBanner	= isset( $settings->lazyBanner ) ? $settings->lazyBanner : $widget->lazyBanner;

$texture		= isset( $settings->texture ) ? $settings->texture : $widget->texture;
$textureClass	= !empty( $model->texture ) ? $model->texture : $widget->textureClass;

$bannerObj	= $model->banner;
$banner		= ( isset( $settings->defaultBanner ) && $settings->defaultBanner ) || $widget->defaultBanner ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= $lazyBanner ? CodeGenUtil::getSmallUrl( $bannerObj, [ 'image' => $banner ] ) : CodeGenUtil::getFileUrl( $bannerObj, [ 'image' => $banner ] );

$lazyBanner	= isset( $bannerObj ) & $lazyBanner ? true : false;
$bkgUrl		= isset( $bannerUrl ) ? $bannerUrl : $widget->bkgUrl;

$bkgLazyClass	= $lazyBanner ? 'cmt-lazy-bkg' : 'cmt-res-bkg';
$bkgUrl			= $lazyBanner ? $bannerObj->getSmallPlaceholderUrl() : $bkgUrl;

$bkgSrcset		= isset( $bannerObj ) ? $bannerObj->getFileUrl() . ", " . $bannerObj->getMediumUrl() . ", " . $bannerObj->getSmallUrl() : null;
$bkgSizes		= isset( $bannerObj ) ? "1025, 481" : null;
$bkgLazyAttrs	= isset( $bannerObj ) ? "data-srcset=\"$bkgSrcset\" data-sizes=\"$bkgSizes\"" : null;
?>

<?php if( $bkg && !empty( $bkgUrl ) ) { ?>
	<div class="box-bkg <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>
