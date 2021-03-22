<script id="addSocialDataTemplate" type="text/x-handlebars-template">

<div class="cmt-data-social social-link row max-cols-100">
	<div class="col col12x4">
		<span class="frm-icon-element">
			<i class="cmti {{icon}}"></i>
			<input type="text" name="SocialLink[link]" />
			<span class="error" cmt-error="SocialLink[link]"></span>
			<input type="hidden" name="SocialLink[sns]" value="{{sns}}" />
			<input type="hidden" name="SocialLink[icon]" value="{{icon}}" />
		</span>
	</div>
	<div class="col col12x2 actions">
		<span class="btn-icon btn-action" cmt-app="core" cmt-controller="socialData" cmt-action="add" action="<?= $apixBase ?>/set-social-link?slug=<?= $model->slug ?>&type=<?= $model->type ?>">
			<span class="spinner hidden-easy">
				<span class="cmti cmti-spinner-1 spin"></span>
			</span>
			<i class="icon cmti cmti-save cmt-click"></i>
		</span>
		<span class="btn-icon btn-action btn-remove">
			<i class="icon cmti cmti-bin"></i>
		</span>
	</div>
</div>

</script>

<script id="refreshSocialDataTemplate" type="text/x-handlebars-template">

<div class="col col12x4">
	<span class="frm-icon-element">
		<i class="cmti {{icon}}"></i>
		<input type="text" name="SocialLink[link]" value="{{link}}" />
		<span class="error" cmt-error="SocialLink[link]"></span>
		<input type="hidden" name="SocialLink[sns]" value="{{sns}}" />
		<input type="hidden" name="SocialLink[icon]" value="{{icon}}" />
	</span>
</div>
<div class="col col12x2 actions">
	<span class="btn-icon btn-action" cmt-app="core" cmt-controller="socialData" cmt-action="update" action="<?= $apixBase ?>/set-social-link?slug=<?= $model->slug ?>&type=<?= $model->type ?>">
		<span class="spinner hidden-easy">
			<span class="cmti cmti-spinner-1 spin"></span>
		</span>
		<i class="icon cmti cmti-save cmt-click"></i>
	</span>
	<span class="btn-icon btn-action" cmt-app="core" cmt-controller="socialData" cmt-action="delete" action="<?= $apixBase ?>/remove-social-link?slug=<?= $model->slug ?>&type=<?= $model->type ?>">
		<span class="spinner hidden-easy">
			<span class="cmti cmti-spinner-1 spin"></span>
		</span>
		<i class="icon cmti cmti-bin cmt-click"></i>
	</span>
</div>

</script>
