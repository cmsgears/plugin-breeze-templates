<?php
// CMG Imports
use cmsgears\widgets\blog\ArticleWidget;

$rightSidebarSlug = isset( $settings ) && !empty( $settings->rightSidebarSlug ) ? $settings->rightSidebarSlug : null;
?>
<div class="page-sidebar page-sidebar-right">
	<div class="widget widget-search search-box" url="article/search">
		<div class="frm-icon-element icon-right">
			<i class="cmti cmti-search"></i>
			<input class="search-terms" type="text" placeholder="Search Articles" />
		</div>
	</div>
	<div class="filler-height"></div>
	<div class="widget widget-post-recent">
		<p class="h5 widget-title">Recent Articles</p>
		<div class="filler-height"></div>
		<?= ArticleWidget::widget([
			'pagination' => false, 'widget' => 'recent', 'limit' => 6,
			'options' => [ 'class' => 'widget-article' ],
			'wrapperOptions' => [ 'class' => 'article-wrap' ],
			'singleOptions' => [ 'class' => 'card card-icon' ],
			'template' => 'sidebar'
		])?>
	</div>
</div>
