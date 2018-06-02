<?php
$model	= $widget->model;
$data	= $widget->modelData;

// Admin Settings - Override widget settings to be controllable from admin.
$settings = $data->settings ?? null;

$content		= $settings->content ?? $widget->content;
$contentData	= !empty( $model->content ) ? $model->content : $widget->contentData;
?>
<?php include __DIR__ . '/includes/background.php'; ?>
<div class="box-content-wrap">
	<?php include __DIR__ . '/includes/header.php'; ?>
	<?php if( $content ) { ?>
		<div class="box-content">
			<div class="box-content-data">
				<?= $contentData ?>
			</div>
			<div class="box-content-buffer">
				<?php if( isset( $widget->buffer ) ) { ?>
					<?= $widget->bufferData ?>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	<?php include __DIR__ . '/includes/footer.php'; ?>
</div>
