<?php
// CMG Imports
use cmsgears\widgets\elements\sidebars\SidebarWidget;

$bottomSidebarSlugs = !empty( $settings->bottomSidebarSlugs ) ? preg_split( '/,/', $settings->bottomSidebarSlugs ) : null;
?>
<?php if( count( $bottomSidebarSlugs ) > 0 ) { ?>
	<div class="page-sidebar-wrap page-sidebar-wrap-bottom">
		<?php foreach( $bottomSidebarSlugs as $sidebarSlug ) { ?>
			<?= SidebarWidget::widget( [ 'slug' => $sidebarSlug ] ) ?>
		<?php } ?>
	</div>
<?php } ?>
