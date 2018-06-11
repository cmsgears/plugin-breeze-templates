<?php
// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

$pageStyles	= isset( $settings ) & !empty( $settings->pageStyles ) ? $settings->pageStyles : null;

$styles = CodeGenUtil::compressStyles( $pageStyles );
?>
<?php if( !empty( $styles ) ) { ?>
<style><?= $styles ?></style>
<?php } ?>
