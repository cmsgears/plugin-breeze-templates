<?php
$model	= $widget->model;
$data	= $widget->modelData;

$settings = $data->settings ?? null;

// Content ------------------

$content			= $settings->content ?? $widget->content;
$contentTitle		= $settings->contentTitle && !empty( $model->displayName ) ? $model->displayName : $widget->contentTitle;
$contentInfo		= $settings->contentInfo && !empty( $model->description ) ? $model->description : $widget->contentInfo;
$contentSummary		= $settings->contentSummary && !empty( $model->summary ) ? $model->summary : $widget->contentSummary;
$contentData		= $settings->contentData && !empty( $model->content ) ? $model->content : $widget->contentData;

$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;
?>
<div class="block-content-wrap">
	<?php if( $content ) { ?>
		<div class="block-content <?= $contentClass ?>">
			<div class="block-content-data <?= $contentDataClass ?>">
				<?= $contentData ?>
			</div>
			<div class="block-content-buffer">
				<div class="menu-social">
				<?php

					$attributes = $model->activeMetas;

					foreach( $attributes as $attribute ) {
				?>
						<a class="icon-wrap circled circled1 <?= $attribute->name ?>" href="<?= $attribute->value ?>" title="<?= $attribute->label ?>">
							<i class="icon cmti cmti-social-<?= $attribute->name ?>"></i>
						</a>
				<?php
					}
				?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
