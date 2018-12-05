<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Background ---------------

$bkg		= isset( $settings ) & !empty( $settings->bkg ) ? $settings->bkg : false;
$bkgClass	= isset( $settings ) & !empty( $settings->bkgClass ) ? $settings->bkgClass : null;

$texture		= isset( $settings ) & !empty( $settings->texture ) ? $settings->texture : null;
$textureClass	= isset( $settings ) & !empty( $settings->textureClass ) ? $settings->textureClass : null;

$banner	= ( isset( $settings ) && $settings->defaultBanner ) ? SiteProperties::getInstance()->getDefaultBanner() : null;
$bkgUrl	= CodeGenUtil::getFileUrl( $widgetObj->banner, [ 'image' => $banner ] );
?>

<?php if( $bkg && !empty( $bkgUrl ) ) { ?>
	<div class="widget-bkg <?= $bkgClass ?>" style="background-image:url(<?= $bkgUrl ?>);" ></div>
<?php } ?>

<?php if( $texture ) { ?>
	<div class="<?= $textureClass ?>"></div>
<?php } ?>
