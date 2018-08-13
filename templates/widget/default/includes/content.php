<?php
$content			= $settings->content ?? $widget->content;
$contentTitle		= isset( $settings ) && $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : $widget->contentTitle;
$contentInfo		= isset( $settings ) && $settings->contentInfo && !empty( $model->description ) ? $model->description : $widget->contentInfo;
$contentSummary		= isset( $settings ) && $settings->contentSummary && !empty( $model->summary ) ? $model->summary : $widget->contentSummary;
$contentData		= isset( $settings ) && $settings->contentData && !empty( $model->content ) ? $model->content : $widget->contentData;

$contentClass		= isset( $settings ) && !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= isset( $settings ) && !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;
?>

<?php if( $content ) { ?>
	<div class="widget-content <?= $contentClass ?>">
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="widget-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="widget-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="widget-content-summary reader"><?= $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="widget-content-data <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
	</div>
<?php } ?>
