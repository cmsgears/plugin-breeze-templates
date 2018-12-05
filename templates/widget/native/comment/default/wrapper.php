<?php
$title = $widget->title;
?>
<?php if( isset( $modelsHtml ) && strlen( $modelsHtml ) > 0 ) { ?>
	<?php if( isset( $title ) ) { ?>
		<div class="h4"><?= $title ?></div><hr/>
		<div class="filler-height"></div>
	<?php } ?>
	<?= $modelsHtml; ?>
	<div class="clear filler-height filler-height-medium"></div>
<?php } ?>
