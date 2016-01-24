<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">{{ trans('dashboard.admin.name') }}</label>
            <input type="text" class="form-control" id="name" placeholder="{{ trans('dashboard.admin.name') }}">
          </div>
          
          <div class="form-group">
            <label for="url">{{ trans('dashboard.admin.url') }}</label>
            <input type="text" class="form-control" id="url" placeholder="{{ trans('dashboard.admin.url') }}">
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-sm-10">
                <label for="logo">{{ trans('dashboard.admin.image') }}: </label>
                <div class="input-group">
                  <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                      Browse...<input type="file" name="logo">
                    </span>
                  </span>
                  <input type="text" class="form-control" id="imageName" readonly>
                </div>
              </div>
              <div class="col-sm-2">
                <img id="logo">
              </div>
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('dashboard.admin.close') }}</button>
        <button type="button" class="btn btn-primary">{{ trans('dashboard.admin.save') }}</button>
      </div>
    </div>
  </div>
</div>

<div id="newModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">{{ trans('dashboard.admin.name') }}</label>
            <input type="text" class="form-control" id="name" placeholder="{{ trans('dashboard.admin.name') }}">
          </div>
          
          <div class="form-group">
            <label for="url">{{ trans('dashboard.admin.url') }}</label>
            <input type="text" class="form-control" id="url" placeholder="{{ trans('dashboard.admin.url') }}">
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-sm-10">
                <label for="logo">{{ trans('dashboard.admin.image') }}: </label>
                <div class="input-group">
                  <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                      Browse...<input type="file" name="logo">
                    </span>
                  </span>
                  <input type="text" class="form-control" id="imageName" readonly>
                </div>
              </div>
              <div class="col-sm-2">
                <img id="logo">
              </div>
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('dashboard.admin.close') }}</button>
        <button type="button" class="btn btn-primary">{{ trans('dashboard.admin.save') }}</button>
      </div>
    </div>
  </div>
</div>