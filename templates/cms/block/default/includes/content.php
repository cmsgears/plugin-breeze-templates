<?php
$content			= !empty( $settings->content ) ? $settings->content : $widget->content;
$contentTitle		= !empty( $settings->contentTitle ) && $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : $widget->contentTitle;
$contentInfo		= !empty( $settings->contentInfo ) && $settings->contentInfo && !empty( $model->description ) ? $model->description : $widget->contentInfo;
$contentSummary		= !empty( $settings->contentSummary ) && $settings->contentSummary && !empty( $model->summary ) ? $model->summary : $widget->contentSummary;
$contentData		= !empty( $settings->contentData ) && $settings->contentData && !empty( $model->content ) ? $model->content : $widget->contentData;

$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;
?>

<?php if( $content ) { ?>
	<div class="block-content <?= $contentClass ?>">
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="block-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="block-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="block-content-summary reader"><?= $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="block-content-data <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
	</div>
<?php } ?>
