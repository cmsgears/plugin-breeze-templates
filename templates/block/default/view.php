<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$blockIncludes = Yii::getAlias( '@breeze' ) . '/templates/block/default/includes';

$buffer = "$blockIncludes/buffer.php";
?>
<?php include "$blockIncludes/styles.php"; ?>
<?php include "$blockIncludes/background.php"; ?>
<div class="block-content-wrap">
	<?php include "$blockIncludes/header.php"; ?>
	<?php include "$blockIncludes/content.php"; ?>
	<?php include "$blockIncludes/footer.php"; ?>
</div>
