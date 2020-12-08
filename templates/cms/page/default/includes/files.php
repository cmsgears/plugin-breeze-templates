<?php
// Yii Imports
use yii\helpers\Html;

$fileTypes = !empty( $settings->fileTypes ) ? $settings->fileTypes : null;

$fileWrapClass	= !empty( $settings->fileWrapClass ) ? $settings->fileWrapClass : 'row';
$fileWrapper	= !empty( $settings->fileWrapper ) ? $settings->fileWrapper : null;
$fileClass		= !empty( $settings->fileClass ) ? $settings->fileClass : 'row';
?>
<?php if( $files ) { ?>
	<div class="page-file-wrap <?= $fileWrapClass ?>">
		<?php
			$fileTypes = isset( $fileTypes ) ? preg_split( '/,/', $fileTypes ) : [];

			// Single Type
			if( count( $fileTypes ) == 1 ) {

				$files = $model->getFilesByType( $fileTypes[ 0 ] );
			}
			// Multiple Types
			else if( count( $fileTypes ) > 1 ) {

				$files = $model->getFilesByTypes( $fileTypes );
			}
			// Default - All Types
			else {

				$files = $model->getActiveFiles();
			}

			foreach( $files as $file ) {

				$fileIcon = 'icon cmti cmti-file';

				switch( $file->type ) {

					case 'image': {

						$fileIcon = 'icon cmti cmti-file-image';

						break;
					}
					case 'video': {

						$fileIcon = 'icon cmti cmti-file-video';

						break;
					}
					case 'compressed': {

						$fileIcon = 'icon cmti cmti-file-archive';

						break;
					}
				}

				if( $file->type == 'document' ) {

					switch( $file->extension ) {

						case 'doc':
						case 'docx':
						case 'odt': {

							$fileIcon = 'icon cmti cmti-file-doc';

							break;
						}
						case 'ppt':
						case 'pptx':
						case 'odp': {

							$fileIcon = 'icon cmti cmti-file-ppt';

							break;
						}
						case 'xls':
						case 'ods': {

							$fileIcon = 'icon cmti cmti-file-xls';

							break;
						}
						case 'xlsx': {

							$fileIcon = 'icon cmti cmti-file-xlsx';

							break;
						}
					}
				}
ob_start();
?>
<div class="file file-download file-type-<?= $file->type ?> file-extension-<?= $file->extension ?>" data-type="<?= $file->type ?>">
	<a href="<?= $file->getFileUrl() ?>" download="<?= "{$file->name}.{$file->extension}" ?>">
		<i class="<?= $fileIcon ?>"></i>
	</a>
</div>
<?php
$fileContent = ob_get_contents();

ob_end_clean();

				if( !empty( $fileClass ) ) {

					echo Html::tag( $fileWrapper, $fileContent, [ 'class' => $fileClass ] );
				}
				else {

					echo $fileContent;
				}
			}
		?>
	</div>
<?php } ?>
