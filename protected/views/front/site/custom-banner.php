    <?php $this->renderPartial('/shared/partial/navbar'); ?>

    <div class="container kivi">

      <div class="row">
        <h1>Banner Information</h1>
      </div>

      <div class="row banner-detail">
        <div class="col-md-8 no-padding">
          <?php if(!empty($banner->images)): ?>
          <section id="banner-image-list" class="banner-info-body">
            <header class="banner-info-header">Banner Photo</header>
            <div class="image-billboard">
              <?php foreach($banner->images as $image):?>
              <img class="place-drop" src="<?php echo $image->getImageUrl(); ?>" />
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

        </div>
        <div class="col-md-4">

        <section class="banner-info-body svw">
          <button type="button" class="btn btn-default btn-block whislist btn-lg">Custom This Banner</button>
        </section>

        <section class="banner-info-body">
        
        	<?php   
        		$dataProvider=new CActiveDataProvider('TempImage',array(
        			'criteria'=>array(
        				'condition'=>'sessionID=:p1',
        				'params'=>array(
        					':p1'=>Yii::app()->session->sessionID
        				),
        			)
        		));
				$this->widget('zii.widgets.CListView', array(
					'id'=>'list_item',
				    'dataProvider'=>$dataProvider,
				    'itemView'=>'_custom_item',   // refers to the partial view named '_post'
				    'sortableAttributes'=>array(
				        'title',
				        'create_time'=>'Post Time',
				    ),
				)); 
			?>
          <input type="file" name="image" id="image" />
        </section>
        

      </div>
    </div>
  </div>

<?php

$customBanner = '

  new AjaxUpload("image", {
    action: \''.Yii::app()->controller->createUrl("saveTempImage").'\',
    name: "image",
    dataType: "json",
    onSubmit: function(file, extension) {
    
    },
    onComplete: function(file, response) {
    	console.log(response);	
    	var ret = jQuery.parseJSON( response );
    	if(ret.status == 1){
    		 $.fn.yiiListView.update("list_item")
    		alert("berhasil");
    	}
    	else{
    		alert("gagal");
    	}
    }
  });

  	$("#list_item img").resizable({
    	handles : "se",
    	// stop    : resizestop
	}).parent(".ui-wrapper").draggable({
	    revert  : "invalid"
	});

    $(".place-drop").droppable({

    });
';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/ajaxupload.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('customBanner',$customBanner,  CClientScript::POS_END);