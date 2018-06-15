<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = $data->settings ?? null;

$bTemplates = Yii::getAlias( '@cmsgears/plugin-btemplates/templates/block/default' );

$buffer = __DIR__ . '/includes/buffer.php';
?>
<?php include "$bTemplates/includes/styles.php"; ?>
<?php include "$bTemplates/includes/background.php"; ?>
<div class="block-content-wrap">
	<?php include "$bTemplates/includes/header.php"; ?>
	<?php include "$bTemplates/includes/content.php"; ?>
	<?php include "$bTemplates/includes/footer.php"; ?>
</div>
