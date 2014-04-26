    <div class="search-header">
      <div class="container">
        <div class="col-xs-4 free-transform">
          <input type="text" class="form-control" placeholder="Search Location" id="boxcari">
          <input type="hidden" id="lat" value="-6.17511" />
          <input type="hidden" id="long" value="106.86503949999997" />
        </div>

        <div class="col-xs-2 free-transform">
          <input type="text" class="form-control hasDatepicker_start" placeholder="Calendar" id="startPicker">
        </div>

        <div class="col-xs-2 free-transform">
          <input type="text" class="form-control hasDatepicker_end" placeholder="Calendar" id="endPicker">
        </div>

        <div class="col-xs-2 free-transform">
          <button type="button" id="more-filter" class="btn btn-default btn-block" data-container="body" data-toggle="popover" data-placement="bottom">
           More Filter
         </button>
       </div>

       <div class="col-xs-1 free-transform">
         <button type="button" class="btn btn-success" id="btnSearch">Search</button>
       </div>


       <div class="btn-group right">
        <button type="button" class="btn btn-default"><i class="fa fa-th-list"></i></button>
        <button type="button" class="btn btn-default active"><i class="fa fa-map-marker"></i></button>
      </div>
    </div>