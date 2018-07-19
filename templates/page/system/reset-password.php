<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

$formModel	= $model;
$formView	= dirname( __FILE__ ) . '/includes/forms/reset-password.php';

$model	= isset( $this->params[ 'model' ] ) ? $this->params[ 'model' ] : ContentUtil::findPage( $this );

$siteProperties = $this->context->getSiteProperties();

$modelContent = $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= $data->settings ?? null;
$pageBanner	= 'banner-page';

$bTemplate	= Yii::getAlias( '@breeze/templates/page/default' );
$buffer		= "$bTemplate/includes/buffer.php";
?>
<?php include "$bTemplate/includes/styles.php"; ?>
<div id="page-<?= $model->slug ?>" class="page page-default page-model-system page-<?= $model->slug ?>" cmt-block="block-half-auto">
	<?php include "$bTemplate/includes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$bTemplate/includes/header.php"; ?>
		<div class="row content-90">
			<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
		</div>
		<?php include "$bTemplate/includes/blocks.php"; ?>
		<?php include "$bTemplate/includes/widgets.php"; ?>
	</div>
</div>
