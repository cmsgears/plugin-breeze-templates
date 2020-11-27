<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$content			= isset( $settings->content ) ? $settings->content : ( isset( $widget->content ) ? $widget->content : false );
$contentTitle		= isset( $settings->contentTitle ) && $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : ( isset( $widget->contentTitle ) ? $widget->contentTitle : null );
$contentInfo		= isset( $settings->contentInfo ) && $settings->contentInfo && !empty( $model->description ) ? $model->description : ( isset( $widget->contentInfo ) ? $widget->contentInfo : null );
$contentSummary		= isset( $settings->contentSummary ) && $settings->contentSummary && !empty( $model->summary ) ? $model->summary : ( isset( $widget->contentSummary ) ? $widget->contentSummary : null );
$contentData		= isset( $settings->contentData ) && $settings->contentData && !empty( $model->content ) ? $model->content : ( isset( $widget->contentData ) ? $widget->contentData : null );

$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : ( isset( $widget->contentClass ) ? $widget->contentClass : null );
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : ( isset( $widget->contentDataClass ) ? $widget->contentDataClass : null );

$purifySummary	= isset( $settings->purifySummary ) ? $settings->purifySummary : true;
$purifyContent	= isset( $settings->purifyContent ) ? $settings->purifyContent : true;
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
			<div class="widget-content-summary reader"><?= $purifySummary ? HtmlPurifier::process( $contentSummary ) : $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="widget-content-data <?= $contentDataClass ?>"><?= $purifyContent ? HtmlPurifier::process( $contentData ) : $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
	</div>
<?php } ?>
