<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

// Form Config
$socialLogin	= isset( $socialLogin ) ? $socialLogin : false;
$frmSplit		= isset( $frmSplit ) ? $frmSplit : true;
$frmClass		= isset( $frmClass ) ? $frmClass : 'page-form rounded rounded-medium';

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/page/default/includes';
$systemIncludes		= Yii::getAlias( '@breeze' ) . '/templates/cms/page/system/includes';

$formModel	= $model;
$formView	= $socialLogin ? "$systemIncludes/forms/register-social.php" : "$systemIncludes/forms/register.php";
$model		= isset( $this->params[ 'model' ] ) ? $this->params[ 'model' ] : ContentUtil::findPage( $this );

$siteProperties = $this->context->getSiteProperties();
$modelContent	= $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= isset( $data->settings ) ? $data->settings : [];
$pageBanner	= $siteProperties->getPageBanner();

$buffer			= "$defaultIncludes/buffer.php";
$preObjects		= "$defaultIncludes/objects-pre.php";
$innerObjects	= "$defaultIncludes/objects-inner.php";
$outerObjects	= "$defaultIncludes/objects-outer.php";
?>
<?php include "$defaultIncludes/options.php"; ?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/objects-config.php"; ?>
<div <?= $options ?>>
	<?php include "$defaultIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$defaultIncludes/header.php"; ?>
		<div class="row content-80">
			<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
		</div>
		<?php include $outerObjects; ?>
	</div>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
