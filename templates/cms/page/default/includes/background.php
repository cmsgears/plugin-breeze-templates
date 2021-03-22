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
$resBanner		= isset( $settings->resBanner ) ? $settings->resBanner : false;

$texture		= isset( $settings->texture ) ? $settings->texture : false;
$textureClass	= !empty( $model->texture ) && $model->texture !== 'texture' ? $model->texture : null;

// Max Cover ----------------

$maxCover = isset( $settings->maxCover ) ? $settings->maxCover : false;

// Background ---------------

$bkg		= isset( $settings->background ) ? $settings->background : false;
$bkgClass	= !empty( $settings->backgroundClass ) ? $settings->backgroundClass : null;

$bannerObj	= $modelContent->banner;
$mbannerObj	= $modelContent->mobileBanner;
$banner		= $defaultBanner ? ( isset( $pageBanner ) ? $pageBanner : SiteProperties::getInstance()->getPageBanner() ) : null;
$bannerUrl	= $lazyBanner ? CodeGenUtil::getSmallUrl( $modelContent->banner, [ 'image' => $banner ] ) : CodeGenUtil::getFileUrl( $modelContent->banner, [ 'image' => $banner ] );
$mbannerUrl	= isset( $mbannerObj ) ? CodeGenUtil::getFileUrl( $mbannerObj ) : null;

$bkgSmallUrl	= isset( $mbannerUrl ) ? $mbannerUrl : ( isset( $bannerObj ) ? $bannerObj->getSmallUrl() : null );
$bkgMediumUrl	= isset( $bannerObj ) ? $bannerObj->getMediumUrl() : null;

$lazyBanner	= isset( $bannerObj ) & $lazyBanner ? true : false;
$bkgUrl		= $bannerUrl;

$bkgLazyClass	= $lazyBanner ? ( $fluidBanner ? 'cmt-lazy-img' : 'cmt-lazy-bkg' ) : ( $fluidBanner ? 'cmt-res-img' : ( $resBanner ? 'cmt-res-bkg' : null ) );
$bkgUrl			= $lazyBanner ? $bannerObj->getSmallPlaceholderUrl() : $bkgUrl;

$bkgSrcset = isset( $bannerObj ) ? ( $fluidBanner ? $bannerObj->generateSrcset() : $bannerObj->generateSrcset( true ) ) : null;

if( $fluidBanner && isset( $mbannerUrl ) ) {

	$bkgSrcset	= preg_split( '/,/', $bkgSrcset );

	if( count( $bkgSrcset ) > 2 ) {

		$bkgSrcset[ 2 ] = "$mbannerUrl 640w"; // Show mobile banner on devices having width lesser than 640

		$bkgSrcset = join( ',', $bkgSrcset );
	}
}

$bkgSizes		= isset( $bannerObj ) ? ( $fluidBanner ? $bannerObj->sizes : $bannerObj->srcset ) : null;
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
