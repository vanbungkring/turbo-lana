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
            <div class="image-billboard-custom">
              <?php foreach($banner->images as $image):?>
              <div class="canvas-hasil" id="canvas<?php echo $image->id; ?>">
              <img class="place-drop" src="<?php echo $image->getImageUrl(); ?>" />
              </div>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

        </div>
        <div class="col-md-4">

        <section class="banner-info-body svw">
          <button id="btnDownload" type="button" class="btn btn-default btn-block whislist btn-lg">Download</button>
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
	var backgroundImages = '.CJSON::encode($banner->images).';
	var currentBakcgroundImages = 0;
	$(".image-billboard-custom").bxSlider({
		onSliderLoad : function(currentIndex){
			currentBakcgroundImages = currentIndex;
			$(".bx-clone").removeAttr("id");
		},
		onSlideAfter : function($slideElement, oldIndex, newIndex){
			currentBakcgroundImages = newIndex;
		}
	});
   var data = {
   		"images" : []
   };
   var idImages = 0;
   var loadDrag = function(){
   		$("#list_item img").draggable({
	  		revert:  "invalid",
	  		helper: "clone",
	  		stop: function(event, ui) {
	  			var id = "#canvas"+backgroundImages[currentBakcgroundImages].id;
	         	var _new = $(ui.helper).clone(true);
	         	_new.removeClass("box ui-draggable ui-draggable-dragging").addClass("img-item-clone").css("left","+=774").css("top","-=45").appendTo(id);
				_new._params = {};
        _new._params.id = _new.attr("img-id");
				data.images.push(_new);
				console.log(_new);         	
	      	}
		});
   }
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
    		 $.fn.yiiListView.update("list_item",{
    		 	complete : function(){
    		 		loadDrag();
    		 	}
    		 });
    	}
    	else{
    		alert("gagal");
    	}
    }
  });

  	loadDrag();
    $(".canvas-hasil").droppable({

    });
    $(document).on("mouseover",".img-item-clone", function() {
	    $(this).resizable().parent(".ui-wrapper").draggable({ 

	    });
	});
	$("#btnDownload").click(function(){
		var params = {
			images : [],
      backGroundId : backgroundImages[currentBakcgroundImages].id,
      idMember : '.$banner->id.',
      idBanner : '.$member->id.',
		};	
		$.each(data.images,function(index,row){
			params.images.push({
				id : row._params.id,
				top : row.parent(".ui-wrapper").css("top").replace(/[^-\d\.]/g, \'\'),
				left : row.parent(".ui-wrapper").css("left").replace(/[^-\d\.]/g, \'\'),
				width : row.parent(".ui-wrapper").css("width").replace(/[^-\d\.]/g, \'\'),
				height : row.parent(".ui-wrapper").css("height").replace(/[^-\d\.]/g, \'\')
			});
		});
    	console.log(params);
      $.post("'.Yii::app()->controller->createUrl('SaveCustomImage').'",params,function(ret){
          if(ret.status == 1){
            window.location = "'.Yii::app()->controller->createUrl('downloadCustomImage').'/"+ret.id;
          }
      },"json");
    });
';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/ajaxupload.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('customBanner',$customBanner,  CClientScript::POS_END);