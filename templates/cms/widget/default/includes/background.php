<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$bkg		= isset( $settings->bkg ) ? $settings->bkg : ( isset( $widget->bkg ) ? $widget->bkg : false );
$bkgClass	= isset( $settings->bkgClass ) ? $settings->bkgClass : ( isset( $widget->bkgClass ) ? $widget->bkgClass : null );
$bkgVideo	= !empty( $settings->bkgVideo ) ? $settings->bkgVideo : ( isset( $widget->bkgVideo ) ? $widget->bkgVideo : false );
$lazyBanner	= isset( $settings->lazyBanner ) ? $settings->lazyBanner : ( isset( $widget->lazyBanner ) ? $widget->lazyBanner : false );
$resBanner	= isset( $settings->resBanner ) ? $settings->resBanner : ( isset( $widget->resBanner ) ? $widget->resBanner : false );

$texture		= isset( $settings->texture ) ? $settings->texture : ( isset( $widget->texture ) ? $widget->texture : false );
$textureClass	= !empty( $model->texture ) ? $model->texture : ( isset( $widget->textureClass ) ? $widget->textureClass : null );

$bkgVideoSrc = $bkgVideo ? ( isset( $model->video ) ? $model->video->getVideoTag( [ 'class' => $bkgClass ] ) : $widget->bkgVideoSrc ) : null;

$bannerObj	= $model->banner;
$banner		= ( isset( $settings->defaultBanner ) && $settings->defaultBanner ) || ( isset( $widget->defaultBanner ) ? $widget->defaultBanner : false ) ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= $lazyBanner ? CodeGenUtil::getSmallUrl( $bannerObj, [ 'image' => $banner ] ) : CodeGenUtil::getFileUrl( $bannerObj, [ 'image' => $banner ] );

$lazyBanner	= isset( $bannerObj ) & $lazyBanner ? true : false;
$bkgUrl		= isset( $bannerUrl ) ? $bannerUrl : ( isset( $widget->bkgUrl ) ? $widget->bkgUrl : null );

$bkgLazyClass	= $lazyBanner ? 'cmt-lazy-bkg' : ( $resBanner ? 'cmt-res-bkg' : null );
$bkgUrl			= $lazyBanner ? $bannerObj->getSmallPlaceholderUrl() : $bkgUrl;

$bkgSrcset		= isset( $bannerObj ) ? $bannerObj->generateSrcset( true ) : null;
$bkgSizes		= isset( $bannerObj ) ? $bannerObj->srcset : null;
$bkgLazyAttrs	= isset( $bannerObj ) ? "data-srcset=\"$bkgSrcset\" data-sizes=\"$bkgSizes\"" : null;
?>

<?php if( $bkg && !empty( $bkgUrl ) ) { ?>
	<div class="widget-bkg <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
<?php } ?>

<?php if( !empty( $bkgVideoSrc ) ) { ?>
	<?= $bkgVideoSrc ?>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>
