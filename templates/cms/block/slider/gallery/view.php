<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings	= isset( $data->settings ) ? $data->settings : [];
$config		= isset( $data->config ) ? $data->config : [];

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/block/default/includes';
$templateIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/block/slider/gallery/includes';

$buffer = "$templateIncludes/buffer.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="block-content-wrap">
	<?php include "$defaultIncludes/header.php"; ?>
	<?php include "$defaultIncludes/content.php"; ?>
	<?php include "$defaultIncludes/footer.php"; ?>
</div>