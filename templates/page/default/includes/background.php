<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Media --------------------

$defaultAvatar	= !empty( $settings->defaultAvatar ) ? $settings->defaultAvatar : false;
$defaultBanner	= !empty( $settings->defaultBanner ) ? $settings->defaultBanner : false;
$fixedBanner	= !empty( $settings->fixedBanner ) ? $settings->fixedBanner : false;
$scrollBanner	= !empty( $settings->scrollBanner ) ? $settings->scrollBanner : false;
$parallaxBanner	= !empty( $settings->parallaxBanner ) ? $settings->parallaxBanner : false;

$texture		= !empty( $settings->texture ) ? $settings->texture : false;
$textureClass	= !empty( $model->texture ) && $model->texture !== 'texture' ? $model->texture : null;

// Max Cover ----------------

$maxCover	= !empty( $settings->maxCover ) ? $settings->maxCover : false;

// Background ---------------

$bkg		= !empty( $settings->background ) ? $settings->background : false;
$bkgClass	= !empty( $settings->backgroundClass ) ? $settings->backgroundClass : null;

$banner		= $defaultBanner ? ( isset( $pageBanner ) ? $pageBanner : SiteProperties::getInstance()->getDefaultBanner() ) : null;
$bannerUrl	= CodeGenUtil::getFileUrl( $modelContent->banner, [ 'image' => $banner ] );

// Slides -------------------

$gallery	= $modelContent->gallery;
$slides		= isset( $gallery ) ? $gallery->files : [];
?>

<?php if( !empty( $bannerUrl ) && $bkg ) { ?>
	<?php if( $fixedBanner ) { ?>
		<div class="page-bkg-fixed <?= $bkgClass ?>" style="background-image:url(<?= $bannerUrl ?>);" ></div>
	<?php } else if( $parallaxBanner ) { ?>
		<div class="page-bkg-parallax <?= $bkgClass ?>" style="background-image:url(<?= $bannerUrl ?>);" ></div>
	<?php } else if( $scrollBanner ) { ?>
		<div class="page-bkg-scroll <?= $bkgClass ?>" style="background-image:url(<?= $bannerUrl ?>);" ></div>
	<?php } else { ?>
		<div class="page-bkg <?= $bkgClass ?>" style="background-image:url(<?= $bannerUrl ?>);" ></div>
	<?php } ?>
	<?php if( $texture ) { ?>
		<div class="<?= $textureClass ?>"></div>
	<?php } ?>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>
