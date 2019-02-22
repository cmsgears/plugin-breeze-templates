<div class="grid-options-wrap row max-cols-100">
	<?php if( !empty( $bulkHtml ) && strlen( $bulkHtml ) > 5 ) { ?>
		<div class="colf colf15x3"><?= $bulkHtml ?></div>
		<div class="colf colf15"></div>
	<?php } ?>
	<?php if( !empty( $sortHtml ) && strlen( $sortHtml ) > 5 ) { ?>
		<div class="colf colf15x3"><?= $sortHtml ?></div>
		<div class="colf colf15"></div>
	<?php } ?>
	<?php if( !empty( $filtersHtml ) && strlen( $filtersHtml ) > 5 ) { ?>
		<div class="colf colf15x3"><?= $filtersHtml ?></div>
		<div class="colf colf15"></div>
	<?php } ?>
	<div class="colf colf15x3"><?= $searchHtml ?></div>
</div>
