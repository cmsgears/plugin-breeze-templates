<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\models\resources\Address;

use cmsgears\core\common\utilities\CodeGenUtil;

$addressTypeOptions = CodeGenUtil::generateSelectOptionsFromArray( Address::$typeMap );
?>

<script id="addAddressTemplate" type="text/x-handlebars-template">

<form class="cmt-location form relative" cmt-app="core" cmt-controller="address" cmt-action="add" action="<?= $apixBase ?>/add-address?id=<?= $model->id ?>">
	<?php include "$themeIncludes/components/spinners/form.php"; ?>
	<div class="data-crud-form row max-cols-100">
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="Address[title]" placeholder="Title" />
					<span  class="error" cmt-error="Address[title]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Type</label>
					<label>Location</label>
					<input type="hidden" name="model-type" value="branch" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Address 1*</label>
					<input type="text" name="Address[line1]" placeholder="Address 1" />
					<span  class="error" cmt-error="Address[line1]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Address 2</label>
					<input type="text" name="Address[line2]" placeholder="Address 2" />
					<span  class="error" cmt-error="Address[line2]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cmt-location-countries col col3">
				<div class="form-group">
					<label>Country *</label>
					<?= Html::dropDownList( 'Address[countryId]', null, $countryMap, [ 'class' => 'cmt-location-country element-60 cmt-select' ] ) ?>
					<span  class="error" cmt-error="Address[countryId]"></span>
				</div>
			</div>
			<div class="cmt-location-provinces col col3" cmt-app="core" cmt-controller="region" cmt-action="optionsList" action="location/region-options" cmt-keep cmt-custom>
				<div class="form-group">
					<label>State *</label>
					<?= Html::dropDownList( 'Address[provinceId]', null, $provinceMap, [ 'class' => 'cmt-location-province element-60 cmt-select cmt-change' ] ) ?>
					<span  class="error" cmt-error="Address[provinceId]"></span>
					<span class="hidden cmt-click"></span>
				</div>
			</div>
			<div class="cmt-location-regions col col3">
				<div class="form-group">
					<label>District *</label>
					<?= Html::dropDownList( 'Address[regionId]', null, $regionMap, [ 'class' => 'cmt-location-region element-60 cmt-select' ] ) ?>
					<span  class="error" cmt-error="Address[regionId]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cmt-location-city-fill col col2 auto-fill auto-fill-basic">
				<div class="form-group">
					<label>City *</label>
					<div class="auto-fill-source" cmt-app="core" cmt-controller="city" cmt-action="autoSearch" action="location/city-search" cmt-keep cmt-custom>
						<div class="relative">
							<div class="auto-fill-search clearfix">
								<div class="frm-icon-element icon-right">
									<span class="icon cmti cmti-search"></span>
									<input target-app="location" class="cmt-key-up auto-fill-text" type="text" name="Address[cityName]" placeholder="Search City" autocomplete="off" />
								</div>
							</div>
							<div class="auto-fill-items-wrap">
								<ul class="auto-fill-items vnav"></ul>
							</div>
						</div>
					</div>
					<div class="auto-fill-target">
						<input class="target" type="hidden" name="Address[cityId]" />
					</div>
					<span  class="error" cmt-error="Address[cityName]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Postal Code</label>
					<input type="text" name="Address[zip]" placeholder="Postal Code" />
					<span  class="error" cmt-error="Address[zip]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="Address[phone]" placeholder="Phone" />
					<span  class="error" cmt-error="Address[phone]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Fax</label>
					<input type="text" name="Address[fax]" placeholder="Fax" />
					<span  class="error" cmt-error="Address[fax]"></span>
				</div>
			</div>
		</div>
		<div>
			<input class="cmt-location-latitude" type="hidden" name="Address[latitude]" value="0" />
			<input class="cmt-location-longitude" type="hidden" name="Address[longitude]" value="0" />
			<input class="cmt-location-zoom" type="hidden" name="Address[zoomLevel]" value="6" />
		</div>
	</div>
	<div class="data-crud-message">
		<div class="message success"></div>
		<div class="message warning"></div>
		<div class="message error"></div>
	</div>
	<div class="data-crud-actions row">
		<div class="col col1">
			<span class="cmt-address-close btn btn-medium">Cancel</span>
			<input class="frm-element-medium" type="submit" value="Add" />
		</div>
	</div>
