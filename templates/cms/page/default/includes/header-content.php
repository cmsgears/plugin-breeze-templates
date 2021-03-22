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
	<h1 class="page-header-title"><?= $headerTitle ?></h1>
<?php } ?>
<?php if( !empty( $headerInfo ) ) { ?>
	<h2 class="page-header-info reader"><?= $headerInfo ?></h2>
<?php } ?>
<?php if( !empty( $headerContent ) ) { ?>
	<h3 class="page-header-content reader"><?= $headerContent ?></h3>
<?php } ?>
