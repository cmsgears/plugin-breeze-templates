<?php
// Yii Imports
use yii\web\View;

// CMG Imports
use cmsgears\widgets\popup\Popup;

$circular			= true;
$lControlContent	= '<i class="fa fa-angle-left valign-center"></i>';
$rControlContent	= '<i class="fa fa-angle-right valign-center"></i>';
$mediumImage		= true;
$smallerContent		= null;
$onSlideClick		= null;
$preSlideChange		= null;
$postSlideChange	= null;
$collage			= true;
$collageLimit		= 5;
$collageClass		= 'slider-collage-5';
$collageConfig		= null;
$lightbox			= true;
$lightboxId			= 'pop-lbox-page-' . $model->slug;
$lightboxPopup		= true;

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
$galleryItems = $slides;

$collageClass	= $collage && count( $galleryItems ) <= $collageLimit ? $collageClass : null;
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
				<div class="wrap-slide-content bkg-image" style="background-image: url(<?= $displayUrl ?>)" 	role="img" aria-label="<?= $slideAlt ?>"></div>
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
		'templateDir' => Yii::getAlias( "$sliderIncludes/lightbox" ),
		'template' => 'slider', 'data' => [ 'popupId' => $lightboxId ]
	]);
}
