<div id="add_web_modal" class="modal" tabindex="-1" role="dialog">
<form method="POST" action="{{url('website/add_new')}}">
{{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit website</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="formGroupExampleInput">Monitor Name</label>
    <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Website URL</label>
    <input name="url" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Oranization/Company Name</label>
    <input name="company_name" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Check Frequency</label>
    <!-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"> -->

    <select class="form-control" name="frequency" id="frequency">
      <option value="5">5 minutes</option>
      <option value="15">15 minutes</option>
      <option value="30">30 minutes</option>
      <option value="60">60 minutes</option>
    </select>
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        <button type="submit" class="btn btn-primary">Add website</button>
      </div>
    </div>
  </div>
  </form>
</div>