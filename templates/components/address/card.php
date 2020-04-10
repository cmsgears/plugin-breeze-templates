<?php
// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$intlTelInput = isset( $intlTelInput ) ? $intlTelInput : false;
$intlTelCcode = isset( $intlTelCcode ) ? $intlTelCcode : 'us';

$isRegion	= isset( $isRegion ) ? $isRegion : false;
$isPostal	= isset( $isPostal ) ? $isPostal : false;
$isLocation	= isset( $isLocation ) ? $isLocation : false;
$scenario	= isset( $scenario ) ? $scenario : null; // Set to region, postal, location, regionpostal, regionlocation, regionpostallocation

$frmSpinner		= isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
$apixSpinner	= isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";

$addressesTitle = isset( $addressesTitle ) ? $addressesTitle : 'Addresses';

$excludeAddressTypes = isset( $excludeAddressTypes ) ? $excludeAddressTypes : [];

$searchCity = isset( $searchCity ) ? $searchCity : false;

// Location
$countryMap		= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$countryId		= array_keys( $countryMap )[ 0 ];
$provinceMap	= Yii::$app->factory->get( 'provinceService' )->getMapByCountryId( $countryId );
$provinceId		= array_keys( $provinceMap )[ 0 ];
$regionMap		= Yii::$app->factory->get( 'regionService' )->getMapByProvinceId( $provinceId, [ 'default' => true, 'defaultValue' => Yii::$app->core->regionLabel ] );
?>
<div class="cmt-address-crud data-crud data-crud-address data-crud-address-card">
	<div class="data-crud-title row">
		<span class="inline-block"><?= $addressesTitle ?></span>
		<span class="filler-tab"></span>
		<span class="inline-block actions-wrap text text-medium">
			<span class="cmt-address-add btn-icon btn-action"><i class="icon cmti cmti-plus"></i></span>
		</span>
	</div>
	<div class="cmt-address-form"></div>
	<div class="cmt-address-collection row max-cols-50">
		<?php
			foreach( $modelAddresses as $modelAddress ) {

				$type		= $modelAddress->type;
				$address	= $modelAddress->model;

				if( !in_array( $type, $excludeAddressTypes ) ) {
		?>
			<div class="cmt-address card card-basic card-address col col3 padding padding-small" data-id="<?= $modelAddress->id ?>">
				<div class="card-content-wrap">
					<div class="cmt-address-header card-header">
						<div class="card-header-title row">
							<div class="col col3x2 title"><?= $address->title ?></div>
							<div class="col col3 align align-right">
								<span class="relative" cmt-app="core" cmt-controller="address" cmt-action="get" action="<?= $apixBase ?>/get-address?id=<?= $model->id ?>&cid=<?= $modelAddress->id ?>">
									<?php include $apixSpinner; ?>
									<i class="icon cmti cmti-edit cmt-click"></i>
								</span>
								<span class="relative" cmt-app="core" cmt-controller="address" cmt-action="delete" action="<?= $apixBase ?>/delete-address?id=<?= $model->id ?>&cid=<?= $modelAddress->id ?>">
									<?php include $apixSpinner; ?>
									<i class="icon cmti cmti-bin cmt-click"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="cmt-address-data card-data text text-large-5">
						<?= $address->toString() ?>
					</div>
				</div>
			</div>
		<?php } } ?>
	</div>
</div>
<?php
include "$breezeTemplates/handlebars/address/card.php";
