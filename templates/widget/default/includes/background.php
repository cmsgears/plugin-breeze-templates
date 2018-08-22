<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$bkg		= !empty( $settings->bkg ) ? $settings->bkg : $widget->bkg;
$bkgClass	= !empty( $settings->bkgClass ) ? $settings->bkgClass : $widget->bkgClass;

$texture		= !empty( $settings->texture ) ? $settings->texture : $widget->texture;
$textureClass	= !empty( $model->texture ) ? $model->texture : $widget->textureClass;

$banner		= ( !empty( $settings->defaultBanner ) && $settings->defaultBanner ) || $widget->defaultBanner ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= CodeGenUtil::getFileUrl( $model->banner, [ 'image' => $banner ] );
$bkgUrl		= isset( $bannerUrl ) ? $bannerUrl : $widget->bkgUrl;
?>

<?php if( $bkg && !empty( $bkgUrl ) ) { ?>
	<div class="widget-bkg <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>
