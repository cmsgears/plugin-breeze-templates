<?php
$model	= $widget->widgetObj;
$data	= json_decode( $model->data );

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/widget/default/includes';
$templateIncludes	= Yii::getAlias( '@breeze' ) . '/templates/widget/cms/post/search/includes';

$buffer = "$templateIncludes/buffer.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="widget-content-wrap">
	<?php include "$defaultIncludes/header.php"; ?>
	<?php include "$defaultIncludes/content.php"; ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
