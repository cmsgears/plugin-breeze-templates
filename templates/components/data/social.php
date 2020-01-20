<?php
// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;
?>
<div class="cmt-data-social-crud social-links-wrap">
	<div class="row">
		<div class="col col12x4">
			<select class="cmt-data-social-options cmt-select"><?= CodeGenUtil::generateSelectOptionsFromArray( $linksMap ) ?></select>
		</div>
		<div class="col col12x2 align align-right">
			<span class="cmt-data-social-add btn-icon btn-action">
				<i class="icon cmti cmti-plus"></i>
			</span>
		</div>
	</div>
	<div class="cmt-data-social-collection social-links">
		<?php foreach( $links as $link ) { ?>
			<div class="cmt-data-social social-link row max-cols-100">
				<div class="col col12x4">
					<span class="frm-icon-element">
						<i class="cmti <?= $link->icon ?>"></i>
						<input type="text" name="SocialLink[link]" value="<?= $link->link ?>" />
						<span class="error" cmt-error="SocialLink[link]"></span>
						<input type="hidden" name="SocialLink[sns]" value="<?= $link->sns ?>" />
						<input type="hidden" name="SocialLink[icon]" value="<?= $link->icon ?>" />
					</span>
				</div>
				<div class="col col12x2 actions">
					<span class="btn-icon btn-action" cmt-app="core" cmt-controller="socialData" cmt-action="update" action="<?= $apixBase ?>/set-social-link?slug=<?= $model->slug ?>&type=<?= $model->type ?>">
						<span class="spinner hidden-easy">
							<span class="cmti cmti-1-5x cmti-spinner-1 spin"></span>
						</span>
						<i class="icon cmti cmti-1-5x cmti-save cmt-click"></i>
					</span>
					<span class="btn-icon btn-action" cmt-app="core" cmt-controller="socialData" cmt-action="delete" action="<?= $apixBase ?>/remove-social-link?slug=<?= $model->slug ?>&type=<?= $model->type ?>">
						<span class="spinner hidden-easy">
							<span class="cmti cmti-1-5x cmti-spinner-1 spin"></span>
						</span>
						<i class="icon cmti cmti-1-5x cmti-bin cmt-click"></i>
					</span>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include "$breezeTemplates/handlebars/data/social.php";
