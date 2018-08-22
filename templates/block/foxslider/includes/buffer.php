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

<?php include "$defaultIncludes/attributes.php"; ?>
<?php include "$defaultIncludes/elements.php"; ?>
