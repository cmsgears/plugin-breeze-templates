<?php
// FXS Imports
use foxslider\widgets\FoxSliderMain;
?>
<div class="block-content-buffer">
	<?php if( isset( $widget->buffer ) ) { ?>
		<?= $widget->bufferData ?>
	<?php } ?>
</div>
<div class="block-content-buffer">
	<?= FoxSliderMain::widget( [ 'slug' => $model->slug ] ) ?>
</div>
<?php include "$bTemplates/includes/attributes.php"; ?>
<?php include "$bTemplates/includes/elements.php"; ?>
