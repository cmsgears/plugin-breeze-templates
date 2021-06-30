<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$author			= isset( $model->userId ) ? $model->user : $model->creator;
$avatar			= SiteProperties::getInstance()->getDefaultAvatar();
$userAvatarUrl	= CodeGenUtil::getFileUrl( $author->avatar, [ 'image' => $avatar ] );
?>
<div class="page-avatar-wrap circled circled1">
	<img src="<?= $userAvatarUrl ?>" />
</div>
<div class="margin margin-medium-v text text-default-r h5">
	<?= $author->getName() ?>
</div>
