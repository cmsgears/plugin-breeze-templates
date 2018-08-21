<?php
// CMG Imports
use cmsgears\widgets\elements\sidebars\SidebarWidget;

$topSidebarSlugs = !empty( $settings->topSidebarSlugs ) ? $settings->topSidebarSlugs : null;
?>
<?php if( count( $topSidebarSlugs ) > 0 ) { ?>
	<div class="page-sidebar-wrap page-sidebar-wrap-top">
		<?php foreach( $topSidebarSlugs as $sidebarSlug ) { ?>
			<?= SidebarWidget::widget( [ 'slug' => $sidebarSlug ] ) ?>
		<?php } ?>
	</div>
<?php } ?>
