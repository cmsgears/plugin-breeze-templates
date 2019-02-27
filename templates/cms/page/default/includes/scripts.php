<?php
$scripts = !empty( $settings->scripts ) ? $settings->scripts : null;
?>
<?php if( !empty( $scripts ) ) { ?>
<script>
	<?= $scripts ?>
</script>
<?php } ?>
