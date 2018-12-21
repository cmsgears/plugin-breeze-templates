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

$contentData		= !empty( $settings->contentData ) && $settings->contentData ? HtmlPurifier::process( $modelContent->content ) : null;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : null;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';
?>
<?php if( $content ) { ?>
	<div class="page-content <?= $contentClass ?>">
		<div class="page-content-info search-bar row max-cols-50">
			<div class="col col3x2 h3 align align-left margin margin-bottom-small"><?= $contentTitle ?></div>
			<div class="col col3 margin margin-bottom-small">
				<div class="widget widget-search search-box" url="blog/search">
					<div class="frm-icon-element icon-right text text-small">
						<i class="cmti cmti-search"></i>
						<input class="search-terms" type="text" placeholder="Search Posts" />
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
		<?php include $preObjects; ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="page-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<?php include $buffer; ?>
		<?php include $innerObjects; ?>
	</div>
<?php } ?>
