<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$bkg		= isset( $settings->bkg ) ? $settings->bkg : $widget->bkg;
$bkgClass	= isset( $settings->bkgClass ) ? $settings->bkgClass : $widget->bkgClass;
$lazyBanner	= isset( $settings->lazyBanner ) ? $settings->lazyBanner : $widget->lazyBanner;
$resBanner	= isset( $settings->resBanner ) ? $settings->resBanner : $widget->resBanner;

$texture		= isset( $settings->texture ) ? $settings->texture : $widget->texture;
$textureClass	= !empty( $model->texture ) ? $model->texture : $widget->textureClass;

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

<?php if( $bkg && !empty( $bkgUrl ) ) { ?>
	<div class="widget-bkg <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>
