<?php
// Yii Imports
use yii\helpers\Html;
?>

<?php if( strlen( $modelsHtml ) > 0 ) { ?>

	<div <?= Html::renderTagAttributes( $widget->wrapperOptions ) ?>>
		<?php if( !empty( $widget->title ) ) { ?>
			<div class="filler-height filler-height-medium"></div>
			<div class="h4"><?= $widget->title ?></div>
			<div class="filler-height filler-height-medium"></div>
		<?php } ?>
		<?= $modelsHtml ?>
	</div>

	<?php if( $widget->pagination && $widget->paging ) { ?>
		<div class="filler-height filler-height-medium"></div>
		<div class="pagination-basic clearfix">
			<div class="info">
				<?= $widget->pageInfo ?>
			</div>
			<div class="page-links">
				<?= $widget->pageLinks ?>
			</div>
		</div>
	<?php } ?>

	<?php if( $widget->showAllPath ) { ?>
		<div class="filler-height filler-height-medium"></div>
		<div class="wrap-all">
			<a href="<?= $widget-allPath ?>" class="btn btn-medium">VIEW ALL</a>
		</div>
	<?php } ?>

<?php } ?>
