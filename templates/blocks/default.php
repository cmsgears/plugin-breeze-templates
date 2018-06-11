<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = $data->settings ?? null;
?>
<?php include __DIR__ . '/includes/background.php'; ?>
<div class="block-content-wrap">
	<?php include __DIR__ . '/includes/header.php'; ?>
	<?php include __DIR__ . '/includes/content.php'; ?>
	<?php include __DIR__ . '/includes/footer.php'; ?>
</div>
