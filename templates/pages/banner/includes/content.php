<?php
$content			= $settings->content ?? true;
$contentTitle		= isset( $settings ) && $settings->contentTitle ? ( !empty( $model->title ) ? $model->title : $model->name ) : null;
$contentInfo		= isset( $settings ) && $settings->contentInfo ? $model->description : null;
$contentSummary		= isset( $settings ) && $settings->contentSummary ? $modelContent->summary : null;

$contentAvatar	= $settings->contentAvatar ?? false;
$contentBanner	= $settings->contentBanner ?? false;
$contentGallery	= $settings->contentGallery ?? false;

$contentSocial	= $settings->contentSocial ?? false;
$contentLabels	= $settings->contentLabels ?? false;

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
			<?php include dirname( __FILE__ ) . '/social.php' ?>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="page-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php if( $contentLabels ) { ?>
			<?php include dirname( __FILE__ ) . '/labels.php' ?>
		<?php } ?>
		<div class="page-content-buffer"></div>
		<?php include dirname( __FILE__ ) . '/attributes.php' ?>
		<?php include dirname( __FILE__ ) . '/elements.php' ?>
	</div>
<?php } ?>
