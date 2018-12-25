<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$content			= isset( $settings->content ) ? $settings->content : false;
$contentTitle		= isset( $settings->contentTitle ) && $settings->contentTitle ? ( !empty( $model->title ) ? $model->title : $model->name ) : null;
$contentInfo		= isset( $settings->contentInfo ) && $settings->contentInfo ? $model->description : null;
$contentSummary		= isset( $settings->contentSummary ) && $settings->contentSummary ? HtmlPurifier::process( $modelContent->summary ) : null;

$contentAvatar	= isset( $settings->contentAvatar ) ? $settings->contentAvatar : false;
$contentBanner	= isset( $settings->contentBanner ) ? $settings->contentBanner : false;
$contentGallery	= isset( $settings->contentGallery ) ? $settings->contentGallery : false;

$contentSocial	= isset( $settings->contentSocial ) ? $settings->contentSocial : false;
$contentLabels	= isset( $settings->contentLabels ) ? $settings->contentLabels : false;

$contentData		= isset( $settings->contentData ) && $settings->contentData ? HtmlPurifier::process( $modelContent->content ) : null;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : null;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';
?>
<?php if( $content ) { ?>
	<div class="page-content <?= $contentClass ?>">
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="page-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="page-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="page-content-summary reader"><?= $contentSummary ?></div>
		<?php } ?>
		<?php if( $contentSocial ) { ?>
			<?php include "$defaultIncludes/social.php"; ?>
		<?php } ?>
		<?php include $preObjects; ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="page-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php if( !empty( $formView ) ) { ?>
			<div class="page-content-form">
				<?php include $formView; ?>
			</div>
		<?php } ?>
		<?php if( $contentLabels ) { ?>
			<?php include "$defaultIncludes/labels.php"; ?>
		<?php } ?>
		<?php include $buffer; ?>
		<?php include $innerObjects; ?>
	</div>
<?php } ?>
