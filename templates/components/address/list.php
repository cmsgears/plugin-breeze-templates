<div class="cmt-address-crud data-crud data-crud-address">
	<div class="data-crud-content">
		<span class="cmt-address-add btn btn-large btn-aqua-border inline-block">Add Location</span>
	</div><hr class="margin margin-small-v" />
	<div class="filler-height"></div>
	<div class="cmt-address-form"></div>
	<div class="cmt-address-collection">
		<?php
			foreach( $locations as $location ) {

				$address = $location->model;
		?>
			<div class="cmt-address card card-basic" data-id="<?= $location->id ?>">
				<div class="card-content-wrap">
					<div class="cmt-address-header card-header">
						<div class="card-header-title row">
							<div class="col col3x2 title"><?= $address->title ?></div>
							<div class="col col3 align align-right">
								<div class="cmt-actions actions actions-list actions-list-settings absolute absolute-top-right">
									<div class="cmt-auto-hide actions-list-title rounded rounded-small clearfix">
										<i class="icon icon-setting cmti cmti-setting"></i>
										<i class="icon icon-caret fa fa-caret-down"></i>
									</div>
									<div class="actions-list-data actions-list-data-settings">
										<div class="padding padding-small relative" cmt-app="core" cmt-controller="address" cmt-action="get" action="<?= $apixBase ?>/get-address?id=<?= $model->id ?>&cid=<?= $location->id ?>">
											<span class="spinner hidden-easy">
												<span class="cmti cmti-spinner-1 spin"></span>
											</span>
											<span class="cmt-click">Update</span>
										</div>
										<div class="padding padding-small relative" cmt-app="core" cmt-controller="address" cmt-action="delete" action="<?= $apixBase ?>/delete-address?id=<?= $model->id ?>&cid=<?= $location->id ?>">
											<span class="spinner hidden-easy">
												<span class="cmti cmti-spinner-1 spin"></span>
											</span>
											<span class="cmt-click">Delete</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cmt-address-data card-data reader">
						<p class="row"><span class="col col12x3 bold">Address Line 1</span><span class="col col12x9"><?= $address->line1 ?></span></p>
						<p class="row"><span class="col col12x3 bold">Address Line 2</span><span class="col col12x9"><?= $address->line2 ?></span></p>
						<p class="row"><span class="col col12x3 bold">Country</span><span class="col col12x9"><?= $address->countryName ?></span></p>
						<p class="row"><span class="col col12x3 bold">Province</span><span class="col col12x9"><?= $address->provinceName ?></span></p>
						<p class="row"><span class="col col12x3 bold">District</span><span class="col col12x9"><?= $address->regionName ?></span></p>
						<p class="row"><span class="col col12x3 bold">City</span><span class="col col12x9"><?= $address->cityName ?></span></p>
						<p class="row"><span class="col col12x3 bold">Postal Code</span><span class="col col12x9"><?= $address->zip ?></span></p>
					</div><hr/>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include "$themeIncludes/handlebars/address/list.php";
