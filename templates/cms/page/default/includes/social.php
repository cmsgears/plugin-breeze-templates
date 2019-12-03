<?php
// CMG Imports
use cmsgears\social\connect\widgets\assets\FbSdkAsset;

use cmsgears\widgets\social\share\SocialShare;

FbSdkAsset::register( $this );

$publishedAt = isset( $modelContent->publishedAt ) ? date( 'F d, Y', strtotime( $modelContent->publishedAt ) ) : null;
?>
<div class="page-content-social margin margin-medium-v">
	<i class="cmti cmti-calendar"></i>
	<?php if( isset( $publishedAt ) ) { ?>
		<span class="inline-block margin margin-small-h"><?= $publishedAt ?></span>
	<?php } ?>
	<?= SocialShare::widget( [ 'url' => Yii::$app->request->absoluteUrl ] ) ?>
</div>
