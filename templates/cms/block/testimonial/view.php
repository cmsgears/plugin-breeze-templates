<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = isset( $data->settings ) ? $data->settings : [];

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/block/default/includes';
$templateIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/block/testimonial/includes';

$buffer			= "$templateIncludes/buffer.php";
$preObjects		= "$defaultIncludes/objects-pre.php";
$postObjects	= "$defaultIncludes/objects-post.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/objects-config.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="block-content-wrap">
	<?php include "$defaultIncludes/header.php"; ?>
	<?php include "$defaultIncludes/content.php"; ?>
	<?php include "$defaultIncludes/footer.php"; ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
