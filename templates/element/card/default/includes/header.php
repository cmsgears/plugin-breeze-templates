<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Header -------------------

$header				= $settings->header ?? $widget->header;
$headerIcon			= $settings->headerIcon ?? $widget->headerIcon;
$headerIconClass	= !empty( $model->icon ) ? $model->icon : $widget->headerIconClass;
$headerTitle		= isset( $settings ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->headerTitle;
$headerInfo			= isset( $settings ) && $settings->headerInfo && !empty( $model->description ) ? $model->description : $widget->headerInfo;
$headerContent		= isset( $settings ) && $settings->headerContent && !empty( $model->summary ) ? $model->summary : $widget->headerContent;

$avatar			= ( isset( $settings ) && $settings->defaultAvatar ) || $widget->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : $widget->headerIconUrl;
?>

<?php if( $header ) { ?>
	<div class="card-header">
		<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
			<div class="card-header-icon">
				<i class="<?= $headerIconClass ?>"></i>
			</div>
		<?php } ?>
		<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
			<div class="card-header-icon">
				<img class="fluid" src="<?= $headerIconUrl ?>" />
			</div>
		<?php } ?>
		<?php if( !empty( $headerTitle ) ) { ?>
			<div class="card-header-title"><?= $headerTitle ?></div>
		<?php } ?>
		<?php if( !empty( $headerInfo ) ) { ?>
			<div class="card-header-info reader"><?= $headerInfo ?></div>
		<?php } ?>
		<?php if( !empty( $headerContent ) ) { ?>
			<div class="card-header-content reader"><?= $headerContent ?></div>
		<?php } ?>
	</div>
<?php } ?>
