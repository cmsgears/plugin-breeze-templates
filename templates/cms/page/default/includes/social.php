<?php
// CMG Imports
use cmsgears\social\connect\widgets\assets\FbSdkAsset;

use cmsgears\widgets\social\share\SocialShare;

FbSdkAsset::register( $this );

$publishedAt = date( 'F d, Y', strtotime( $modelContent->publishedAt ) );
?>
<div class="page-content-social margin margin-medium-v">
	<i class="cmti cmti-calendar"></i>
	<span class="inline-block margin margin-small-h"><?= $publishedAt ?></span>
	<?= SocialShare::widget( [ 'url' => Yii::$app->request->absoluteUrl ] ) ?>
</div>
