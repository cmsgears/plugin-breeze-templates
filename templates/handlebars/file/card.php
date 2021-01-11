<script id="addFileTemplate" type="text/x-handlebars-template">
	<div class="cmt-file-uploader row max-cols-50" type="mixed" directory="mixed" uploader="apix/file/file-handler">
		<div class="colf colf15x4">
			<label>File</label>
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
			<form class="form" cmt-app="core" cmt-controller="file" cmt-action="add" action="<?= $apixBase ?>/add-file?id=<?= $model->id ?>">
				<?php include $frmSpinner; ?>
				<div class="file-info">
					<input name="File[name]" class="name" type="hidden" />
					<input name="File[extension]" class="extension" type="hidden" />
					<input name="File[directory]" value="mixed" type="hidden" />
					<input name="File[type]" value="mixed" type="hidden" />
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
					<span class="cmt-file-close btn btn-close-form btn-medium">Cancel</span>
					<input class="frm-element-medium" type="submit" value="Create" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="updateFileTemplate" type="text/x-handlebars-template">
	<div class="cmt-file-uploader row max-cols-50" type="mixed" directory="mixed" uploader="apix/file/file-handler">
		<div class="colf colf15x4">
			<label>File</label>
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
			<form class="form" cmt-app="core" cmt-controller="file" cmt-action="update" action="<?= $apixBase ?>/update-file?id=<?= $model->id ?>&fid={{fid}}">
				<?php include $frmSpinner; ?>
				<div class="file-info">
					<input name="File[id]" class="id" type="hidden" value="{{fid}}" />
					<input name="File[name]" class="name" type="hidden" value="{{name}}" />
					<input name="File[extension]" class="extension" type="hidden" value="{{extension}}" />
					<input name="File[directory]" value="mixed" type="hidden" />
					<input name="File[type]" value="mixed" type="hidden" />
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
					<span class="cmt-file-close btn btn-close-form btn-medium">Cancel</span>
					<input class="frm-element-medium" type="submit" value="Update" />
				</div>
			</form>
		</div>
	</div>
</script>

<script id="viewFileTemplate" type="text/x-handlebars-template">

	<div class="cmt-file card card-basic card-file col col3 padding padding-small" data-id="{{mid}}">
		<div class="card-content-wrap">
			<div class="cmt-file-header card-header">
				<div class="card-header-title row">
					<div class="col col3x2 title" title="{{title}}">{{title}}</div>
					<div class="col col3 align align-right">
						<span class="relative" cmt-app="core" cmt-controller="file" cmt-action="get" action="<?= $apixBase ?>/get-file?id=<?= $model->id ?>&fid={{fid}}">
							<?php include $apixSpinner; ?>
							<i class="icon cmti cmti-edit cmt-click"></i>
						</span>
						<span class="relative" cmt-app="core" cmt-controller="file" cmt-action="delete" action="<?= $apixBase ?>/delete-file?id=<?= $model->id ?>&fid={{fid}}">
							<?php include $apixSpinner; ?>
							<i class="icon cmti cmti-bin cmt-click"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="cmt-file-data card-data">
				<i class="{{icon}}"></i>
			</div>
		</div>
	</div>

</script>

<script id="refreshFileTemplate" type="text/x-handlebars-template">

<div class="cmt-file-data card-data">
	<i class="{{icon}}"></i>
</div>

</script>
