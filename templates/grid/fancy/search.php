<?php
$searchColumns = $widget->searchColumns;

// Searching
$search		= Yii::$app->request->getQueryParam( 'search' );
$keywords	= Yii::$app->request->getQueryParam( 'keywords' );
?>
<div class="grid-search-wrap">
	<span class="grid-search">
		<label>Search</label>
		<div class="frm-icon-element icon-right">
			<i class="cmti cmti-search"></i>
			<input class="grid-search-input" type="text" placeholder="Search" value="<?= $keywords ?>" />
		</div>
	</span>
</div>
