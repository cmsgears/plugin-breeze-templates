<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header				= isset( $settings->header ) ? $settings->header : ( isset( $widget->header ) ? $widget->header : false );
$headerIcon			= isset( $settings->headerIcon ) ? $settings->headerIcon : ( isset( $widget->headerIcon ) ? $widget->headerIcon : false );
$headerIconClass	= !empty( $model->icon ) ? $model->icon : ( isset( $widget->headerIconClass ) ? $widget->headerIconClass : null );
$headerTitle		= isset( $settings->headerTitle ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : ( isset( $widget->headerTitle ) ? $widget->headerTitle : null );
$lazyAvatar			= isset( $settings->lazyAvatar ) ? $settings->lazyAvatar : ( isset( $widget->lazyAvatar ) ? $widget->lazyAvatar : false );
$resAvatar			= isset( $settings->resAvatar ) ? $settings->resAvatar : ( isset( $widget->resAvatar ) ? $widget->resAvatar : false );

$avatarObj		= $model->avatar;
$avatar			= ( isset( $settings->defaultAvatar ) && $settings->defaultAvatar ) || ( isset( $widget->defaultAvatar ) ? $widget->defaultAvatar : false ) ? SiteProperties::getInstance()->getDefaultAvatar() : null;
$headerIconUrl	= !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : $lazyAvatar ? CodeGenUtil::getSmallUrl( $avatarObj, [ 'image' => $avatar ] ) : CodeGenUtil::getFileUrl( $avatarObj, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : ( isset( $widget->headerIconUrl ) ? $widget->headerIconUrl : null );

$lazyAvatar	= isset( $avatarObj ) & $lazyAvatar ? true : false;

$avatarUrl		= $lazyAvatar ? $avatarObj->getSmallPlaceholderUrl() : $headerIconUrl;
$iconLazyClass	= $lazyAvatar ? 'cmt-lazy-img' : ( isset( $avatarObj ) ? ( $resAvatar ? 'cmt-res-img' : null ) : null );

$smallUrl		= isset( $iconLazyClass ) ? $avatarObj->getSmallUrl() : null;
$iconSrcset		= isset( $iconLazyClass ) ? $avatarObj->generateSrcset() : null;
$iconSizes		= isset( $iconLazyClass ) ? $avatarObj->sizes : null;
$iconLazyAttrs	= isset( $iconLazyClass ) ? "data-src=\"$smallUrl\" data-srcset=\"$iconSrcset\" data-sizes=\"$iconSizes\"" : null;
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
					<img class="fluid <?= $iconLazyClass ?>" src="<?= $avatarUrl ?>" <?= $iconLazyAttrs ?> />
				</div>
			<?php } ?>
			<?php if( !empty( $headerTitle ) ) { ?>
				<div class="widget-header-title"><?= $headerTitle ?></div>
			<?php } ?>
			<?php if( !empty( $headerContent ) ) { ?>
				<div class="widget-header-content reader"><?= $headerContent ?></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
