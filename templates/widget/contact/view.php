<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = $data->settings ?? null;

$includes = dirname( __DIR__ ) . '/default/includes';

$buffer = "$includes/buffer.php";
?>
<?php include "$includes/styles.php"; ?>
<?php include "$includes/background.php"; ?>
<div class="widget-content-wrap">
	<?php include "$includes/header.php"; ?>
	<?php include "$includes/content.php"; ?>
</div>
