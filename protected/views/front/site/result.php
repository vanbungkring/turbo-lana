<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">

  <div class="container container-full">

    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kiviads</a>
    </div>

    <div class="search-section">
      <input type="text" class="form-control search-box" placeholder="type your location" required>
      <button type="button" class="btn btn-default search-button">Default</button>
    </div>

    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../navbar/">Default</a></li>
        <li><a href="../navbar-static-top/">Static top</a></li>
        <li class="active"><a href="./">Fixed top</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container container-full fill">
  <div id="map-wrapper">
  </div>

  <!-- filter -->

  <div class="row content-wrapper">
    <div class="row filter">

    </div>
  </div>

</div> 
<div class="modal fade" id="billboard-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>