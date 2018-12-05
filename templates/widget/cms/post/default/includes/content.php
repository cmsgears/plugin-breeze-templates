<?php
$content			= isset( $settings ) & !empty( $settings->content ) ? $settings->content : true;
$contentTitle		= isset( $settings ) && $settings->contentTitle && !empty( $widgetObj->displayName ) ? $widgetObj->displayName : null;
$contentInfo		= isset( $settings ) && $settings->contentInfo && !empty( $widgetObj->description ) ? $widgetObj->description : null;
$contentSummary		= isset( $settings ) && $settings->contentSummary && !empty( $widgetObj->summary ) ? $widgetObj->summary : null;
$contentData		= isset( $settings ) && $settings->contentData && !empty( $widgetObj->content ) ? $widgetObj->content : null;

$contentClass		= isset( $settings ) && !empty( $settings->contentClass ) ? $settings->contentClass : null;
$contentDataClass	= isset( $settings ) && !empty( $settings->contentDataClass ) ? $settings->contentDataClass : null;
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
