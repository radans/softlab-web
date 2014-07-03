<?php
/* @var $this DefaultController */
/* @var $model BlogPost */

$this->breadcrumbs=array(
	'Blog Posts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BlogPost', 'url'=>array('index')),
	array('label'=>'Create BlogPost', 'url'=>array('create')),
	array('label'=>'Update BlogPost', 'url'=>array('update', 'id'=>$model->blogPostId)),
	array('label'=>'Delete BlogPost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->blogPostId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogPost', 'url'=>array('admin')),
);
?>

<h1>View BlogPost #<?php echo $model->blogPostId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'blogPostId',
		'urlLink',
		'name',
		'shortText',
		'fullTexts',
		'entryDate',
		'isVisible',
		'authorId',
		'tags',
	),
)); ?>
