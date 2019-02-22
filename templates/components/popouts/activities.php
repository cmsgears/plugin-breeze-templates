<?php
// Yii Imports
use yii\helpers\Url;
?>
<div id="popout-activity" class="popout">
	<div class="popout-content-wrap">
		<div class="popout-content">
			<ul>
				<?php
					if( count( $activities ) > 0 ) {

						foreach( $activities as $activity ) {

							if( isset( $activity->link ) ) {
				?>
							<li cmt-app="notification" cmt-controller="notification" cmt-action="hread" action="notify/activity/read?id=<?= $activity->id ?>" consumed="<?= $activity->consumed ?>" redirect="<?= Url::toRoute( $activity->link ) ?>">
								<span class="cmt-click <?= $activity->consumed ? 'text text-gray' : 'link' ?>" type="activity"><b><?= $activity->title ?></b> - <?= $activity->content ?></span>
							</li>
				<?php
							}
							else {
				?>
							<li cmt-app="notification" cmt-controller="notification" cmt-action="hread" action="notify/activity/read?id=<?= $activity->id ?>" consumed="<?= $activity->consumed ?>">
								<span class="cmt-click <?= $activity->consumed ? 'text text-gray' : 'link' ?>" type="activity"><?= $activity->title ?></b> - <?= $activity->content ?></span>
							</li>
				<?php
							}
						}
				?>
						<li class="align align-center">
							<a href="<?= Url::toRoute( [ '/notify/activity/all' ], true ) ?>">View All</a>
						</li>
				<?php
					}
					else {
				?>
						<li><span>No new activities.</span></li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
</div>
