<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header		= isset( $settings ) & !empty( $settings->header ) ? $settings->header : false;
$headerIcon	= isset( $settings ) & !empty( $settings->headerIcon ) ? $settings->headerIcon : false;

$headerIconClass	= !empty( $widgetObj->icon ) ? $widgetObj->icon : null;
$headerTitle		= isset( $settings ) && $settings->headerTitle && !empty( $widgetObj->displayName ) ? $widgetObj->displayName : null;

$avatar			= ( isset( $settings ) && $settings->defaultAvatar ) ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : CodeGenUtil::getFileUrl( $widgetObj->avatar, [ 'image' => $avatar ] );
?>

<?php if( $header ) { ?>
	<div class="widget-header-wrap">
		<div class="widget-header">
			<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
				<div class="widget-header-icon">
					<i class="<?= $headerIconClass ?>"></i>
				</div>
			<?php } ?>
			<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
				<div class="widget-header-icon">
					<img class="fluid" src="<?= $headerIconUrl ?>" />
				</div>
			<?php } ?>
			<?php if( !empty( $headerTitle ) ) { ?>
				<div class="widget-header-title"><?= $headerTitle ?></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
