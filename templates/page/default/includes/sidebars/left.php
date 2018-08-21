<?php
// CMG Imports
use cmsgears\widgets\elements\sidebars\SidebarWidget;

$leftSidebarSlug = !empty( $settings->leftSidebarSlug ) ? $settings->leftSidebarSlug : null;
?>
<?php if( !empty( $leftSidebarSlug ) ) { ?>
	<div class="page-sidebar-wrap page-sidebar-wrap-left">
		<?= SidebarWidget::widget( [ 'slug' => $leftSidebarSlug ] ) ?>
	</div>
<?php } ?>
