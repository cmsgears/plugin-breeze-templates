<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings	= isset( $data->settings ) ? $data->settings : [];
$config		= isset( $data->config ) ? $data->config : [];

$defaultIncludes = Yii::getAlias( '@breeze' ) . '/templates/cms/element/card/default/includes';

$split		= isset( $config->split ) ? $config->split : false;
$flip		= isset( $config->flip ) ? $config->flip : false;
$splitClass	= isset( $config->splitClass ) ? $config->splitClass : 'box-text-split';
$flipClass	= isset( $config->flipClass ) ? $config->flipClass : 'box-text-flip';

$buffer		= "$defaultIncludes/buffer.php";
$attributes	= "$defaultIncludes/attributes.php";
?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/background.php"; ?>
<div class="box-content-wrap">
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
	<?php include "$defaultIncludes/footer.php"; ?>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
