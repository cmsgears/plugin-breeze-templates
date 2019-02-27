<?php
use cmsgears\core\common\utilities\CodeGenUtil;

$footer				= isset( $settings->footer ) ? $settings->footer : $widget->footer;
$footerIcon			= isset( $settings->footerIcon ) ? $settings->footerIcon : $widget->footerIcon;
$footerIconClass	= !empty( $settings->footerIconClass ) ? $settings->footerIconClass : $widget->footerIconClass;
$footerTitle		= isset( $settings->footerTitle ) && $settings->footerTitle && !empty( $settings->footerTitleData ) ? $settings->footerTitleData : ( !empty( $settings->footerTitle ) && $settings->footerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->footerTitle );
$footerInfo			= isset( $settings->footerInfo ) && $settings->footerInfo && !empty( $settings->footerInfoData ) ? $settings->footerInfoData : ( !empty( $settings->footerInfo ) && $settings->footerInfo && !empty( $model->description ) ? $model->description : $widget->footerInfo );
$footerContent		= isset( $settings->footerContent ) && $settings->footerContent && !empty( $settings->footerContentData ) ? $settings->footerContentData : ( !empty( $settings->footerContent ) && $settings->footerContent && !empty( $model->summary ) ? $model->summary : $widget->footerContent );

$footerIconUrl	= !empty( $settings->footerIconUrl ) ? $settings->footerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$footerIconUrl	= !empty( $footerIconUrl ) ? $footerIconUrl : $widget->footerIconUrl;
?>
<?php if( $footer ) { ?>
	<div class="card-footer">
		<?php if( $footerIcon && !empty( $footerIconClass ) ) { ?>
			<div class="card-footer-icon">
				<i class="<?= $footerIconClass ?>"></i>
			</div>
		<?php } ?>
		<?php if( $footerIcon && !empty( $footerIconUrl ) ) { ?>
			<div class="card-footer-icon">
				<img class="fluid" src="<?= $footerIconUrl ?>" />
			</div>
		<?php } ?>
		<?php if( !empty( $footerTitle ) ) { ?>
			<div class="card-footer-title"><?= $footerTitle ?></div>
		<?php } ?>
		<?php if( !empty( $footerInfo ) ) { ?>
			<div class="card-footer-info reader"><?= $footerInfo ?></div>
		<?php } ?>
		<?php if( !empty( $footerContent ) ) { ?>
			<div class="card-footer-content reader"><?= $footerContent ?></div>
		<?php } ?>
	</div>
<?php } ?>
