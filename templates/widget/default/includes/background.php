<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$bkg		= isset( $settings->bkg ) ? $settings->bkg : false;
$bkgClass	= isset( $settings->bkgClass ) ? $settings->bkgClass : null;

$texture		= isset( $settings->texture ) ? $settings->texture : false;
$textureClass	= !empty( $model->texture ) ? $model->texture : null;

$banner		= ( isset( $settings->defaultBanner ) && $settings->defaultBanner ) ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bannerUrl	= CodeGenUtil::getFileUrl( $model->banner, [ 'image' => $banner ] );
$bkgUrl		= isset( $bannerUrl ) ? $bannerUrl : null;
?>

<?php if( $bkg && !empty( $bkgUrl ) ) { ?>
	<div class="widget-bkg <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>
