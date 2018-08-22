<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header				= !empty( $settings->header ) ? $settings->header : $widget->header;
$headerIcon			= !empty( $settings->headerIcon ) ? $settings->headerIcon : $widget->headerIcon;
$headerIconClass	= !empty( $model->icon ) ? $model->icon : $widget->headerIconClass;
$headerTitle		= !empty( $settings->headerTitle ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->headerTitle;

$avatar			= ( isset( $settings ) && $settings->defaultAvatar ) || $widget->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : $widget->headerIconUrl;
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
