<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings	= isset( $data->settings ) ? $data->settings : [];
$config		= isset( $data->config ) ? $data->config : [];

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/widget/default/includes';
$templateIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/widget/search/includes';

$buffer = "$templateIncludes/buffer.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="widget-content-wrap">
	<?php include "$defaultIncludes/header.php"; ?>
	<?php include "$defaultIncludes/content.php"; ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
