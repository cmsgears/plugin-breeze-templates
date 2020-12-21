<?php
// CMG Imports
use cmsgears\social\connect\widgets\assets\FbSdkAsset;

use cmsgears\widgets\social\share\SocialShare;

FbSdkAsset::register( $this );

$publishedAt = isset( $modelContent->publishedAt ) ? date( 'F d, Y', strtotime( $modelContent->publishedAt ) ) : null;
?>
<div class="page-content-social">
	<div class="page-publish-date inline-block">
		<i class="icon cmti cmti-calendar"></i>
		<?php if( isset( $publishedAt ) ) { ?>
			<span class="margin margin-small-h"><?= $publishedAt ?></span>
		<?php } ?>
	</div>
	<?= SocialShare::widget( [ 'url' => Yii::$app->request->absoluteUrl ] ) ?>
</div>
