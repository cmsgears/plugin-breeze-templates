<div class="data-zigzag-part data-zigzag-part-1">
	<div class="data-zigzag-title h3"><?= $model->displayName ?></div>
	<?php if( !empty( $avatarUrl ) ) { ?>
		<img class="data-zigzag-icon" src="<?= $avatarUrl ?>" />
	<?php } ?>
	<div class="data-zigzag-content reader"><?= $model->content ?></div>
</div>
