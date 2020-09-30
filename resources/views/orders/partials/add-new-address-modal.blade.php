@push('styles')
<style type="text/css">
    .border-danger-alert{
        border: 1px solid red
    }
</style>
@endpush

<!-- Modal -->
<div class="modal fade" id="addressAddModel" tabindex="-1" aria-labelledby="addressAddModelLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addressAddModelLabel">Add New Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add__new_address_form" action="{{ route('customer.addressAdd.post') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Address</label>
            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="address" placeholder="Address" class="form-control" maxlength="200">
            <small class="place-error--msg text-danger"></small>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <label>City</label>
                <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="city" placeholder="City" class="form-control">
                <small class="place-error--msg text-danger"></small>
              </div>
              <div class="col-lg-6 col-md-12">
                <label>State</label>
                <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="state" placeholder="State" class="form-control">
                <small class="place-error--msg text-danger"></small>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <label>Zip Code</label>
                <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="zip_code" placeholder="Zip Code" class="form-control">
                <small class="place-error--msg text-danger"></small>
              </div>
              <div class="col-lg-6 col-md-12">
                <label>Country</label>
                <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="country" placeholder="Country" class="form-control">
                <small class="place-error--msg text-danger"></small>
              </div>
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="form-control btn btn-warning btn-block">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




@push('scripts')
<script type="text/javascript">
    $("#add__new_address_form").on('submit', function(e){
        formClientSideValidation(e, "add__new_address_form", 'no');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush