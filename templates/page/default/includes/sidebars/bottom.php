<?php
// CMG Imports
use cmsgears\widgets\elements\sidebars\SidebarWidget;

$bottomSidebarSlugs = isset( $settings ) && !empty( $settings->bottomSidebarSlugs ) ? $settings->bottomSidebarSlugs : null;
?>
<?php if( count( $bottomSidebarSlugs ) > 0 ) { ?>
	<div class="page-sidebar-wrap page-sidebar-wrap-bottom">
		<?php foreach( $bottomSidebarSlugs as $sidebarSlug ) { ?>
			<?= SidebarWidget::widget( [ 'slug' => $sidebarSlug ] ) ?>
		<?php } ?>
	</div>
<?php } ?>
