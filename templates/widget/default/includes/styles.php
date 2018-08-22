<?php
// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

$styles	= isset( $settings ) & !empty( $settings->styles ) ? $settings->styles : null;

$styles = CodeGenUtil::compressStyles( $styles );
?>
<?php if( !empty( $styles ) ) { ?>
<style><?= $styles ?></style>
<?php } ?>
