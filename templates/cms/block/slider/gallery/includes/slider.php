<?php
// Yii Imports
use yii\web\View;

// CMG Imports
use cmsgears\widgets\popup\Popup;

$circular			= isset( $config->circular ) ? boolval( $config->circular ) : true;
$lControlContent	= !empty( $config->lControlContent ) ? $config->lControlContent : '<i class="fa fa-angle-left valign-center"></i>';
$rControlContent	= !empty( $config->rControlContent ) ? $config->rControlContent : '<i class="fa fa-angle-right valign-center"></i>';
$mediumImage		= isset( $config->mediumImage ) ? boolval( $config->mediumImage ) : true;
$smallerContent		= !empty( $config->smallerContent ) ? $config->smallerContent : null;
$onSlideClick		= !empty( $config->onSlideClick ) ? $config->onSlideClick : null;
$preSlideChange		= !empty( $config->preSlideChange ) ? $config->preSlideChange : null;
$postSlideChange	= !empty( $config->postSlideChange ) ? $config->postSlideChange : null;
$collage			= isset( $config->collage ) ? boolval( $config->collage ) : false;
$collageLimit		= !empty( $config->collageLimit ) ? $config->collageLimit : 5;
$collageClass		= !empty( $config->collageClass ) ? $config->collageClass : 'slider-collage-5';
$collageConfig		= !empty( $config->collageConfig ) ? $config->collageConfig : null;
$lightbox			= isset( $config->lightbox ) ? boolval( $config->lightbox ) : false;
$lightboxId			= !empty( $config->lightboxId ) ? $config->lightboxId : 'pop-lbox-blk-' . $model->slug;
$lightboxPopup		= isset( $config->lightboxPopup ) ? boolval( $config->lightboxPopup ) : false;

$sliderOptions = [
	'circular' => $circular,
	'lControlContent' => $lControlContent,
	'rControlContent' => $rControlContent,
	'smallerContent' => $smallerContent,
	'onSlideClick' => $onSlideClick,
	'preSlideChange' => $preSlideChange,
	'postSlideChange' => $postSlideChange,
	'collage' => $collage,
	'collageLimit' => $collageLimit,
	'collageConfig' => $collageConfig,
	'lightbox' => $lightbox,
	'lightboxId' => $lightboxId
];

// Gallery
$gallery		= $model->gallery;
$galleryItems	= isset( $gallery ) ? $gallery->files : [];

$collageClass	= $collage ? $collageClass: null;
$sliderClass	= 'cmt-slider-' . $model->slug;
?>
<?php if( count( $galleryItems ) > 0 ) { ?>
	<div id="<?= $sliderClass ?>" class="<?= $sliderClass ?> slider slider-basic <?= $collageClass ?>">
		<?php
			foreach( $galleryItems as $galleryItem ) {

				$slideAlt	= isset( $galleryItem->altText ) ? $galleryItem->altText : $galleryItem->title;
				$slideAlt	= empty( $slideAlt ) ? $galleryItem->name : $slideAlt;
				$displayUrl	= $mediumImage ? $galleryItem->getMediumUrl() : $galleryItem->getFileUrl();
		?>
			<div thumb-url="<?= $galleryItem->getThumbUrl() ?>" image-url="<?= $galleryItem->getFileUrl() ?>">
				<div class="wrap-slide-content" style="background-image: url(<?= $displayUrl ?>)" 	role="img" aria-label="<?= $slideAlt ?>"></div>
			</div>
		<?php } ?>
	</div>
<?php } ?>
<?php
// Register JS
$sliderOptions	= json_encode( $sliderOptions );
$sliderJs		= "jQuery( '." . $sliderClass . "' ).cmtSlider( $sliderOptions );";

Yii::$app->controller->view->registerJs( $sliderJs, View::POS_READY );

if( $lightboxPopup ) {

	echo Popup::widget([
		'templateDir' => Yii::getAlias( "$templateIncludes/lightbox" ),
		'template' => 'slider', 'data' => [ 'popupId' => $lightboxId ]
	]);
}
