<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\widgets\popup\Popup;

use cmsgears\core\common\widgets\Editor;

$metaClass = isset( $metaClass ) ? $metaClass : 'Meta';

Editor::widget();
?>
<div class="cmt-meta-crud data-crud data-crud-attribute" data-id="<?= $model->id ?>" data-type="<?= $model->type ?>" data-layout="popup">
	<div class="data-crud-content">
		<span class="cmt-meta-add btn btn-large btn-green-border inline-block">Add Attribute</span>
	</div><hr class="margin margin-small-v" />
	<div class="filler-height"></div>
	<div class="cmt-meta-collection attribute-cards row max-cols-50">
	<?php foreach( $attributes as $attribute ) { ?>
		<div class="cmt-meta card card-basic card-attribute col col3 padding padding-small" data-id="<?= $attribute->id ?>">
			<div class="card-content-wrap">
				<div class="cmt-meta-header card-header">
					<div class="card-header-title row">
						<div class="col col3x2 title"><?= $attribute->name ?></div>
						<div class="col col3 align align-right">
							<i class="btn-edit icon cmti cmti-edit pointer"></i>
							<i class="btn-delete icon cmti cmti-bin pointer"></i>
						</div>
					</div>
				</div>
				<div class="cmt-meta-data card-data cscroller">
					<?= HtmlPurifier::process( $attribute->value ) ?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</div>

<?= Popup::widget([
	'title' => 'Add Attribute', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/widget/native/popup/attribute" ), 'template' => 'default',
	'data' => [ 'type' => 'add', 'model' => $model, 'metaClass' => $metaClass, 'metaType' => CoreGlobal::META_TYPE_USER, 'apixBase' => $apixBase ]
])?>

<?= Popup::widget([
	'title' => 'Update Attribute', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/widget/native/popup/attribute" ), 'template' => 'default',
	'data' => [ 'type' => 'update', 'model' => $model, 'metaClass' => $metaClass, 'metaType' => CoreGlobal::META_TYPE_USER, 'apixBase' => $apixBase ]
])?>

<?= Popup::widget([
	'title' => 'Delete Attribute', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/widget/native/popup/attribute" ), 'template' => 'default',
	'data' => [ 'type' => 'delete', 'model' => $model, 'metaClass' => $metaClass, 'metaType' => CoreGlobal::META_TYPE_USER, 'apixBase' => $apixBase ]
])?>

<?php
include "$breezeTemplates/handlebars/attribute/card.php";
