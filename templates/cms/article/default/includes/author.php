<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$avatar			= SiteProperties::getInstance()->getDefaultAvatar();
$userAvatarUrl	= CodeGenUtil::getFileUrl( $model->creator->avatar, [ 'image' => $avatar ] );
?>
<div class="page-avatar-wrap circled circled1">
	<img src="<?= $userAvatarUrl ?>" />
</div>
<div class="margin margin-medium-v text text-default-r h5">
	<?= $model->creator->getName() ?>
</div>
