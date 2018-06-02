<?php
// Yii Imports
use yii\helpers\Url;
?>

<?php if( count( $model->activeCategories ) > 0 || count( $model->activeTags ) > 0 ) { ?>
	<div class="page-content-labels margin margin-medium-v">
		<div class="h4">Labels</div>
		<hr/>
		<div class="filler-height"></div>
		<ul class="nav">
			<?= $model->getCategoryLinks( Url::toRoute( [ '/blog/category' ], true ) ) ?>
			<?= $model->getTagLinks( Url::toRoute( [ '/blog/tag' ], true ) ) ?>
		</ul>
	</div>
<?php } ?>
