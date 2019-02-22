<?php
// Yii Imports
use yii\helpers\Url;
?>
<div id="popout-reminder" class="popout">
	<div class="popout-content-wrap">
		<div class="popout-content">
			<ul>
				<?php
					if( count( $reminders ) > 0 ) {

						foreach( $reminders as $reminder ) {

							if( isset( $reminder->link ) ) {
				?>
							<li cmt-app="notification" cmt-controller="notification" cmt-action="hread" action="notify/reminder/read?id=<?= $reminder->id ?>" consumed="<?= $reminder->consumed ?>" redirect="<?= Url::toRoute( $reminder->link ) ?>">
								<span class="cmt-click <?= $reminder->consumed ? 'text text-gray' : 'link' ?>" type="reminder"><b><?= $reminder->title ?></b> - <?= $reminder->content ?></span>
							</li>
				<?php
							}
							else {
				?>
							<li cmt-app="notification" cmt-controller="notification" cmt-action="hread" action="notify/reminder/read?id=<?= $reminder->id ?>" consumed="<?= $reminder->consumed ?>">
								<span class="cmt-click <?= $reminder->consumed ? 'text text-gray' : 'link' ?>" type="reminder"><b><?= $reminder->title ?></b> - <?= $reminder->content ?></span>
							</li>
				<?php
							}
						}
				?>
						<li class="align align-center">
							<a href="<?= Url::toRoute( [ '/notify/reminder/all' ], true ) ?>">View All</a>
						</li>
				<?php
					}
					else {
				?>
						<li><span>No new reminders.</span></li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
</div>
