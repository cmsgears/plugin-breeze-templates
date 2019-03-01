<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\popup\Popup;

// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$frmSpinner		= isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
$apixSpinner	= isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";
?>
<div class="data-crud data-crud-calendar data-crud-calendar-events">
	<div class="data-crud-title row">
		<div class="col col2">Calendar Events</div>
		<div class="col col2 text text-tiny align align-right">
			<a href="<?= Url::toRoute( [ '/notify/calendar/add' ], true ) ?>">
				<i class="btn-icon cmti cmti-plus" title="Add"></i>
			</a>
			<a href="<?= Url::toRoute( [ '/notify/calendar/all' ], true ) ?>">
				<i class="btn-icon cmti cmti-list" title="Grid View"></i>
			</a>
		</div>
	</div>
	<hr/>
	<div class="data-crud-content data-event-calendar">
		<div id="user-calendar" class="row"></div>
	</div>
</div>
<?= Popup::widget( [ 'size' => 'medium', 'templateDir' => "$breezeTemplates/popups", 'template' => 'event' ] ) ?>
<?php
include "$breezeTemplates/handlebars/event/card.php";
