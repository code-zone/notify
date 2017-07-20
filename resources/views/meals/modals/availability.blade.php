    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Meal Availability</h4>
            </div>
            <form action="{{ route('meals.availability.store', $meal->id) }}" method="post">
                <div class="modal-body">
                    <div class="row">
                       {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-1">
                                <label>Is {{$meal->name}} Available</label>
                                <div>
                                    <input data-on-text="YES" data-off-text="Nope" data-off-color="danger" data-on-color="success" type="checkbox" class="toggle-checkbox" name="available" {{$meal->available ? 'checked' : ''}}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Changes</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
          return $('.toggle-checkbox').bootstrapSwitch({
            size: "small"
          });
        });
    </script>