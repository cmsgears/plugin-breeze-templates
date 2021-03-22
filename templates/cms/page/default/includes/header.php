<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header		= isset( $settings->header ) ? $settings->header : false;
$headerIcon	= isset( $settings->headerIcon ) ? $settings->headerIcon : false;
$lazyAvatar	= isset( $settings->lazyAvatar ) ? $settings->lazyAvatar : false;

$headerTitle	= isset( $settings->headerTitle ) && $settings->headerTitle ? $model->displayName : null;
$headerInfo		= isset( $settings->headerInfo ) && $settings->headerInfo ? $model->description : null;
$headerContent	= isset( $settings->headerContent ) && $settings->headerContent ? HtmlPurifier::process( $modelContent->summary ) : null;
$headerFluid	= isset( $settings->headerFluid ) ? $settings->headerFluid : false;
$headerScroller	= isset( $settings->headerScroller ) ? $settings->headerScroller : false;

$headerBanner	= isset( $settings->headerBanner ) ? $settings->headerBanner : false;
$headerGallery	= isset( $settings->headerGallery ) ? $settings->headerGallery : false;

$avatarObj		= isset( $model->avatar ) ? $model->avatar : null;
$avatar			= isset( $settings->defaultAvatar ) && $settings->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= isset( $model->avatar ) ? ( $lazyAvatar ? CodeGenUtil::getSmallUrl( $avatarObj, [ 'image' => $avatar ] ) : CodeGenUtil::getFileUrl( $avatarObj, [ 'image' => $avatar ] ) ) : CodeGenUtil::getFileUrl( null, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : $headerIconUrl;

$headerBanner	= $headerBanner && !empty( $bkgUrl );
$headerGallery	= $headerGallery && !empty( $slides );

$fluidClass		= $headerFluid ? 'page-header-fluid' : 'page-header-banner';
$sliderClass	= $headerFluid ? 'page-slider-fluid' : 'page-slider';
$scroller		= $headerScroller ? 'cscroller' : null;

$lazyAvatar	= isset( $avatarObj ) & $lazyAvatar ? true : false;

$avatarUrl		= $lazyAvatar ? $avatarObj->getSmallPlaceholderUrl() : $headerIconUrl;
$iconLazyClass	= $lazyAvatar ? 'cmt-lazy-img' : ( isset( $avatarObj ) ? 'cmt-res-img' : null );

$smallUrl		= isset( $iconLazyClass ) ? $avatarObj->getSmallUrl() : null;
$iconSrcset		= isset( $iconLazyClass ) ? $avatarObj->generateSrcset() : null;
$iconSizes		= isset( $iconLazyClass ) ? $avatarObj->sizes : null;
$iconLazyAttrs	= isset( $iconLazyClass ) ? "data-src=\"$smallUrl\" data-srcset=\"$iconSrcset\" data-sizes=\"$iconSizes\"" : null;
?>
<?php if( $header ) { ?>
	<div class="page-header-wrap <?= $headerBanner || $headerGallery ? $fluidClass : null ?>">
		<?php if( $headerBanner && !$headerGallery ) { ?>
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

		<?php if( $headerGallery ) { ?>
			<div class="fx fx-slider fx-slider-regular <?= $sliderClass ?>">
			<?php
				foreach( $slides as $slide ) {

					$slideImageUrl	= $slide->getFileUrl();
					$slideImageAlt	= $slide->altText;
			?>
				<div>
					<div class="wrap-slide-content" style="background-image:url(<?= $slideImageUrl ?>)">
						<?php if( $texture ) { ?>
							<div class="<?= $textureClass ?>"></div>
						<?php } ?>
						<div class="slide-content">
							<div class="fxs-content reader">
								<div class="h3"><?= $slide->title ?></div>
								<?php if( !empty( $slide->description ) ) { ?>
									<div class="text text-default-r">
										<?= $slide->description ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			?>
			</div>
		<?php } else { ?>
			<div class="page-header <?= $headerBanner ? "page-header-scroll valign-center $scroller" : 'page-header-text' ?>">
				<?php include "$defaultIncludes/header-content.php"; ?>
			</div>
		<?php } ?>
	</div>
	<?php if( $headerGallery ) { ?>
		<div class="page-header-wrap">
			<div class="page-header page-header-plain">
				<?php include "$defaultIncludes/header-content.php"; ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>
