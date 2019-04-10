<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Media --------------------

$defaultAvatar	= isset( $settings->defaultAvatar ) ? $settings->defaultAvatar : false;
$defaultBanner	= isset( $settings->defaultBanner ) ? $settings->defaultBanner : false;
$fixedBanner	= isset( $settings->fixedBanner ) ? $settings->fixedBanner : false;
$scrollBanner	= isset( $settings->scrollBanner ) ? $settings->scrollBanner : false;
$parallaxBanner	= isset( $settings->parallaxBanner ) ? $settings->parallaxBanner : false;
$fluidBanner	= isset( $settings->fluidBanner ) ? $settings->fluidBanner : false;
$lazyBanner		= isset( $settings->lazyBanner ) ? $settings->lazyBanner : false;

$texture		= isset( $settings->texture ) ? $settings->texture : false;
$textureClass	= !empty( $model->texture ) && $model->texture !== 'texture' ? $model->texture : null;

// Max Cover ----------------

$maxCover	= isset( $settings->maxCover ) ? $settings->maxCover : false;

// Background ---------------

$bkg		= isset( $settings->background ) ? $settings->background : false;
$bkgClass	= !empty( $settings->backgroundClass ) ? $settings->backgroundClass : null;

$bannerObj	= $modelContent->banner;
$banner		= $defaultBanner ? ( isset( $pageBanner ) ? $pageBanner : SiteProperties::getInstance()->getPageBanner() ) : null;
$bannerUrl	= $lazyBanner ? CodeGenUtil::getSmallUrl( $modelContent->banner, [ 'image' => $banner ] ) : CodeGenUtil::getFileUrl( $modelContent->banner, [ 'image' => $banner ] );

$bkgSmallUrl	= isset( $bannerObj ) ? $bannerObj->getSmallUrl() : null;
$bkgMediumUrl	= isset( $bannerObj ) ? $bannerObj->getMediumUrl() : null;

$lazyBanner	= isset( $bannerObj ) & $lazyBanner ? true : false;
$bkgUrl		= $bannerUrl;

$bkgLazyClass	= $lazyBanner ? ( $fluidBanner ? 'cmt-lazy-img' : 'cmt-lazy-bkg' ) : ( $fluidBanner ? 'cmt-res-img' : 'cmt-res-bkg' );
$bkgUrl			= $lazyBanner ? $bannerObj->getSmallPlaceholderUrl() : $bkgUrl;

$bkgSrcset		= isset( $bannerObj ) ? ( $fluidBanner ? $bkgSmallUrl . " 1x, " . $bkgMediumUrl . " 1.5x, " . $bannerObj->getFileUrl() . " 2x" : $bannerObj->getFileUrl() . ", " . $bkgMediumUrl . ", " . $bkgSmallUrl ) : null;
$bkgSizes		= isset( $bannerObj ) ? ( $fluidBanner ? "(min-width: 1025px) 2x, (min-width: 481px) 1.5x, 1x" : "1025, 481" ) : null;
$bkgLazyAttrs	= isset( $bannerObj ) ? ( $fluidBanner ? ( $lazyBanner ? "data-src=\"$bkgSmallUrl\" data-srcset=\"$bkgSrcset\" data-sizes=\"$bkgSizes\"" : "srcset=\"$bkgSrcset\" sizes=\"$bkgSizes\"" ) : "data-srcset=\"$bkgSrcset\" data-sizes=\"$bkgSizes\"" ) : null;

// Slides -------------------

$gallery	= $modelContent->gallery;
$slides		= isset( $gallery ) ? $gallery->files : [];
?>
<?php if( !empty( $bannerUrl ) && $bkg ) { ?>
	<?php if( $fixedBanner ) { ?>
		<div class="page-bkg-fixed <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } else if( $parallaxBanner ) { ?>
		<div class="page-bkg-parallax <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } else if( $scrollBanner ) { ?>
		<div class="page-bkg-scroll <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } else if( $fluidBanner ) { ?>
		<div class="page-bkg-fluid <?= $bkgClass ?>">
			<img class="<?= $bkgLazyClass ?>" src="<?= $bannerUrl ?>" alt="<?= $model->displayName ?>" <?= $bkgLazyAttrs ?> />
		</div>
	<?php } else { ?>
		<div class="page-bkg <?= $bkgClass ?> <?= $bkgClass ?> <?= $bkgLazyClass ?>" style="background-image:url(<?= $bkgUrl ?>);" <?= $bkgLazyAttrs ?>></div>
	<?php } ?>
	<?php if( $texture ) { ?>
		<div class="<?= $textureClass ?>"></div>
	<?php } ?>
<?php } ?>

<?php if( $maxCover ) { ?>
	<div class="max-cover"></div>
<?php } ?>
