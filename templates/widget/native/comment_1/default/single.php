<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$avatar		= SiteProperties::getInstance()->getUserAvatar();
$avatarUrl	= isset( $model->creator ) ? CodeGenUtil::getFileUrl( $model->creator->avatar, [ 'image' => $avatar ] ) : Yii::getAlias( "@images" ) . "/$avatar";

$date = date( 'F d, Y', strtotime( $model->createdAt ) );
?>
<div class="row review padding padding-small-v">
	<div class="col col12x2">
		<img class="fluid circled circled1 avatar" src="<?= $avatarUrl ?>">
	</div>
	<div class="col col12x10">
		<div class="title margin margin-small-v">
			<span class="bold">By - <?= isset( $model->creator ) ? $model->creator->getName() : $model->name ?></span>
			<span class="inline-block right">
				<i class="cmti cmti-calendar"></i>
				<span class="inline-block margin margin-small-h"><?= $date ?></span>
			</span>
		</div>
		<div class="review padding padding-small-v reader">
			<?= $model->content ?>
		</div>
	</div>
</div> <hr />
