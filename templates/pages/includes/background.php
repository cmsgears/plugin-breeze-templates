<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Media --------------------

$defaultAvatar	= $settings->defaultAvatar ?? false;
$defaultBanner	= $settings->defaultBanner ?? false;
$fixedBanner	= $settings->fixedBanner ?? false;
$scrollBanner	= $settings->scrollBanner ?? false;
$parallaxBanner	= $settings->parallaxBanner ?? false;

$texture		= $settings->texture ?? false;
$textureClass	= !empty( $model->texture ) && $model->texture !== 'texture' ? $model->texture : null;

// Max Cover ----------------

$maxCover			= $settings->maxCover ?? false;
$maxCoverClass		= !empty( $settings->maxCoverClass ) ? $settings->maxCoverClass : null;
$maxCoverContent	= !empty( $settings->maxCoverContent ) ? $settings->maxCoverContent : null;

// Background ---------------

$bkg		= $settings->background ?? false;
$bkgClass	= !empty( $settings->backgroundClass ) ? $settings->backgroundClass : null;

$banner		= $defaultBanner ? SiteProperties::getInstance()->getDefaultBanner() : null;
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
	<div class="max-cover <?= $maxCoverClass ?>">
		<?= $maxCoverContent ?>
	</div>
<?php } ?>
