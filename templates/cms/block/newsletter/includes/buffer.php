<?php
use cmsgears\templates\breeze\models\cms\config\block\NewsletterConfig;

use cmsgears\widgets\newsletter\FollowMeWidget;

$newsletterConfig = new NewsletterConfig( $config );

$newsletterWidgetConfig = $newsletterConfig->generateConfig();
?>
<?= FollowMeWidget::widget( $newsletterWidgetConfig ) ?>
