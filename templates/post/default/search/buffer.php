<?php
// CMG Imports
use cmsgears\widgets\blog\PostWidget;
?>
<div class="page-content-buffer">
	<?= PostWidget::widget([
		'pagination' => true, 'limit' => 9,
		'texture' => 'texture texture-brown', 'defaultBanner' => true,
		'options' => [ 'class' => 'card-posts' ],
		'wrapperOptions' => [ 'class' => 'card-post-wrap row max-cols-50' ],
		'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
		'templateDir' => '@breeze/templates/widget/post/default', 'template' => 'card'
	]);
	?>
</div>
