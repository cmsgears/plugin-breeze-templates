<?php
// Yii Imports
yii\helpers\HtmlPurifier;

$content			= !empty( $settings->content ) ? $settings->content : false;
$contentTitle		= !empty( $settings->contentTitle ) && $settings->contentTitle ? ( !empty( $model->title ) ? $model->title : $model->name ) : null;
$contentInfo		= !empty( $settings->contentInfo ) && $settings->contentInfo ? $model->description : null;
$contentSummary		= !empty( $settings->contentSummary ) && $settings->contentSummary ? HtmlPurifier::process( $modelContent->summary ) : null;

$contentAvatar	= !empty( $settings->contentAvatar ) ? $settings->contentAvatar : false;
$contentBanner	= !empty( $settings->contentBanner ) ? $settings->contentBanner : false;
$contentGallery	= !empty( $settings->contentGallery ) ? $settings->contentGallery : false;

$contentSocial	= !empty( $settings->contentSocial ) ? $settings->contentSocial : false;
$contentLabels	= !empty( $settings->contentLabels ) ? $settings->contentLabels : false;

$contentData		= !empty( $settings->contentData ) && $settings->contentData ? HtmlPurifier::process( $modelContent->content ) : null;
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
