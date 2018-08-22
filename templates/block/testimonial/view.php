<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes = Yii::getAlias( '@breeze' ) . '/templates/block/default/includes';

$buffer = __DIR__ . '/includes/buffer.php';
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="block-content-wrap">
	<?php include "$defaultIncludes/header.php"; ?>
	<?php include "$defaultIncludes/content.php"; ?>
	<?php include "$defaultIncludes/footer.php"; ?>
</div>
