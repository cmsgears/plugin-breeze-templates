<?php
// FXS Imports
use foxslider\widgets\FoxSliderMain;
?>

<?php if( $widget->buffer ) { ?>
	<div class="block-content-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<div class="block-content-buffer">
	<?= FoxSliderMain::widget( [ 'slug' => $model->slug ] ) ?>
</div>

<?php include "$blockIncludes/attributes.php"; ?>
<?php include "$blockIncludes/elements.php"; ?>
