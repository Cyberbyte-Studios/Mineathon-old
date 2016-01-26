<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form id="dashForm" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="name">{{ trans('dashboard.admin.name') }}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('dashboard.admin.name') }}">
          </div>
          
          <div class="form-group">
            <label for="url">{{ trans('dashboard.admin.url') }}</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="{{ trans('dashboard.admin.url') }}">
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-sm-10">
                <label for="logo">{{ trans('dashboard.admin.image') }}: </label>
                <div class="input-group">
                  <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                      Browse...<input id="imgUpload" type="file" name="logo">
                    </span>
                  </span>
                  <input type="text" class="form-control" id="imageName" readonly>
                </div>
              </div>
              <div class="col-sm-2 hidden-sm">
                <img id="image">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('dashboard.admin.close') }}</button>
          <input type="submit" class="btn btn-primary" value="{{ trans('dashboard.admin.save') }}">
        </div>
      </form>
    </div>
  </div>
</div>