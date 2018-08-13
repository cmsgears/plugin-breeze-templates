<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = $data->settings ?? null;

$buffer = __DIR__ . '/includes/buffer.php';
?>
<?php include __DIR__ . '/includes/styles.php'; ?>
<?php include __DIR__ . '/includes/background.php'; ?>
<div class="widget-content-wrap">
	<?php include __DIR__ . '/includes/header.php'; ?>
	<?php include __DIR__ . '/includes/content.php'; ?>
</div>
