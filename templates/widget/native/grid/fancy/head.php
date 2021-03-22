<?php
// Yii Imports
use yii\helpers\Url;

$title			= $widget->title;
$layout			= $widget->layout;
$reportColumns	= $widget->reportColumns;

$import	= $widget->import;
$export	= $widget->export;

$layoutSwitch = ( ( $widget->grid || $widget->table ) && $widget->list ) || ( ( $widget->grid || $widget->table ) && $widget->card ) || ( $widget->list && $widget->card );
?>

<?php if( !empty( $title ) ) { ?>
<div class="grid-head-wrap row">
	<div class="colf colf12x6">
		<b class="grid-title"><?= $title ?></b>
	</div>
	<div class="colf colf12x6 grid-head-options">
		<?php if( $widget->add ) { ?>
			<a href="<?= Url::toRoute( [ $widget->addUrl ], true ) ?>">
				<i class="btn-icon cmti cmti-plus" title="Add"></i>
			</a>
		<?php } else if( $widget->addPopup ) { ?>
			<span class="btn-icon cmti cmti-plus popup-trigger" popup="popup-grid-add"></span>
		<?php } ?>
		<?php if( $import ) { ?>
			<i class="trigger-import-toggle btn-icon fa fa-upload" title="Import XML"></i>
		<?php } ?>
		<?php if( $export ) { ?>
			<i class="trigger-export-toggle btn-icon fa fa-download" title="Export XML"></i>
		<?php } ?>
		<?php if( count( $reportColumns ) > 0 ) { ?>
			<i class="trigger-report-toggle btn-icon cmti cmti-chart-column <?= isset( $report ) ? 'active' : null ?>" title="Generate Report"></i>
		<?php } ?>
		<?php if( $layoutSwitch && $widget->grid ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-grid <?= $layout == 'data' ? 'active' : null ?>" layout="data" title="Grid Layout"></i>
		<?php } ?>
		<?php if( $layoutSwitch && $widget->table ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-table <?= $layout == 'table' ? 'active' : null ?>" layout="table" title="Table Layout"></i>
		<?php } ?>
		<?php if( $layoutSwitch && $widget->list ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-list <?= $layout == 'list' ? 'active' : null ?>" layout="list" title="List Layout"></i>
		<?php } ?>
		<?php if( $layoutSwitch && $widget->card ) { ?>
			<i class="trigger-layout-switch btn-icon cmti cmti-grid-o <?= $layout == 'card' ? 'active' : null ?>" layout="card" title="Card Layout"></i>
		<?php } ?>
	</div>
</div>
<?php } ?>
