<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header				= !empty( $settings->header ) ? $settings->header : false;
$headerIcon			= !empty( $settings->headerIcon ) ? $settings->headerIcon : false;
$headerIconClass	= $model->icon;
$headerTitle		= !empty( $settings->headerTitle ) ? $model->displayName : null;
$headerInfo			= !empty( $settings->headerInfo ) ? $model->description : null;
$headerContent		= !empty( $settings->headerContent ) ? $modelContent->summary : null;
$headerScroller		= !empty( $settings->headerScroller ) ? $settings->headerScroller : false;

$headerBanner	= !empty( $settings->headerBanner ) ? $settings->headerBanner : false;
$headerGallery	= !empty( $settings->headerGallery ) ? $settings->headerGallery : false;

$avatar			= !empty( $settings->defaultAvatar ) ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= isset( $model->avatar ) ? CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] ) : CodeGenUtil::getFileUrl( null, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : $headerIconUrl;

$headerBanner	= $headerBanner && !empty( $bannerUrl );
$headerGallery	= $headerGallery && !empty( $slides );

$scroller = $headerScroller ? 'cscroller' : null;
?>

<?php if( $header ) { ?>
	<div class="page-header-wrap <?= $headerBanner || $headerGallery ? 'page-header-banner' : null ?>">
		<?php if( $headerBanner && !$headerGallery ) { ?>
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

		<?php if( $headerGallery ) { ?>
			<div class="fx fx-slider fx-slider-regular page-slider">
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
			<div class="page-header <?= $headerBanner ? "page-header-banner valign-center $scroller" : 'page-header-text' ?>">
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