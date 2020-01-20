<script id="addCustomDataTemplate" type="text/x-handlebars-template">

<div class="cmt-data-custom data-custom row max-cols-100 margin margin-bottom-small">
	<div class="col col12x4">
		<div class="form-group">
			<span class="frm-icon-element">
				<i class="<?= $dataIcon ?>"></i>
				<input class="value" type="text" name="Meta[value]" />
				<span class="error" cmt-error="Meta[value]"></span>
				<input class="key" type="hidden" name="Meta[key]" value="{{key}}" />
			</span>
		</div>
	</div>
	<div class="col col12x2 actions">
		<span class="btn-icon btn-action" cmt-app="core" cmt-controller="customData" cmt-action="add" action="<?= $apixBase ?>/set-custom?slug=<?= $model->slug ?>&type=<?= $model->type ?>&ckey=<?= $customKey ?>">
			<?php include $apixSpinner; ?>
			<i class="icon cmti cmti-save cmt-click"></i>
		</span>
		<span class="btn-icon btn-action btn-remove">
			<i class="icon cmti cmti-bin"></i>
		</span>
	</div>
</div>

</script>

<script id="refreshCustomDataTemplate" type="text/x-handlebars-template">

<div class="col col12x4">
	<div class="form-group">
		<span class="frm-icon-element">
			<i class="<?= $dataIcon ?>"></i>
			<input class="value" type="text" name="Meta[value]" value="{{value}}" />
			<span class="error" cmt-error="Meta[value]"></span>
			<input class="key" type="hidden" name="Meta[key]" value="{{key}}" />
		</span>
	</div>
</div>
<div class="col col12x2 actions">
	<span class="btn-icon btn-action" cmt-app="core" cmt-controller="customData" cmt-action="update" action="<?= $apixBase ?>/set-custom?slug=<?= $model->slug ?>&type=<?= $model->type ?>&ckey=<?= $customKey ?>">
		<?php include $apixSpinner; ?>
		<i class="icon cmti cmti-save cmt-click"></i>
	</span>
	<span class="btn-icon btn-action" cmt-app="core" cmt-controller="customData" cmt-action="delete" action="<?= $apixBase ?>/remove-custom?slug=<?= $model->slug ?>&type=<?= $model->type ?>&ckey=<?= $customKey ?>">
		<?php include $apixSpinner; ?>
		<i class="icon cmti cmti-bin cmt-click"></i>
	</span>
</div>

</script>
