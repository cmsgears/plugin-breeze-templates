<?php
$content			= $settings->content ?? true;
$contentTitle		= isset( $settings ) && $settings->contentTitle ? ( !empty( $model->title ) ? $model->title : $model->name ) : null;
$contentInfo		= isset( $settings ) && $settings->contentInfo ? $model->description : null;
$contentSummary		= isset( $settings ) && $settings->contentSummary ? $modelContent->summary : null;

$contentAvatar	= $settings->contentAvatar ?? false;
$contentBanner	= $settings->contentBanner ?? false;
$contentGallery	= $settings->contentGallery ?? false;

$contentData		= isset( $settings ) && $settings->contentData ? $modelContent->content : null;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : null;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';
?>
<?php if( $content ) { ?>
	<div class="page-content <?= $contentClass ?>">
		<div class="page-content-info search-bar row max-cols-50">
			<div class="col col3x2 h3 align align-left margin margin-bottom-small"><?= $contentTitle ?></div>
			<div class="col col3 margin margin-bottom-small">
				<div class="widget widget-search search-box" url="page/search">
					<div class="frm-icon-element icon-right text text-small">
						<i class="cmti cmti-search"></i>
						<input class="search-terms" type="text" placeholder="Search Pages" />
					</div>
				</div>
			</div>
		</div>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="page-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="page-content-summary reader"><?= $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="page-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
		<?php include "$bTemplate/includes/attributes.php"; ?>
		<?php include "$bTemplate/includes/elements.php"; ?>
	</div>
<?php } ?>
