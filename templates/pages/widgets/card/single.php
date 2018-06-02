<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

// Content
$content		= $model->modelContent;
$banner			= $widget->defaultBanner ? 'banner-blog.jpg' : null;
$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ 'image' => $banner ] );

$modelUrl		= isset( $widget->singlePath ) ? "$widget->singlePath/$model->slug" : Url::toRoute( [ "/$model->slug" ], true );

$title			= !empty( $model->title ) ? $model->title : $model->name;
?>
<?php if( !empty( $bannerUrl ) ) { ?>
	<div class="card-bkg" style="background-image: url(<?= $bannerUrl ?>);"></div>
	<?php if( !empty( $widget->texture ) ) { ?>
		<div class="<?= $widget->texture ?>"></div>
	<?php } ?>
<?php } else { ?>
	<div class="card-bkg"></div>
<?php } ?>

<div class="card-header valign-center">
	<div class="card-header-title h3 text text-default-r align align-center">
		<a href="<?= $modelUrl ?>"><?= $title ?></a>
	</div>
</div>
