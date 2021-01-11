<?php
$locationTypeOptions = isset( $locationTypeOptions ) ? $locationTypeOptions : [];
?>
<script id="addLocationTemplate" type="text/x-handlebars-template">

<form class="cmt-location form relative" cmt-app="core" cmt-controller="location" cmt-action="add" action="<?= $apixBase ?>/add-location?id=<?= $model->id ?>">
	<?php include $frmSpinner; ?>
	<div class="data-crud-form row max-cols-100">
		<div class="row">
			<div class="colf colf15x9">
				<div class="row">
					<input type="hidden" name="Location[countryId]" value="<?= $venue->countryId ?>" />
					<div class="col col2">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="Location[title]" placeholder="Title" />
							<span  class="error" cmt-error="Location[title]"></span>
						</div>
					</div>
					<div class="col col2">
						<div class="form-group">
							<label>Type</label>
							<select name="modelType" class="cmt-location-type cmt-select"><?= $locationTypeOptions ?></select>
						</div>
					</div>
				</div>
			</div>
			<div class="colf colf15"></div>
			<div class="colf colf15x5 clearfix">
				<fieldset class="lat-long-picker" style="width: 100%; height: 315px; margin: 0 auto;">
					<div class="google-map" style="width: 100%; height: 300px;"></div>
					<input class="cmt-location-latitude latitude" type="hidden" name="Location[latitude]" value="28.7041" />
					<input class="cmt-location-longitude longitude" type="hidden" name="Location[longitude]" value="77.1025" />
					<input class="cmt-location-zoom zoom" type="hidden" name="Location[zoomLevel]" value="6" />
					<span class="error" cmt-error="Location[latitude]"></span>
					<span class="error" cmt-error="Location[longitude]"></span>
					<span class="error" cmt-error="Location[zoomLevel]"></span>
					<input class="search-box" type="hidden" val="" />
					<input class="search-ll" type="hidden" val="" />
				</fieldset>
				<div class="info">Notes: Click on the map to choose location.</div>
			</div>
		</div>
	</div>
	<div class="data-crud-message">
		<div class="message success"></div>
		<div class="message warning"></div>
		<div class="message error"></div>
	</div>
	<div class="data-crud-actions row">
		<div class="col col1">
			<span class="cmt-location-close btn btn-medium">Cancel</span>
			<input class="frm-element-medium" type="submit" value="Add" />
		</div>
	</div>
</form>

</script>

<script id="updateLocationTemplate" type="text/x-handlebars-template">

<form class="cmt-location form relative" cmt-app="core" cmt-controller="location" cmt-action="update" action="<?= $apixBase ?>/update-location?id=<?= $model->id ?>&cid={{cid}}">
	<?php include $frmSpinner; ?>
	<div class="data-crud-form row max-cols-100">
		<div class="row">
			<div class="colf colf15x9">
				<div class="row">
					<div class="col col2">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="Location[title]" placeholder="Title" value="{{location.title}}" />
							<span  class="error" cmt-error="Location[title]"></span>
						</div>
					</div>
					<div class="col col2">
						<div class="form-group">
							<label>Type</label>
							<select name="modelType" class="cmt-location-type cmt-select"><?= $locationTypeOptions ?></select>
						</div>
					</div>
				</div>
			</div>
			<div class="colf colf15"></div>
			<div class="colf colf15x5 clearfix">
				<fieldset class="lat-long-picker" style="width: 100%; height: 315px; margin: 0 auto;">
					<div class="google-map" style="width: 100%; height: 300px;"></div>
					<input class="cmt-location-latitude latitude" type="hidden" name="Location[latitude]" value="{{location.latitude}}" />
					<input class="cmt-location-longitude longitude" type="hidden" name="Location[longitude]" value="{{location.longitude}}" />
					<input class="cmt-location-zoom zoom" type="hidden" name="Location[zoomLevel]" value="{{location.zoomLevel}}" />
					<span class="error" cmt-error="Location[latitude]"></span>
					<span class="error" cmt-error="Location[longitude]"></span>
					<span class="error" cmt-error="Location[zoomLevel]"></span>
					<input class="search-box" type="hidden" val="" />
					<input class="search-ll" type="hidden" val="" />
				</fieldset>
				<div class="info">Notes: Click on the map to choose location.</div>
			</div>
		</div>
	</div>
	<div class="data-crud-message">
		<div class="message success"></div>
		<div class="message warning"></div>
		<div class="message error"></div>
	</div>
	<div class="data-crud-actions row">
		<div class="col col1">
			<span class="cmt-location-close btn btn-medium">Cancel</span>
			<input class="frm-element-medium" type="submit" value="Update" />
		</div>
	</div>
</form>

</script>

<script id="viewLocationTemplate" type="text/x-handlebars-template">

<div class="cmt-location card card-basic card-location col col3 padding padding-small" data-id="{{cid}}">
	<div class="card-content-wrap">
		<div class="cmt-location-header card-header">
			<div class="card-header-title row">
				<div class="col col3x2 title">{{title}}</div>
				<div class="col col3 align align-right">
					<span class="relative" cmt-app="core" cmt-controller="location" cmt-action="get" action="<?= $apixBase ?>/get-location?id=<?= $model->id ?>&cid={{cid}}">
						<?php include $apixSpinner; ?>
						<i class="icon cmti cmti-edit cmt-click"></i>
					</span>
					<span class="relative" cmt-app="core" cmt-controller="location" cmt-action="delete" action="<?= $apixBase ?>/delete-location?id=<?= $model->id ?>&cid={{cid}}">
						<?php include $apixSpinner; ?>
						<i class="icon cmti cmti-bin cmt-click"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>

</script>

<script id="refreshLocationTemplate" type="text/x-handlebars-template">

</script>
