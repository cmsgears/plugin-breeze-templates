<div class="grid-options-wrap row">
	<?php if( !empty( $bulkHtml ) ) { ?>
		<div class="colf colf15x3"><?= $bulkHtml ?></div>
		<div class="colf colf15"></div>
	<?php } ?>
	<?php if( !empty( $sortHtml ) ) { ?>
		<div class="colf colf15x3"><?= $sortHtml ?></div>
		<div class="colf colf15"></div>
	<?php } ?>
	<?php if( !empty( $filtersHtml ) ) { ?>
		<div class="colf colf15x3"><?= $filtersHtml ?></div>
		<div class="colf colf15"></div>
	<?php } ?>
	<div class="colf colf15x3"><?= $searchHtml ?></div>
</div>
