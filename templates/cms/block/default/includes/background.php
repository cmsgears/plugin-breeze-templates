<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Max Cover ----------------

$maxCover = !empty( $settings->maxCover ) ? $settings->maxCover : $widget->maxCover;

// Background ---------------

$bkg			= !empty( $settings->bkg ) ? $settings->bkg : $widget->bkg;
$fixedBkg		= !empty( $settings->fixedBkg ) ? $settings->fixedBkg : $widget->fixedBkg;
$scrollBkg		= !empty( $settings->scrollBkg ) ? $settings->scrollBkg : $widget->scrollBkg;
$parallaxBkg	= !empty( $settings->parallaxBkg ) ? $settings->parallaxBkg : $widget->parallaxBkg;
$bkgClass		= !empty( $settings->bkgClass ) ? $settings->bkgClass : $widget->bkgClass;

$texture		= !empty( $settings->texture ) ? $settings->texture : $widget->texture;
$textureClass	= !empty( $model->texture ) ? $model->texture : $widget->textureClass;

$banner		= ( !empty( $settings->defaultBanner ) && $settings->defaultBanner ) || $widget->defaultBanner ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= CodeGenUtil::getFileUrl( $model->banner, [ 'image' => $banner ] );
$bkgUrl		= isset( $bannerUrl ) ? $bannerUrl : $widget->bkgUrl;
?>

<?php if( !empty( $bkgUrl ) ) { ?>
	<?php if( $bkg ) { ?>
		<div class="block-bkg <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>

	<?php if( $fixedBkg ) { ?>
		<div class="block-bkg-fixed <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>

	<?php if( $scrollBkg ) { ?>
		<div class="block-bkg-scroll <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>

	<?php if( $parallaxBkg ) { ?>
		<div class="block-bkg-parallax <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
	<?php } ?>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>
