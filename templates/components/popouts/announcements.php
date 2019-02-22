<?php
// Yii Imports
use yii\helpers\Url;
?>
<div id="popout-announcement" class="popout">
	<div class="popout-content-wrap">
		<div class="popout-content">
			<ul>
				<?php
					if( count( $announcements ) > 0 ) {

						foreach( $announcements as $announcement ) {

							if( isset( $announcement->link ) ) {
				?>
								<li><a href="<?= $announcement->link ?>"><b><?= $announcement->title ?></b> - <?= $announcement->content ?></a></li>
				<?php
							}
							else {
				?>
								<li><span><b><?= $announcement->title ?></b> - <?= $announcement->content ?></span></li>
				<?php
							}
						}
				?>
						<li class="align align-center">
							<a href="<?= Url::toRoute( [ '/notify/announcement/all' ], true ) ?>">View All</a>
						</li>
				<?php
					}
					else {
				?>
						<li><span>No new announcements.</span></li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
</div>
