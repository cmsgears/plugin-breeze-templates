<?php
// CMG Imports
use cmsgears\widgets\elements\blocks\BlockWidget;

$blocks		= isset( $settings ) ? $settings->blocks : true;
$blockType	= isset( $settings ) ? $settings->blockType : null;
?>

<?php
	if( $blocks ) {
?>
		<div class="page-block-wrap">
		<?php
			$blocks = [];

			if( empty( $blockType ) ) {

				$blocks = $model->activeBlocks;
			}
			else {

				$blocks = Yii::$app->factory->get( 'blockService' )->getActiveByType( $blockType );
			}

			foreach( $blocks as $block ) {
		?>
				<div class="page-block"><?= BlockWidget::widget( [ 'model' => $block ] ) ?></div>
		<?php } ?>
		</div>
<?php
	}
?>
