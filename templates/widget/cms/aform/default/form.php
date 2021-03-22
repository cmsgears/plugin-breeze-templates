<?php
$model	= $widget->widgetObj;
$data	= json_decode( $model->data );

$settings	= isset( $data->settings ) ? $data->settings : [];
$config		= isset( $data->config ) ? $data->config : [];

$split		= isset( $config->split ) ? $config->split : false;
$splitClass	= isset( $config->splitClass ) ? $config->splitClass : 'box-text-split';

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/widget/default/includes';
$templateIncludes	= Yii::getAlias( '@breeze' ) . '/templates/widget/cms/aform/default/includes';

$buffer = "$templateIncludes/buffer.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="widget-content-wrap">
	<?php if( $split ) { ?>
		<div class="row max-cols-50 <?= $split ? $splitClass : null ?>">
			<div class="colf colf2">
				<?php include "$defaultIncludes/header.php"; ?>
			</div>
			<div class="colf colf2">
				<?php include "$defaultIncludes/content.php"; ?>
			</div>
		</div>
	<?php } else { ?>
		<?php include "$defaultIncludes/header.php"; ?>
		<?php include "$defaultIncludes/content.php"; ?>
	<?php } ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
