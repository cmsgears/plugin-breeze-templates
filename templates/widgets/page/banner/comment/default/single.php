<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

use cmsgears\core\common\utilities\DateUtil;

$avatar		= SiteProperties::getInstance()->getDefaultAvatar();
$avatarUrl	= isset( $model->creator ) ? CodeGenUtil::getFileUrl( $model->creator->avatar, [ 'image' => $avatar ] ) : Yii::getAlias( "@images" ) . "/$avatar";

$rating			= $model->rating;
$commentDate	= DateUtil::getDateFromDateTime( $model->createdAt );
?>
<div class="row comment padding padding-small-v">
	<div class="col col12x2">
		<img class="fluid circled circled1 avatar" src="<?= $avatarUrl ?>">
	</div>
	<div class="col col12x10">
		<div class="title margin margin-small-v">
			<span class="bold">By - <?= isset( $model->creator ) ? $model->creator->getName() : $model->name ?></span>
			<span class="inline-block right">
				<i class="cmti cmti-calendar"></i>
				<span class="inline-block margin margin-small-h"><?= $commentDate ?></span>
			</span>
		</div>
		<div class="review padding padding-small-v reader">
			<?= $model->content ?>
		</div>
	</div>
</div> <hr />
