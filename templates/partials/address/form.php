<?php
$phoneErrors	= $address->getErrors( 'phone' );
$faxErrors		= $address->getErrors( 'fax' );
?>
<div class="data-crud-form row max-cols-100 frm-address">
	<div class="cmt-location cmt-location-ll-picker colf colf12x8">
		<div class="row max-cols-100">
			<div class="colf colf12x5">
				<?= $form->field( $address, 'line1' )->textInput( [ 'placeholder' => 'Address 1', 'class' => 'line1' ] )->label( 'Address 1' ) ?>
			</div>
			<div class="colf colf12x2"></div>
			<div class="colf colf12x5">
				<?= $form->field( $address, 'line2' )->textInput( [ 'placeholder' => 'Address 2', 'class' => 'line2' ] )->label( 'Address 2' ) ?>
			</div>
		</div>
		<div class="row max-cols-100">
			<div class="cmt-location-countries colf colf12x5" cmt-app="core" cmt-controller="province" cmt-action="optionsList" action="location/province-options" cmt-keep cmt-custom>
				<?= $form->field( $address, 'countryId' )->dropDownList( $countriesMap, [ 'class' => 'cmt-location-country cmt-select cmt-change' ] ) ?>
			</div>
			<div class="colf colf12x2"> </div>
			<div class="cmt-location-provinces colf colf12x5" cmt-app="core" cmt-controller="region" cmt-action="optionsList" action="location/region-options" cmt-keep cmt-custom>
				<?= $form->field( $address, 'provinceId' )->dropDownList( $provincesMap, [ 'class' => 'cmt-location-province cmt-select cmt-change' ] ) ?>
			</div>
		</div>
		<div class="row max-cols-100">
			<div class="cmt-location-regions colf colf12x5">
				<?= $form->field( $address, 'regionId' )->dropDownList( $regionsMap, [ 'class' => 'cmt-location-region cmt-select' ] ) ?>
			</div>
			<div class="colf colf12x2"> </div>
			<div class="cmt-location-city-fill colf colf12x5 auto-fill auto-fill-basic">
				<div class="auto-fill-source" cmt-app="core" cmt-controller="city" cmt-action="autoSearch" action="location/city-search" cmt-keep cmt-custom>
					<?= Yii::$app->formDesigner->getAutoFill( $form, $address, 'cityName', [ 'class' => 'cmt-key-up auto-fill-text city', 'placeholder' => 'City', 'autocomplete' => 'off' ], 'cmti cmti-search' ) ?>
				</div>
				<div class="auto-fill-target">
					<?= $form->field( $address, 'cityId' )->hiddenInput( [ 'class' => 'target' ] )->label( false ) ?>
				</div>
			</div>
		</div>
		<div class="row max-cols-100">
			<div class="colf colf12x5">
				<?= $form->field( $address, 'zip' )->textInput( [ 'class' => 'zip', 'placeholder' => 'Postal' ] )->label( 'Postal' ) ?>
			</div>
			<div class="colf colf12x2"> </div>
			<div class="colf colf12x5">
				<div class="form-group">
					<label>Phone</label>
					<input type="text" class="intl-tel-field intl-tel-field-ph" name="phone" placeholder="Phone" autocomplete="off" />
					<input type="hidden" class="intl-tel-number" name="Address[phone]" value="<?= $address->phone ?>" />
					<div class="help-block"><?= count( $phoneErrors ) > 0 ? $phoneErrors[ 0 ] : null ?></div>
				</div>
			</div>
		</div>
		<div class="row max-cols-100">
			<div class="colf colf12x5">
				<div class="form-group">
					<label>Fax</label>
					<input type="text" class="intl-tel-field intl-tel-field-ph" name="fax" placeholder="Fax" autocomplete="off" />
					<input type="hidden" class="intl-tel-number" name="Address[fax]" value="<?= $address->fax ?>" />
					<div class="help-block"><?= count( $faxErrors ) > 0 ? $faxErrors[ 0 ] : null ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="colf colf12"></div>
	<div class="colf colf12x3 clearfix">
		<fieldset class="lat-long-picker" style="width: 100%; height: 315px; margin: 0 auto;">
			<div class="google-map" style="width: 100%; height: 300px;"></div>
			<input class="latitude" type="hidden" name="Address[latitude]" value="<?= empty( $address->latitude ) ? 9.0543071 : $address->latitude ?>" />
			<input class="longitude" type="hidden" name="Address[longitude]" value="<?= empty( $address->longitude ) ? 7.2542701 : $address->longitude ?>" />
			<input class="zoom" type="hidden" name="Address[zoomLevel]" value="<?= empty( $address->zoomLevel ) ? 6 : $address->zoomLevel ?>" />
			<span class="error" cmt-error="longitude"></span>
			<span class="error" cmt-error="latitude"></span>
			<span class="error" cmt-error="zoom"></span>
			<input class="search-box" type="hidden" val="" />
			<input class="search-ll" type="hidden" val="" />
		</fieldset>
		<div class="info">Notes: Click on the map to choose address location.</div>
	</div>
</div>
