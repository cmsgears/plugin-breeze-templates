<?php
use cmsgears\core\common\utilities\CodeGenUtil;

$footer				= $settings->footer ?? $widget->footer;
$footerIcon			= $settings->footerIcon ?? $widget->footerIcon;
$footerIconClass	= $settings->footerIconClass ?? $widget->footerIconClass;
$footerTitle		= $settings->footerTitle && !empty( $settings->footerTitleData ) ? $settings->footerTitleData : ( $settings->footerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->footerTitle );
$footerInfo			= $settings->footerInfo && !empty( $settings->footerInfoData ) ? $settings->footerInfoData : ( $settings->footerInfo && !empty( $model->description ) ? $model->description : $widget->footerInfo );
$footerContent		= $settings->footerContent && !empty( $settings->footerContentData ) ? $settings->footerContentData : ( $settings->footerContent && !empty( $model->summary ) ? $model->summary : $widget->footerContent );

$footerIconUrl	= $footerIcon && !empty( $settings->footerIconUrl ) ? $settings->footerIconUrl : CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$footerIconUrl	= !empty( $footerIconUrl ) ? $footerIconUrl : $widget->footerIconUrl;
?>

<?php if( $footer ) { ?>
	<div class="box-footer-wrap">
		<div class="box-footer">
			<?php if( $footerIcon && !empty( $footerIconClass ) ) { ?>
				<div class="box-footer-icon">
					<i class="<?= $footerIconClass ?>"></i>
				</div>
			<?php } ?>
			<?php if( $footerIcon && !empty( $footerIconUrl ) ) { ?>
				<div class="box-footer-icon">
					<img class="fluid" src="<?= $footerIconUrl ?>" />
				</div>
			<?php } ?>
			<?php if( !empty( $footerTitle ) ) { ?>
				<div class="box-footer-title"><?= $footerTitle ?></div>
			<?php } ?>
			<?php if( !empty( $footerInfo ) ) { ?>
				<div class="box-footer-info reader"><?= $footerInfo ?></div>
			<?php } ?>
			<?php if( !empty( $footerContent ) ) { ?>
				<div class="box-footer-content reader"><?= $footerContent ?></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
