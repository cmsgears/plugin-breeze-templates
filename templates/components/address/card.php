<?php
// Location
$countryMap		= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$countryId		= array_keys( $countryMap )[ 0 ];
$provinceMap	= Yii::$app->factory->get( 'provinceService' )->getMapByCountryId( $countryId );
$provinceId		= array_keys( $provinceMap )[ 0 ];
$regionMap		= Yii::$app->factory->get( 'regionService' )->getMapByProvinceId( $provinceId, [ 'default' => true, 'defaultValue' => Yii::$app->core->regionLabel ] );

$addresses = $user->modelAddresses;
?>
<div class="cmt-address-crud data-crud data-crud-address">
	<div class="data-crud-title row">
		<span class="inline-block">Address</span>
		<span class="filler-tab"></span>
		<span class="inline-block actions-wrap text text-medium">
			<span class="cmt-address-add btn-icon btn-action"><i class="icon cmti cmti-plus"></i></span>
		</span>
	</div>
	<div class="cmt-address-form"></div>
	<div class="cmt-address-collection row max-cols-50">
		<?php
			foreach( $addresses as $modelAddress ) {

				$type		= $modelAddress->type;
				$address	= $modelAddress->model;
		?>
			<div class="cmt-address card card-basic card-address col col3 padding padding-small" data-id="<?= $modelAddress->id ?>">
				<div class="card-content-wrap">
					<div class="cmt-address-header card-header">
						<div class="card-header-title row">
							<div class="col col3x2 title"><?= $address->title ?></div>
							<div class="col col3 align align-right">
								<span class="relative" cmt-app="core" cmt-controller="address" cmt-action="get" action="<?= $apixBase ?>/get-address?id=<?= $model->id ?>&cid=<?= $modelAddress->id ?>">
									<span class="spinner hidden-easy">
										<span class="cmti cmti-spinner-1 spin"></span>
									</span>
									<i class="icon cmti cmti-edit cmt-click"></i>
								</span>
								<span class="relative" cmt-app="core" cmt-controller="address" cmt-action="delete" action="<?= $apixBase ?>/delete-address?id=<?= $model->id ?>&cid=<?= $modelAddress->id ?>">
									<span class="spinner hidden-easy">
										<span class="cmti cmti-spinner-1 spin"></span>
									</span>
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
		<?php } ?>
	</div>
</div>
<?php include "$themeIncludes/handlebars/address/card.php"; ?>
