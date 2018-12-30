<?php
$searchUrl		= !empty( $config->searchUrl ) ? $config->searchUrl : null;
$searchParam	= !empty( $config->searchParam ) ? $config->searchParam : 'keywords';

$keywords = Yii::$app->request->get( $searchParam );
?>

<?php if( $widget->buffer ) { ?>
	<div class="widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<!-- <div class="widget-content-buffer"></div> -->

<div class="widget-content-buffer">
	<div class="search-box" ldata-url="<?= $searchUrl ?>" ldata-param="<?= $searchParam ?>">
		<div class="frm-icon-element icon-right text text-large-5">
			<i class="cmti cmti-search"></i>
			<input class="search-terms" type="text" placeholder="<?= $headerTitle ?>" value="<?= $keywords ?>" />
		</div>
	</div>
</div>

<?php include "$defaultIncludes/attributes.php"; ?>
