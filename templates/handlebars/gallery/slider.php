<script id="addItemTemplate" type="text/x-handlebars-template">
	<div class="cmt-gallery-item-uploader row max-cols-50" type="image" directory="gallery" uploader="apix/file/file-handler">
		<div class="colf colf15x5">
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
		<div class="colf colf15x9">
			<form class="form" cmt-app="core" cmt-controller="galleryItem" cmt-action="add" action="<?= $apixBase ?>/add-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>">
				<?php include $frmSpinner; ?>
				<div class="file-info">
					<input name="File[name]" class="name" type="hidden" />
					<input name="File[extension]" class="extension" type="hidden" />
					<input name="File[directory]" value="gallery" type="hidden" />
					<input name="File[type]" value="image" type="hidden" />
					<input name="File[changed]" class="change" type="hidden" />
				</div>
				<div class="file-fields row">
					<div class="form-group">
						<label>Title</label>
						<input class="title" name="File[title]" placeholder="Title" type="text" />
						<span  class="error" cmt-error="File[title]"></span>
					</div>
					<div class="form-group">
						<label>Caption</label>
						<input class="desc" name="File[description]" placeholder="Caption" type="text" />
						<span  class="error" cmt-error="File[description]"></span>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="alt" name="File[altText]" placeholder="Description"></textarea>
						<span  class="error" cmt-error="File[altText]"></span>
					</div>
				</div>
				<div class="data-crud-message">
					<span  class="error" cmt-error="File[name]"></span>
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</div>
				<div class="data-crud-actions">
					<span class="cmt-gallery-item-close btn btn-medium">Cancel</span>
					<input class="frm-element-medium" type="submit" value="Create" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="updateItemTemplate" type="text/x-handlebars-template">
	<div class="cmt-gallery-item-uploader row max-cols-50" type="image" directory="gallery" uploader="apix/file/file-handler">
		<div class="colf colf15x5">
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
		<div class="colf colf15x9">
			<form class="form" cmt-app="core" cmt-controller="galleryItem" cmt-action="update" action="<?= $apixBase ?>/update-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid={{fid}}">
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
					<div class="form-group">
						<label>Title</label>
						<input class="title" name="File[title]" placeholder="Title" type="text" value="{{title}}" />
						<span  class="error" cmt-error="File[title]"></span>
					</div>
					<div class="form-group">
						<label>Caption</label>
						<input class="desc" name="File[description]" placeholder="Caption" type="text" value="{{description}}" />
						<span  class="error" cmt-error="File[description]"></span>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="alt" name="File[altText]" placeholder="Description">{{altText}}</textarea>
						<span  class="error" cmt-error="File[altText]"></span>
					</div>
				</div>
				<div class="data-crud-message">
					<span  class="error" cmt-error="File[name]"></span>
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</div>
				<div class="data-crud-actions">
					<span class="cmt-gallery-item-close btn btn-medium">Cancel</span>
					<input class="frm-element-medium" type="submit" value="Update" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="itemViewTemplate" type="text/x-handlebars-template">

<div class="cmt-gallery-item" data-id="{{mid}}">
	<div class="cmt-gallery-item-header slide-header row">
		<div class="col col3x2 title align align-left" title="{{title}}">{{title}}</div>
		<div class="col col3 align align-right">
			<span class="relative" cmt-app="core" cmt-controller="galleryItem" cmt-action="get" action="<?= $apixBase ?>/get-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid={{fid}}">
				<?php include $apixSpinner; ?>
				<i class="icon cmti cmti-edit cmt-click"></i>
			</span>
			<span class="relative" cmt-app="core" cmt-controller="galleryItem" cmt-action="delete" action="<?= $apixBase ?>/delete-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid={{fid}}">
				<?php include $apixSpinner; ?>
				<i class="icon cmti cmti-bin cmt-click"></i>
			</span>
		</div>
	</div>
	<div class="cmt-gallery-item-data slide-data">
		<div class="slide-image bkg-image" style="background-image:url({{thumbUrl}})"></div>
	</div>
</div>

</script>

<script id="itemRefreshTemplate" type="text/x-handlebars-template">

<div class="cmt-gallery-item-data slide-data">
	<div class="slide-image bkg-image" style="background-image:url({{thumbUrl}})"></div>
</div>

</script>
