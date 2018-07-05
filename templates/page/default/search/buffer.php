<?php
// CMG Imports
use cmsgears\widgets\blog\PageWidget;
?>
<div class="page-content-buffer">
	<?= PageWidget::widget([
		'pagination' => true, 'limit' => 9,
		'texture' => 'texture texture-brown', 'defaultBanner' => true,
		'options' => [ 'class' => 'card-pages' ],
		'wrapperOptions' => [ 'class' => 'card-page-wrap row max-cols-50' ],
		'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
		'templateDir' => '@breeze/templates/widget/page/default', 'template' => 'card'
	]);
	?>
</div>
