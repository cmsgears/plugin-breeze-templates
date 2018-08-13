<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

$formModel	= $model;
$formView	= dirname( __FILE__ ) . '/includes/forms/register.php';

$model	= isset( $this->params[ 'model' ] ) ? $this->params[ 'model' ] : ContentUtil::findPage( $this );

$siteProperties = $this->context->getSiteProperties();

$modelContent = $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= $data->settings ?? null;
$pageBanner	= 'banner-page.jpg';

$pageIncludes = Yii::getAlias( '@breeze' ) . '/templates/page/default/includes';

$buffer		= "$pageIncludes/buffer.php";
?>
<?php include "$pageIncludes/styles.php"; ?>
<div id="page-<?= $model->slug ?>" class="page page-default page-model-system page-<?= $model->slug ?>" cmt-block="block-half-auto">
	<?php include "$pageIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$pageIncludes/header.php"; ?>
		<div class="row content-90">
			<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
		</div>
		<?php include "$pageIncludes/blocks.php"; ?>
		<?php include "$pageIncludes/widgets.php"; ?>
	</div>
</div>
