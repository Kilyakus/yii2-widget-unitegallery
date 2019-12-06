<?php
use yii\bootstrap\Html;
$jsonOptions = \yii\helpers\Json::encode($options);
$script = <<< JS
    jQuery("#$galleryId").unitegallery($jsonOptions);
JS;
$this->registerJs($script, \yii\web\View::POS_READY);

$videoFormats = [
	'video',
];
?>

<div id="<?= $galleryId ?>">
    <?php 
    foreach ($items as $item) {
    	if(in_array($this->context->theme, $videoFormats)){
    		echo Html::tag('div',null,$item);
		}else{
			echo Html::img($item['data-thumb'],$item);
		}
    }
    ?>
</div>
