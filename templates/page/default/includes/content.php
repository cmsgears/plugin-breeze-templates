<?php
$content			= isset( $settings ) & !empty( $settings->content ) ? $settings->content : false;
$contentTitle		= isset( $settings ) && $settings->contentTitle ? ( !empty( $model->title ) ? $model->title : $model->name ) : null;
$contentInfo		= isset( $settings ) && $settings->contentInfo ? $model->description : null;
$contentSummary		= isset( $settings ) && $settings->contentSummary ? $modelContent->summary : null;

$contentAvatar	= isset( $settings ) & !empty( $settings->contentAvatar ) ? $settings->contentAvatar : false;
$contentBanner	= isset( $settings ) & !empty( $settings->contentBanner ) ? $settings->contentBanner : false;
$contentGallery	= isset( $settings ) & !empty( $settings->contentGallery ) ? $settings->contentGallery : false;

$contentSocial	= isset( $settings ) & !empty( $settings->contentSocial ) ? $settings->contentSocial : false;
$contentLabels	= isset( $settings ) & !empty( $settings->contentLabels ) ? $settings->contentLabels : false;

$contentData		= isset( $settings ) && $settings->contentData ? $modelContent->content : null;
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
			<?php include "$pageIncludes/social.php"; ?>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="page-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php if( $contentLabels ) { ?>
			<?php include "$pageIncludes/labels.php"; ?>
		<?php } ?>
		<?php include $buffer; ?>
		<?php include $innerObjects; ?>
	</div>
<?php } ?>