</form>

</script>

<script id="updateAddressTemplate" type="text/x-handlebars-template">

<form class="cmt-location form relative" cmt-app="core" cmt-controller="address" cmt-action="update" action="<?= $apixBase ?>/update-address?id=<?= $model->id ?>&cid={{cid}}">
	<?php include "$themeIncludes/components/spinners/form.php"; ?>
	<div class="data-crud-form row max-cols-100">
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="Address[title]" placeholder="Title" value="{{address.title}}" />
					<span class="error" cmt-error="Address[title]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Type</label>
					<label>Location</label>
					<input type="hidden" name="model-type" value="branch" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Address 1*</label>
					<input type="text" name="Address[line1]" placeholder="Address 1" value="{{address.line1}}" />
					<span class="error" cmt-error="Address[line1]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Address 2</label>
					<input type="text" name="Address[line2]" placeholder="Address 2" value="{{address.line2}}" />
					<span class="error" cmt-error="Address[line2]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cmt-location-countries col col3">
				<div class="form-group">
					<label>Country *</label>
					<?= Html::dropDownList( 'Address[countryId]', null, $countryMap, [ 'class' => 'cmt-location-country element-60 cmt-select', 'cid' => "{{address.countryId}}" ] ) ?>
					<span class="error" cmt-error="Address[countryId]"></span>
				</div>
			</div>
			<div class="cmt-location-provinces col col3" cmt-app="core" cmt-controller="region" cmt-action="optionsList" action="location/region-options" cmt-keep cmt-custom>
				<div class="form-group">
					<label>State *</label>
					<?= Html::dropDownList( 'Address[provinceId]', null, $provinceMap, [ 'class' => 'cmt-location-province element-60 cmt-select cmt-change', 'pid' => "{{address.provinceId}}" ] ) ?>
					<span class="error" cmt-error="Address[provinceId]"></span>
					<span class="hidden cmt-click"></span>
				</div>
			</div>
			<div class="cmt-location-regions col col3">
				<div class="form-group">
					<label>District *</label>
					<?= Html::dropDownList( 'Address[regionId]', null, $regionMap, [ 'class' => 'cmt-location-region element-60 cmt-select', 'rid' => "{{address.regionId}}" ] ) ?>
					<span class="error" cmt-error="Address[regionId]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cmt-location-city-fill col col2 auto-fill auto-fill-basic">
				<div class="form-group">
					<label>City *</label>
					<div class="auto-fill-source" cmt-app="core" cmt-controller="city" cmt-action="autoSearch" action="location/city-search" cmt-keep cmt-custom>
						<div class="relative">
							<div class="auto-fill-search clearfix">
								<div class="frm-icon-element icon-right">
									<span class="icon cmti cmti-search"></span>
									<input target-app="location" class="cmt-key-up auto-fill-text" type="text" name="Address[cityName]" value="{{address.cityName}}" placeholder="Search City" autocomplete="off" />
								</div>
							</div>
							<div class="auto-fill-items-wrap">
								<ul class="auto-fill-items vnav"></ul>
							</div>
						</div>
					</div>
					<div class="auto-fill-target">
						<input class="target" type="hidden" name="Address[cityId]" value="{{address.cityId}}" />
					</div>
					<span class="error" cmt-error="Address[cityName]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Postal Code</label>
					<input type="text" name="Address[zip]" placeholder="Postal Code" value="{{address.zip}}" />
					<span class="error" cmt-error="Address[zip]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="Address[phone]" placeholder="Phone" value="{{address.phone}}" />
					<span class="error" cmt-error="Address[phone]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Fax</label>
					<input type="text" name="Address[fax]" placeholder="Fax" value="{{address.fax}}" />
					<span class="error" cmt-error="Address[fax]"></span>
				</div>
			</div>
		</div>
		<div>
			<input class="cmt-location-latitude" type="hidden" name="Address[latitude]" value="{{address.longitude}}" />
			<input class="cmt-location-longitude" type="hidden" name="Address[longitude]" value="{{address.latitude}}" />
			<input class="cmt-location-zoom" type="hidden" name="Address[zoomLevel]" value="{{address.zoomLevel}}" />
		</div>
	</div>
	<div class="data-crud-message">
		<div class="message success"></div>
		<div class="message warning"></div>
		<div class="message error"></div>
	</div>
	<div class="data-crud-actions row">
		<div class="col col1">
			<span class="cmt-address-close btn btn-medium">Cancel</span>
			<input class="frm-element-medium" type="submit" value="Update" />
		</div>
	</div>
