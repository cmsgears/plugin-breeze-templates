<script id="addItemTemplate" type="text/x-handlebars-template">
	<div class="cmt-gallery-item-uploader gallery-uploader row max-cols-50" type="image" directory="gallery">
		<div class="colf colf15x4">
			<label>Image</label>
			<div class="uploader uploader-basic uploader-small">
				<div class="file-dragger">
					<div class="drag-wrap"></div>
				</div>
				<div class="file-chooser show-chooser">
					<span class="btn">Choose</span>
					<input class="input" type="file" />
				</div>
				<div class="file-data"></div>
				<div class="file-preloader">
					<div class="file-preloader-bar"></div>
				</div>
			</div>
		</div>
		<div class="colf colf15"></div>
		<div class="colf colf15x10">
			<form class="form" cmt-app="gallery" cmt-controller="item" cmt-action="add" action="<?= $apixBase ?>/add-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>">
				<?php include $frmSpinner; ?>
				<div class="file-info">
					<input name="File[name]" class="name" type="hidden" />
					<input name="File[extension]" class="extension" type="hidden" />
					<input name="File[directory]" value="gallery" type="hidden" />
					<input name="File[type]" value="image" type="hidden" />
					<input name="File[changed]" class="change" type="hidden" />
				</div>
				<div class="file-fields row">
					<div class="colf colf5x2">
						<div class="row">
							<label>Title</label>
							<input class="title" name="File[title]" placeholder="Title" type="text" />
						</div>
						<div class="row">
							<label>Alternate Text</label>
							<input class="alt" name="File[altText]" placeholder="Alternate Text" type="text" />
						</div>
						<div class="row">
							<label>Link</label>
							<input class="ref" name="File[link]" placeholder="Link" type="text" />
						</div>
					</div>
					<div class="colf colf5">
					</div>
					<div class="colf colf5x2">
						<div class="row">
							<label>Description</label>
							<textarea class="desc" name="File[description]" placeholder="Description"></textarea>
						</div>
					</div>
				</div>
				<div class="data-crud-message">
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</div>
				<div class="data-crud-actions">
					<span class="cmt-gallery-item-close btn btn-close-form btn-medium">Cancel</span>
					<input class="frm-element-medium" type="submit" value="Create" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="updateItemTemplate" type="text/x-handlebars-template">
	<div class="cmt-gallery-item-uploader gallery-uploader row max-cols-50" type="image" directory="gallery">
		<div class="colf colf15x4">
			<label>Image</label>
			<div class="uploader uploader-basic uploader-small">
				<div class="file-dragger">
					<div class="drag-wrap"></div>
				</div>
				<div class="file-chooser show-chooser">
					<span class="btn">Choose</span>
					<input class="input" type="file" />
				</div>
				<div class="file-data"></div>
				<div class="file-preloader">
					<div class="file-preloader-bar"></div>
				</div>
			</div>
		</div>
		<div class="colf colf15"></div>
		<div class="colf colf15x10">
			<form class="form" cmt-app="gallery" cmt-controller="item" cmt-action="update" action="<?= $apixBase ?>/update-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid={{fid}}">
				<?php include $frmSpinner; ?>
				<div class="file-info">
					<input name="File[id]" class="id" type="hidden" value="{{fid}}" />
					<input name="File[name]" class="name" type="hidden" value="{{name}}" />
					<input name="File[extension]" class="extension" type="hidden" value="{{extension}}" />
					<input name="File[directory]" value="gallery" type="hidden" />
					<input name="File[type]" value="image" type="hidden" />
					<input name="File[changed]" class="change" type="hidden" />
				</div>
				<div class="file-fields row">
					<div class="colf colf5x2">
						<div class="row">
							<label>Title</label>
							<input class="title" name="File[title]" placeholder="Title" type="text" value="{{title}}" />
						</div>
						<div class="row">
							<label>Alternate Text</label>
							<input class="alt" name="File[altText]" placeholder="Alternate Text" type="text" value="{{altText}}" />
						</div>
						<div class="row">
							<label>Link</label>
							<input class="ref" name="File[link]" placeholder="Link" type="text" value="{{link}}" />
						</div>
					</div>
					<div class="colf colf5">
					</div>
					<div class="colf colf5x2">
						<div class="row">
							<label>Description</label>
							<textarea class="desc" name="File[description]" placeholder="Description">{{description}}</textarea>
						</div>
					</div>
				</div>
				<div class="data-crud-message">
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</div>
				<div class="data-crud-actions">
					<span class="cmt-gallery-item-close btn btn-close-form btn-medium">Cancel</span>
					<input class="frm-element-medium" type="submit" value="Update" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="itemViewTemplate" type="text/x-handlebars-template">

	<div class="cmt-gallery-item card card-basic card-gallery-item col col6 padding padding-small" data-id="{{id}}">
		<div class="card-content-wrap">
			<div class="cmt-gallery-item-header card-header">
				<div class="card-header-title row">
					<div class="col col3x2 title" title="{{title}}">{{title}}</div>
					<div class="col col3 align align-right">
						<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="get" action="<?= $apixBase ?>/get-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid={{fid}}">
							<?php include $apixSpinner; ?>
							<i class="icon cmti cmti-edit cmt-click"></i>
						</span>
						<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="delete" action="<?= $apixBase ?>/delete-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid={{fid}}">
							<?php include $apixSpinner; ?>
							<i class="icon cmti cmti-bin cmt-click"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="cmt-gallery-item-data card-data">
				<img src="{{thumbUrl}}" />
			</div>
		</div>
	</div>

</script>

<script id="itemRefreshTemplate" type="text/x-handlebars-template">

<div class="cmt-gallery-item-data card-data">
	<img src="{{thumbUrl}}" />
</div>

</script>
