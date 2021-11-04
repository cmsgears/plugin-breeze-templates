<?php
// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$intlTelInput = isset( $intlTelInput ) ? $intlTelInput : false;
$intlTelCcode = isset( $intlTelCcode ) ? $intlTelCcode : 'us';

$frmSpinner		= isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
$apixSpinner	= isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";

$addressesTitle = isset( $addressesTitle ) ? $addressesTitle : 'Addresses';

$excludeAddressTypes = isset( $excludeAddressTypes ) ? $excludeAddressTypes : [];

$searchCity = isset( $searchCity ) ? $searchCity : false;

// Location
$countryMap		= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$countryId		= array_keys( $countryMap )[ 0 ];
$provinceMap	= Yii::$app->factory->get( 'provinceService' )->getIdNameMapByCountryId( $countryId );
$provinceId		= array_keys( $provinceMap )[ 0 ];
$regionMap		= Yii::$app->factory->get( 'regionService' )->getIdNameMapByProvinceId( $provinceId, [ 'default' => true, 'defaultValue' => Yii::$app->core->regionLabel ] );
?>
<div class="cmt-address-crud data-crud data-crud-address data-crud-address-list">
	<div class="data-crud-title row">
		<span class="inline-block"><?= $addressesTitle ?></span>
		<span class="filler-tab"></span>
		<span class="inline-block actions-wrap text text-medium">
			<span class="cmt-address-add btn-icon btn-action"><i class="icon cmti cmti-plus"></i></span>
		</span>
	</div>
	<div class="cmt-address-form"></div>
	<div class="cmt-address-collection">
		<?php
			foreach( $modelAddresses as $modelAddress ) {

				$type		= $modelAddress->type;
				$address	= $modelAddress->model;

				if( !in_array( $type, $excludeAddressTypes ) ) {
		?>
			<div class="cmt-address card card-basic" data-id="<?= $modelAddress->id ?>">
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
										<div class="padding padding-small relative" cmt-app="core" cmt-controller="address" cmt-action="get" action="<?= $apixBase ?>/get-address?id=<?= $model->id ?>&cid=<?= $address->id ?>">
											<?php include $apixSpinner; ?>
											<span class="pointer cmt-click">Update</span>
										</div>
										<div class="padding padding-small relative" cmt-app="core" cmt-controller="address" cmt-action="delete" action="<?= $apixBase ?>/delete-address?id=<?= $model->id ?>&cid=<?= $address->id ?>">
											<?php include $apixSpinner; ?>
											<span class="pointer cmt-click">Delete</span>
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
		<?php } } ?>
	</div>
</div>
<?php include "$breezeTemplates/handlebars/address/list.php";