</form>

</script>

<script id="addressViewTemplate" type="text/x-handlebars-template">

<div class="cmt-address card card-basic" data-id="{{cid}}">
	<div class="card-content-wrap">
		<div class="cmt-address-header card-header">
			<div class="card-header-title row">
				<div class="col col3x2 title">{{title}}</div>
				<div class="col col3 align align-right">
					<div class="cmt-actions actions actions-list actions-list-settings absolute absolute-top-right">
						<div class="cmt-auto-hide actions-list-title rounded rounded-small clearfix">
							<i class="icon icon-setting cmti cmti-setting"></i>
							<i class="icon icon-caret fa fa-caret-down"></i>
						</div>
						<div class="actions-list-data actions-list-data-settings">
							<div class="padding padding-small relative" cmt-app="core" cmt-controller="address" cmt-action="get" action="<?= $apixBase ?>/get-address?id=<?= $model->id ?>&cid={{cid}}">
								<span class="spinner hidden-easy">
									<span class="cmti cmti-spinner-1 spin"></span>
								</span>
								<span class="cmt-click">Update</span>
							</div>
							<div class="padding padding-small relative" cmt-app="core" cmt-controller="address" cmt-action="delete" action="<?= $apixBase ?>/delete-address?id=<?= $model->id ?>&cid={{cid}}">
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
			<p class="row"><span class="col col12x3 bold">Address Line 1</span><span class="col col12x9">{{line1}}</span></p>
			<p class="row"><span class="col col12x3 bold">Address Line 2</span><span class="col col12x9">{{line2}}</span></p>
			<p class="row"><span class="col col12x3 bold">Country</span><span class="col col12x9">{{country}}</span></p>
			<p class="row"><span class="col col12x3 bold">Province</span><span class="col col12x9">{{province}}</span></p>
			<p class="row"><span class="col col12x3 bold">District</span><span class="col col12x9">{{region}}</span></p>
			<p class="row"><span class="col col12x3 bold">City</span><span class="col col12x9">{{city}}</span></p>
			<p class="row"><span class="col col12x3 bold">Postal Code</span><span class="col col12x9">{{zip}}</span></p>
		</div><hr/>
	</div>
</div>

</script>

<script id="addressRefreshTemplate" type="text/x-handlebars-template">

<div class="cmt-address-data card-data reader">
	<p class="row"><span class="col col12x3 bold">Address Line 1</span><span class="col col12x9">{{line1}}</span></p>
	<p class="row"><span class="col col12x3 bold">Address Line 2</span><span class="col col12x9">{{line2}}</span></p>
	<p class="row"><span class="col col12x3 bold">Country</span><span class="col col12x9">{{country}}</span></p>
	<p class="row"><span class="col col12x3 bold">Province</span><span class="col col12x9">{{province}}</span></p>
	<p class="row"><span class="col col12x3 bold">District</span><span class="col col12x9">{{region}}</span></p>
	<p class="row"><span class="col col12x3 bold">City</span><span class="col col12x9">{{city}}</span></p>
	<p class="row"><span class="col col12x3 bold">Postal Code</span><span class="col col12x9">{{zip}}</span></p>
</div>

</script>
