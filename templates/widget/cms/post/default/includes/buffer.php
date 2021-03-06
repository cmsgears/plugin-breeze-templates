<?php
// Yii Imports
use yii\helpers\Html;
?>
<?php if( $widget->buffer ) { ?>
	<div class="widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<!-- <div class="widget-content-buffer"></div> -->

<div class="widget-content-buffer">
	<?php if( strlen( $modelsHtml ) > 0 ) { ?>
		<div <?= Html::renderTagAttributes( $widget->wrapperOptions ) ?>>
			<?= $modelsHtml ?>
		</div>
		<?php if( $widget->pagination && $widget->paging ) { ?>
			<div class="filler-height filler-height-medium"></div>
			<div class="pagination-basic clearfix">
				<div class="page-info">
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
				<a href="<?= $widget->allPath ?>" class="btn btn-medium">View All</a>
			</div>
		<?php } ?>
	<?php } ?>
</div>

<?php include "$defaultIncludes/attributes.php"; ?>
