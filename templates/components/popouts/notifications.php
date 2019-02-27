<?php
// Yii Imports
use yii\helpers\Url;
?>
<div id="popout-notification" class="popout">
	<div class="popout-content-wrap">
		<div class="popout-content">
			<ul>
				<?php
					if( count( $notifications ) > 0 ) {

						foreach( $notifications as $notification ) {

							if( isset( $notification->link ) ) {
				?>
							<li cmt-app="notification" cmt-controller="notification" cmt-action="hread" action="notify/notification/read?id=<?= $notification->id ?>" consumed="<?= $notification->consumed ?>" redirect="<?= Url::toRoute( $notification->link ) ?>">
								<span class="cmt-click <?= $notification->consumed ? 'text text-gray' : 'link' ?>" type="notification"><b><?= $notification->title ?></b> - <?= $notification->content ?></span>
							</li>
				<?php
							}
							else {
				?>
							<li cmt-app="notification" cmt-controller="notification" cmt-action="hread" action="notify/notification/read?id=<?= $notification->id ?>" consumed="<?= $notification->consumed ?>">
								<span class="cmt-click <?= $notification->consumed ? 'text text-gray' : 'link' ?>" type="notification"><b><?= $notification->title ?></b> - <?= $notification->content ?></span>
							</li>
				<?php
							}
						}
				?>
						<li class="align align-center">
							<a href="<?= Url::toRoute( [ '/notify/notification/all' ], true ) ?>">View All</a>
						</li>
				<?php
					}
					else {
				?>
						<li><span>No new notifications.</span></li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
</div>
