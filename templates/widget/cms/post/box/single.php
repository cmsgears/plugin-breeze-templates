<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

// Config
$siteProperties = SiteProperties::getInstance();

// Settings
$settings = $widget->widgetObj->getDataMeta( 'settings' );

// Author
$author			= $model->creator;
$avatar			= $siteProperties->getDefaultAvatar();
$userAvatarUrl	= CodeGenUtil::getFileUrl( $author->avatar, [ 'image' => $avatar ] );
$authorName		= $author->getName();

// Content
$content		= $model->modelContent;
$banner			= $settings->defaultBanner ? $siteProperties->getPageBanner() : null;
$bannerUrl		= CodeGenUtil::getMediumUrl( $content->banner, [ 'image' => $banner ] );

$modelUrl		= isset( $widget->singlePath ) ? "$widget->singlePath/$model->slug" : Url::toRoute( [ "/$model->slug" ], true );

$title			= !empty( $model->title ) ? $model->title : $model->name;
$publishedAt	= date( 'F d, Y', strtotime( $content->publishedAt ) );
?>
<?php if( !empty( $bannerUrl ) ) { ?>
	<div class="box-bkg" style="background-image: url(<?= $bannerUrl ?>);"></div>
	<?php if( !empty( $widget->texture ) ) { ?>
		<div class="<?= $widget->texture ?>"></div>
	<?php } ?>
<?php } else { ?>
	<div class="box-bkg"></div>
<?php } ?>

<div class="box-content-wrap">
	<div class="box-header-wrap">
		<div class="box-header">
			<div class="box-header-title h3 text text-default-r">
				<a href="<?= $modelUrl ?>"><?= $title ?></a>
			</div>
		</div>
	</div>
	<div class="box-data row">
		<div class="colf colf4 avatar-wrap circled circled1">
			<img src="<?= $userAvatarUrl ?>" />
		</div>
		<div class="colf colf4x3">
			<p class="author h5 text text-default margin margin-small-h"><?= $authorName ?></p>
		</div>
	</div>
	<div class="box-footer">
		<hr/>
		<div class="row">
			<i class="cmti cmti-calendar"></i>
			<span class="inline-block margin margin-small-h"><?= $publishedAt ?></span>
		</div>
	</div>
</div>
