<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">

  <div class="container">

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
  <div class="content-wrapper">
    <div class="filter-list">
      <div class="nav-header"> Banner Categories </div>
      <ul>
        <li><label><input type="checkbox" value="1"> Alternative</label></li> 
        <li><label><input type="checkbox" value="2"> Billboard</label></li> 
        <li><label><input type="checkbox" value="3"> Digital Network (DOOH)</label></li> 
        <li><label><input type="checkbox" value="4"> Indoor/Place Based</label></li> 
        <li><label><input type="checkbox" value="5"> Station &amp; Port</label></li> 
        <li><label><input type="checkbox" value="6"> Street Furniture</label></li> 
        <li><label><input type="checkbox" value="7"> Transit &amp; Mobile</label></li> 
        <li><label><input type="checkbox" value="1"> Alternative</label></li> 
        <li><label><input type="checkbox" value="2"> Billboard</label></li> 
        <li><label><input type="checkbox" value="3"> Digital Network (DOOH)</label></li> 
        <li><label><input type="checkbox" value="4"> Indoor/Place Based</label></li> 
        <li><label><input type="checkbox" value="5"> Station &amp; Port</label></li> 
        <li><label><input type="checkbox" value="6"> Street Furniture</label></li> 
        <li><label><input type="checkbox" value="7"> Transit &amp; Mobile</label></li> 

      </ul>

  <div class="nav-header"> Banner Categories </div>
    <ul>
      <li><label><input type="radio" name="type" value="both" checked="checked"> Digital &amp; Traditional</label></li>
      <li><label><input type="radio" name="type" value="digital"> Digital</label></li>
      <li><label><input type="radio" name="type" value="traditional"> Traditional</label></li>
    </ul>
  </div>

</div>
<div id="map-wrapper"></div>
</div> 

<div class="modal fade bs-modal-lg" id="billboard-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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