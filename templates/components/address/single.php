<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\models\resources\Address;

// Config
$address		= isset( $address ) ? $address : new Address();
$addressType	= isset( $addressType ) ? $addressType : Address::TYPE_PRIMARY;
$locationBase	= isset( $locationBase ) ? $locationBase : 'location';
$searchCity		= isset( $searchCity ) ? $searchCity : false;
$locationPicker	= isset( $locationPicker ) ? $locationPicker : false;
$spinner		= isset( $spinner ) ? $spinner : Yii::getAlias( '@breeze' ) . '/templates/components/spinners/10-white-max.php';
$intlTelInput	= isset( $intlTelInput ) ? $intlTelInput : false;

// Address Maps
$countryMap		= Yii::$app->factory->get( 'countryService' )->getIdNameMap();
$countryId		= isset( $address->country ) ? $address->country->id : array_keys( $countryMap )[ 0 ];
$provinceMap	= Yii::$app->factory->get( 'provinceService' )->getMapByCountryId( $countryId, [ 'default' => true, 'defaultValue' => Yii::$app->core->provinceLabel ] );
$provinceId		= isset( $address->province ) ? $address->province->id : array_keys( $provinceMap )[ 0 ];
$regionMap		= Yii::$app->factory->get( 'regionService' )->getMapByProvinceId( $provinceId, [ 'default' => true, 'defaultValue' => Yii::$app->core->regionLabel ] );
?>
<div class="data-crud">
	<div class="data-crud-title"><?= ucfirst( $addressType ) ?> Address</div>
	<form class="cmt-location form padding padding-small" cmt-app="core" cmt-controller="user" cmt-action="address" action="<?= $apixBase ?>/address?ctype=<?= $addressType ?>" cmt-keep>
		<?php include $spinner; ?>
		<div class="data-crud-form row max-cols-100">
			<div class="row max-cols-50">
				<div class="col col2">
					<div class="form-group">
						<label>Address 1*</label>
						<input type="text" name="Address[line1]" placeholder="Address 1" value="<?= $address->line1 ?>" />
						<span  class="error" cmt-error="Address[line1]"></span>
					</div>
				</div>
				<div class="col col2">
					<div class="form-group">
						<label>Address 2</label>
						<input type="text" name="Address[line2]" placeholder="Address 2" value="<?= $address->line2 ?>" />
						<span  class="error" cmt-error="Address[line2]"></span>
					</div>
				</div>
			</div>
			<div class="row max-cols-50">
				<div class="cmt-location-countries col col2" cmt-app="core" cmt-controller="province" cmt-action="optionsList" action="<?= $locationBase ?>/province-options" cmt-keep cmt-custom>
					<div class="form-group">
						<label>Country *</label>
						<?= Html::dropDownList( 'Address[countryId]', $address->countryId, $countryMap, [ 'class' => 'cmt-location-country cmt-select cmt-change element-60' ] ) ?>
						<span  class="error" cmt-error="Address[countryId]"></span>
					</div>
				</div>
				<div class="cmt-location-provinces col col2" cmt-app="core" cmt-controller="region" cmt-action="optionsList" action="<?= $locationBase ?>/region-options" cmt-keep cmt-custom>
					<div class="form-group">
						<label><?= Yii::$app->core->provinceLabel ?> *</label>
						<?= Html::dropDownList( 'Address[provinceId]', $address->provinceId, $provinceMap, [ 'class' => 'cmt-location-province cmt-select cmt-change element-60' ] ) ?>
						<span  class="error" cmt-error="Address[provinceId]"></span>
						<span class="hidden cmt-click"></span>
					</div>
				</div>
			</div>
			<div class="row max-cols-50">
				<div class="cmt-location-regions col col2">
					<div class="form-group">
						<label><?= Yii::$app->core->regionLabel ?> *</label>
						<?= Html::dropDownList( 'Address[regionId]', $address->regionId, $regionMap, [ 'class' => 'cmt-location-region cmt-select element-60' ] ) ?>
						<span  class="error" cmt-error="Address[regionId]"></span>
					</div>
				</div>
				<?php if( $searchCity ) { ?>
					<!-- City search -->
				<?php } else { ?>
					<div class="col col2">
						<div class="form-group">
							<label>City *</label>
							<input type="text" name="Address[cityName]" placeholder="City" value="<?= $address->cityName ?>" />
							<span  class="error" cmt-error="Address[cityName]"></span>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="row max-cols-50">
				<div class="col col2">
					<div class="form-group">
						<label>Postal Code</label>
						<input type="text" name="Address[zip]" placeholder="Postal Code" value="<?= $address->zip ?>" />
						<span  class="error" cmt-error="Address[zip]"></span>
					</div>
				</div>
				<div class="col col2">
					<div class="form-group">
						<label>Phone</label>
						<?php if( $intlTelInput ) { ?>
							<input type="text" class="intl-tel-field intl-tel-field-ph" name="phone" placeholder="Phone" autocomplete="off" />
							<input type="hidden" class="intl-tel-number" name="Address[phone]" value="<?= $address->phone ?>" />
							<div class="help-block"></div>
						<?php } else { ?>
							<input type="text" name="Address[phone]" placeholder="Phone" value="<?= $address->phone ?>" />
						<?php } ?>
						<span  class="error" cmt-error="Address[phone]"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col2">
					<div class="form-group">
						<label>Fax</label>
						<?php if( $intlTelInput ) { ?>
							<input type="text" class="intl-tel-field intl-tel-field-ph" name="fax" placeholder="Fax" autocomplete="off" />
							<input type="hidden" class="intl-tel-number" name="Address[fax]" value="<?= $address->fax ?>" />
							<div class="help-block"></div>
						<?php } else { ?>
							<input type="text" name="Address[fax]" placeholder="Fax" value="<?= $address->fax ?>" />
						<?php } ?>
						<span  class="error" cmt-error="Address[fax]"></span>
					</div>
				</div>
			</div>
			<?php if( $locationPicker ) { ?>
				<!-- Location picker -->
			<?php } else { ?>
				<div>
					<input class="cmt-location-latitude" type="hidden" name="Address[latitude]" value="<?= isset( $address->latitude ) ? $address->latitude : 0 ?>" />
					<input class="cmt-location-longitude" type="hidden" name="Address[longitude]" value="<?= isset( $address->longitude ) ? $address->longitude : 0 ?>" />
					<input class="cmt-location-zoom" type="hidden" name="Address[zoomLevel]" value="<?= isset( $address->zoomLevel ) ? $address->zoomLevel : 6 ?>" />
				</div>
			<?php } ?>
		</div>
		<div class="row data-crud-message">
			<div class="col col1 message success"></div>
			<div class="col col1 message warning"></div>
			<div class="col col1 message error"></div>
		</div>
		<div class="row data-crud-actions align align-right">
			<div class="col col1">
				<input class="frm-element-medium" type="submit" value="Update" />
			</div>
		</div>
	</form>
</div>
