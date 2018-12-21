<?php
// Yii Imports
yii\helpers\HtmlPurifier;

// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header				= !empty( $settings->header ) ? $settings->header : $widget->header;
$headerIcon			= !empty( $settings->headerIcon ) ? $settings->headerIcon : $widget->headerIcon;
$headerIconClass	= !empty( $model->icon ) ? $model->icon : $widget->headerIconClass;
$headerTitle		= !empty( $settings->headerTitle ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->headerTitle;
$headerInfo			= !empty( $settings->headerInfo ) && $settings->headerInfo && !empty( $model->description ) ? $model->description : $widget->headerInfo;
$headerContent		= !empty( $settings->headerContent ) && $settings->headerContent && !empty( $model->summary ) ? HtmlPurifier::process( $model->summary ) : $widget->headerContent;

$avatar			= ( isset( $settings ) && $settings->defaultAvatar ) || $widget->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : $widget->headerIconUrl;
?>
<?php if( $header ) { ?>
	<div class="box-header-wrap">
		<div class="box-header">
			<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
				<div class="box-header-icon">
					<i class="<?= $headerIconClass ?>"></i>
				</div>
			<?php } ?>
			<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
				<div class="box-header-icon">
					<img class="fluid" src="<?= $headerIconUrl ?>" />
				</div>
			<?php } ?>
			<?php if( !empty( $headerTitle ) ) { ?>
				<div class="box-header-title"><?= $headerTitle ?></div>
			<?php } ?>
			<?php if( !empty( $headerInfo ) ) { ?>
				<div class="box-header-info reader"><?= $headerInfo ?></div>
			<?php } ?>
			<?php if( !empty( $headerContent ) ) { ?>
				<div class="box-header-content reader"><?= $headerContent ?></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
