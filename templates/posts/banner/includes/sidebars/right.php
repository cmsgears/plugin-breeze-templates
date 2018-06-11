<?php
// CMG Imports
use cmsgears\widgets\blog\PostWidget;
?>
<div class="page-sidebar page-sidebar-right">
	<div class="widget widget-search">
		<div class="frm-icon-element icon-right">
			<i class="cmti cmti-search"></i>
			<input id="search-post" type="text" placeholder="Search Posts" />
		</div>
	</div>
	<div class="filler-height"></div>
	<div class="widget widget-post-recent">
		<p class="h5 widget-title">Recent Posts</p>
		<div class="filler-height"></div>
		<?= PostWidget::widget([
			'pagination' => false, 'widget' => 'recent', 'limit' => 6,
			'options' => [ 'class' => 'widget-post' ],
			'wrapperOptions' => [ 'class' => 'post-wrap' ],
			'singleOptions' => [ 'class' => 'card card-icon' ],
			'template' => 'sidebar'
		]);
		?>
	</div>
</div>
