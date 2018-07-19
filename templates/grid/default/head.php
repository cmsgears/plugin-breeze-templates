<?php
// Yii Imports
use yii\helpers\Url;

$title = $widget->title;
?>
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
		<i class="trigger-report-toggle btn-icon cmti cmti-chart-column <?= isset( $report ) ? 'active' : null ?>" title="Generate Report"></i>
		<?php if( ( $widget->table || $widget->grid ) && $widget->card ) { ?>
			<i class="trigger-layout-switch btn-icon cmti <?= $widget->layout == 'data' ? 'cmti-grid grid-view-data' : 'cmti-list grid-view-card' ?>" title="Switch Layout"></i>
		<?php } ?>
	</div>
</div>
