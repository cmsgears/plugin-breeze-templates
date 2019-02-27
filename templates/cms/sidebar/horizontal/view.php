<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes = Yii::getAlias( '@breeze' ) . '/templates/cms/sidebar/default/includes';

$buffer = "$defaultIncludes/buffer.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="sidebar-content-wrap">
	<?php include "$defaultIncludes/header.php"; ?>
	<?php include "$defaultIncludes/content.php"; ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
