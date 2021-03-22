<?php
// Config
$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$frmSpinner		= isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
$apixSpinner	= isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";

$locationsTitle = isset( $locationsTitle ) ? $locationsTitle : 'Locations';

$searchCity = isset( $searchCity ) ? $searchCity : false;

// Location
$countryMap		= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$countryId		= array_keys( $countryMap )[ 0 ];
$provinceMap	= Yii::$app->factory->get( 'provinceService' )->getIdNameMapByCountryId( $countryId );
$provinceId		= array_keys( $provinceMap )[ 0 ];
$regionMap		= Yii::$app->factory->get( 'regionService' )->getIdNameMapByProvinceId( $provinceId, [ 'default' => true, 'defaultValue' => Yii::$app->core->regionLabel ] );
?>
<div class="cmt-location-crud data-crud data-crud-location">
	<div class="data-crud-title row">
		<span class="inline-block"><?= $locationsTitle ?></span>
		<span class="filler-tab"></span>
		<span class="inline-block actions-wrap text text-tiny">
			<span class="cmt-location-add btn-icon btn-action"><i class="icon cmti cmti-plus"></i></span>
		</span>
	</div>
	<div class="cmt-location-form"></div>
	<div class="cmt-location-collection row max-cols-50">
		<?php
			foreach( $locations as $modelLocation ) {

				$type		= $modelLocation->type;
				$location	= $modelLocation->model;
		?>
			<div class="cmt-location card card-basic card-location col col3 padding padding-small" data-id="<?= $modelLocation->id ?>">
				<div class="card-content-wrap">
					<div class="cmt-location-header card-header">
						<div class="card-header-title row">
							<div class="col col3x2 title"><?= $location->title ?></div>
							<div class="col col3 align align-right">
								<span class="relative" cmt-app="core" cmt-controller="location" cmt-action="get" action="<?= $apixBase ?>/get-location?id=<?= $model->id ?>&cid=<?= $modelLocation->id ?>">
									<span class="spinner hidden-easy">
										<span class="cmti cmti-spinner-1 spin"></span>
									</span>
									<i class="icon cmti cmti-edit cmt-click"></i>
								</span>
								<span class="relative" cmt-app="core" cmt-controller="location" cmt-action="delete" action="<?= $apixBase ?>/delete-location?id=<?= $model->id ?>&cid=<?= $modelLocation->id ?>">
									<span class="spinner hidden-easy">
										<span class="cmti cmti-spinner-1 spin"></span>
									</span>
									<i class="icon cmti cmti-bin cmt-click"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include "$breezeTemplates/handlebars/location/card.php"; ?>
