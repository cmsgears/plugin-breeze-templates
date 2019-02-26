<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$slideImage		= $slide->image;
$slideTitle		= $slide->name;
$slideDesc		= $slide->description;
$slideContent	= HtmlPurifier::process( $slide->content );
$slideUrl		= $slide->url;
$slideImageUrl	= '';
$slideImageAlt	= '';
$slideTexture	= isset( $widget->slideTexture ) ? "<div class=\"$widget->slideTexture\"></div>" : null;
$content		= "<div class=\"wrap-slide-content\">";

if( isset( $slideImage ) ) {

	$slideImageUrl	= $slideImage->getFileUrl();
	$slideImageAlt	= $slideImage->altText;

	$content = "<div class=\"wrap-slide-content\" style=\"background-image:url($slideImageUrl)\">";

	if( isset( $fxOptions[ 'resizeBkgImage' ] ) && isset( $fxOptions[ 'bkgImageClass' ] ) ) {

		$imgClass	= $fxOptions[ 'bkgImageClass' ];
		$content	= "<img src=\"$slideImageUrl\" class=\"$imgClass\" alt=\"$slideImageAlt\" />
					   <div class=\"wrap-slide-content\">";
	}
}
?>

<?php if( isset( $slideUrl ) && strlen( $slideUrl ) > 0 ) { ?>
	<div class="slide">
		<a href="<?= $slideUrl ?>">
			<?= $content ?>
				<?= $slideTexture ?>
				<div class="slide-content">
					<div class="fxs-content reader">
						<?= $slideContent ?>
					</div>
				</div>
			</div>
		</a>
	</div>
<?php } else { ?>
	<div class="slide">
		<?= $content ?>
			<?= $slideTexture ?>
			<div class="slide-content">
				<div class="fxs-content reader">
					<?= $slideContent ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>