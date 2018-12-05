<?php
$widgetObj	= $widget->widgetObj;
$data		= json_decode( $widgetObj->data );

$settings = $data->settings ?? null;

$includes = dirname( __FILE__ ) . '/includes';

$buffer = "$includes/buffer.php";
?>
<?php include "$includes/styles.php"; ?>
<?php include "$includes/background.php"; ?>
<div class="widget-content-wrap">
	<?php include "$includes/header.php"; ?>
	<?php include "$includes/content.php"; ?>
</div>
