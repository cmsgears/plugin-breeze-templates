<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header				= !empty( $settings->header ) ? $settings->header : $widget->header;
$headerIcon			= !empty( $settings->headerIcon ) ? $settings->headerIcon : $widget->headerIcon;
$headerIconClass	= !empty( $model->icon ) ? $model->icon : $widget->headerIconClass;
$headerTitle		= !empty( $settings->headerTitle ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->headerTitle;
$headerInfo			= !empty( $settings->headerInfo ) && $settings->headerInfo && !empty( $model->description ) ? $model->description : $widget->headerInfo;
$headerContent		= !empty( $settings->headerContent ) && $settings->headerContent && !empty( $model->summary ) ? $model->summary : $widget->headerContent;

$avatar			= ( !empty( $settings->defaultAvatar ) && $settings->defaultAvatar ) || $widget->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : $widget->headerIconUrl;
?>

<?php if( $header ) { ?>
	<div class="block-header-wrap">
		<div class="block-header">
			<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
				<div class="block-header-icon">
					<i class="<?= $headerIconClass ?>"></i>
				</div>
			<?php } ?>
			<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
				<div class="block-header-icon">
					<img class="fluid" src="<?= $headerIconUrl ?>" />
				</div>
			<?php } ?>
			<?php if( !empty( $headerTitle ) ) { ?>
				<div class="block-header-title"><?= $headerTitle ?></div>
			<?php } ?>
			<?php if( !empty( $headerInfo ) ) { ?>
				<div class="block-header-info reader"><?= $headerInfo ?></div>
			<?php } ?>
			<?php if( !empty( $headerContent ) ) { ?>
				<div class="block-header-content reader"><?= $headerContent ?></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
