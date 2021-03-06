<?php
// Yii Imports
use yii\helpers\Url;

$route = !empty( $settings->route ) ? $settings->route : null;
?>
<?php if( isset( $route ) && count( $model->activeCategories ) > 0 || count( $model->activeTags ) > 0 ) { ?>
	<div class="page-content-labels margin margin-medium-v">
		<div class="h4">Labels</div>
		<hr/>
		<div class="filler-height"></div>
		<ul class="nav nav-label">
			<?php
				$labels = '';

				if( count( $model->activeCategories ) > 0 ) {

					$labels .= $model->getCategoryLinks( Url::toRoute( [ "/$route/category" ], true ) );
			?>
			<?php } ?>
			<?php
				if( count( $model->activeTags ) > 0 ) {

					$labels .= $model->getTagLinks( Url::toRoute( [ "/$route/tag" ], true ) );
			?>
			<?php } ?>
			<?= strip_tags( $labels, '<li><a>' ) ?>
		</ul>
	</div>
<?php } ?>
