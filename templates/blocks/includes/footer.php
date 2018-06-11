<?php
use cmsgears\core\common\utilities\CodeGenUtil;

$footer				= $settings->footer ?? $widget->footer;
$footerIcon			= $settings->footerIcon ?? $widget->footerIcon;
$footerIconClass	= $settings->footerIconClass ?? $widget->footerIconClass;
$footerTitle		= isset( $settings ) && ( $settings->footerTitle && !empty( $settings->footerTitleData ) ) ? $settings->footerTitleData : ( isset( $settings ) && $settings->footerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->footerTitle );
$footerInfo			= isset( $settings ) && ( $settings->footerInfo && !empty( $settings->footerInfoData ) ) ? $settings->footerInfoData : ( isset( $settings ) && $settings->footerInfo && !empty( $model->description ) ? $model->description : $widget->footerInfo );
$footerContent		= isset( $settings ) && ( $settings->footerContent && !empty( $settings->footerContentData ) ) ? $settings->footerContentData : ( isset( $settings ) && $settings->footerContent && !empty( $model->summary ) ? $model->summary : $widget->footerContent );

$footerIconUrl	= isset( $settings ) && !empty( $settings->footerIconUrl ) ? $settings->footerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$footerIconUrl	= !empty( $footerIconUrl ) ? $footerIconUrl : $widget->footerIconUrl;
?>

<?php if( $footer ) { ?>
	<div class="block-footer-wrap">
		<div class="block-footer">
			<?php if( $footerIcon && !empty( $footerIconClass ) ) { ?>
				<div class="block-footer-icon">
					<i class="<?= $footerIconClass ?>"></i>
				</div>
			<?php } ?>
			<?php if( $footerIcon && !empty( $footerIconUrl ) ) { ?>
				<div class="block-footer-icon">
					<img class="fluid" src="<?= $footerIconUrl ?>" />
				</div>
			<?php } ?>
			<?php if( !empty( $footerTitle ) ) { ?>
				<div class="block-footer-title"><?= $footerTitle ?></div>
			<?php } ?>
			<?php if( !empty( $footerInfo ) ) { ?>
				<div class="block-footer-info reader"><?= $footerInfo ?></div>
			<?php } ?>
			<?php if( !empty( $footerContent ) ) { ?>
				<div class="block-footer-content reader"><?= $footerContent ?></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
