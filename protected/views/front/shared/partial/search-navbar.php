<!-- Fixed navbar -->
<body class="map-body">
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container">

      <div class="navbar-header">
       <a class="navbar-brand" href="#"><b>Kiviads</b></a>
     </div>

     <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="./">Maps</a></li>
        <?php 
          if(!Yii::app()->user->isGuest) {
            echo  '<li><a href="'.Yii::app()->createUrl('site/logout').'">Logout</a></li>';
          }
        ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
