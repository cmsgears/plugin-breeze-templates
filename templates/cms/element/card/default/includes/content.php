<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$content			= !empty( $settings->content ) ? $settings->content : $widget->content;
$contentTitle		= !empty( $settings->contentTitle ) && $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : $widget->contentTitle;
$contentInfo		= !empty( $settings->contentInfo ) && $settings->contentInfo && !empty( $model->description ) ? $model->description : $widget->contentInfo;
$contentSummary		= !empty( $settings->contentSummary ) && $settings->contentSummary && !empty( $model->summary ) ? HtmlPurifier::process( $model->summary ) : $widget->contentSummary;
$contentData		= !empty( $settings->contentData ) && $settings->contentData && !empty( $model->content ) ? HtmlPurifier::process( $model->content ) : $widget->contentData;

$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;
?>
<?php if( $content ) { ?>
	<div class="card-content <?= $contentClass ?>">
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="card-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="card-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="card-content-summary reader"><?= $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="card-content-data <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
	</div>
<?php } ?>
