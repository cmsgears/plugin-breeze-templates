<?php if( $headerIcon && !empty( $headerIconClass ) && $headerIconClass !== 'icon' ) { ?>
	<div class="page-header-icon">
		<i class="<?= $headerIconClass ?>"></i>
	</div>
<?php } ?>
<?php if( $headerIcon && !empty( $headerIconUrl ) ) { ?>
	<div class="page-header-icon">
		<img class="fluid <?= $iconLazyClass ?>" src="<?= $avatarUrl ?>" <?= $iconLazyAttrs ?> />
	</div>
<?php } ?>
<?php if( !empty( $headerTitle ) ) { ?>
	<div class="page-header-title"><?= $headerTitle ?></div>
<?php } ?>
<?php if( !empty( $headerInfo ) ) { ?>
	<div class="page-header-info reader"><?= $headerInfo ?></div>
<?php } ?>
<?php if( !empty( $headerContent ) ) { ?>
	<div class="page-header-content reader"><?= $headerContent ?></div>
<?php } ?>
