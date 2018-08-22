<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;
?>

<?php if( $widget->buffer ) { ?>
	<div class="block-content-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<div class="block-content-buffer">
	<div class="fx fx-slider fx-slider-regular testimonial-slider">
	<?php
		$testimonials = Yii::$app->factory->get( 'siteService' )->getFeaturedTestimonials( Yii::$app->core->site );

		foreach( $testimonials as $testimonial ) {
	?>
		<div>
			<div class="card card-info card-info-icon card-info-icon-ilarge card-testimonial valign-center">
				<div class="card-content-wrap">
					<div class="card-header align align-center">
						<div class="card-header-icon inline-block circled circled1">
							<?php
								$avatarUrl	= $testimonial->avatarUrl;

								if( empty( $avatarUrl ) ) {

									$avatar		= SiteProperties::getInstance()->getUserAvatar();
									$avatarUrl	= isset( $testimonial->creator ) ? CodeGenUtil::getFileUrl( $testimonial->creator->avatar, [ 'image' => $avatar ] ) : CodeGenUtil::getFileUrl( null, [ 'image' => $avatar ] );
								}
							?>
							<img class="fluid" src="<?= $avatarUrl ?>" />
						</div>
						<div class="card-header-title h4 text text-white text-shadow text-shadow-white">
							<?= $testimonial->name ?>
						</div>
					</div>
					<div class="card-content reader text-shadow text-shadow-white align align-center">
						<?= $testimonial->content ?>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
	?>
	</div>
</div>

<?php include "$defaultIncludes/attributes.php"; ?>
<?php include "$defaultIncludes/elements.php"; ?>
