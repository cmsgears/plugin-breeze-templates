<?php
// CMG Imports
use cmsgears\widgets\blog\ArticleWidget;
?>
<div class="page-content-buffer">
	<?= ArticleWidget::widget([
		'pagination' => true, 'limit' => 9,
		'texture' => 'texture texture-brown', 'defaultBanner' => true,
		'options' => [ 'class' => 'card-articles' ],
		'wrapperOptions' => [ 'class' => 'card-article-wrap row max-cols-50' ],
		'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
		'templateDir' => '@cmsgears/plugin-btemplates/templates/widget/article/default', 'template' => 'card'
	]);
	?>
</div>
