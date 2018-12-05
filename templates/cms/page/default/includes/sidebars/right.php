<?php
// CMG Imports
use cmsgears\widgets\elements\sidebars\SidebarWidget;

$rightSidebarSlug = !empty( $settings->rightSidebarSlug ) ? $settings->rightSidebarSlug : null;
?>
<?php if( !empty( $rightSidebarSlug ) ) { ?>
	<div class="page-sidebar-wrap page-sidebar-wrap-right">
		<?= SidebarWidget::widget( [ 'slug' => $rightSidebarSlug ] ) ?>
	</div>
<?php } ?>
