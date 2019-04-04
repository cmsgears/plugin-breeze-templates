<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Header -------------------

$header				= isset( $settings->header ) ? $settings->header : $widget->header;
$headerIcon			= isset( $settings->headerIcon ) ? $settings->headerIcon : $widget->headerIcon;
$headerIconClass	= !empty( $model->icon ) ? $model->icon : $widget->headerIconClass;
$headerTitle		= isset( $settings->headerTitle ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->headerTitle;
$headerInfo			= isset( $settings->headerInfo ) && $settings->headerInfo && !empty( $model->description ) ? $model->description : $widget->headerInfo;
$headerContent		= isset( $settings->headerContent ) && $settings->headerContent && !empty( $model->summary ) ? HtmlPurifier::process( $model->summary ) : $widget->headerContent;
$lazyAvatar			= isset( $settings->lazyAvatar ) ? $settings->lazyAvatar : $widget->lazyAvatar;

$avatarObj		= $model->avatar;
$avatar			= ( isset( $settings->defaultAvatar ) && $settings->defaultAvatar ) || $widget->defaultAvatar ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : CodeGenUtil::getSmallUrl( $model->avatar, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : $widget->headerIconUrl;

$lazyAvatar	= isset( $avatarObj ) & $lazyAvatar ? true : false;

$avatarUrl		= $lazyAvatar ? $avatarObj->getSmallPlaceholderUrl() : $headerIconUrl;
$iconLazyClass	= $lazyAvatar ? 'cmt-lazy-img' : ( isset( $avatarObj ) ? 'cmt-res-img' : null );

$smallUrl		= isset( $iconLazyClass ) ? $avatarObj->getSmallUrl() : null;
$iconSrcset		= isset( $iconLazyClass ) ? $avatarObj->getSmallUrl() . " 1x, " . $avatarObj->getMediumUrl() . " 1.5x, " . $avatarObj->getFileUrl() . " 2x" : null;
$iconSizes		= isset( $iconLazyClass ) ? "(min-width: 1025px) 2x, (min-width: 481px) 1.5x, 1x" : null;
$iconLazyAttrs	= isset( $iconLazyClass ) ? "data-src=\"$smallUrl\" data-srcset=\"$iconSrcset\" data-sizes=\"$iconSizes\"" : null;
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
				<img class="fluid <?= $iconLazyClass ?>" src="<?= $avatarUrl ?>" <?= $iconLazyAttrs ?> />
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
