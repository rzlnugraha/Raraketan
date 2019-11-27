<div class="col-md-12">
    <!-- general form elements -->
    <div class="form-group">
        <input type="hidden" name="tipe_store" value="customer">
        <label for="exampleInputEmail1">Nama/Toko Customer</label>
        <input type="text" class="form-control" name="customer_name" id="exampleInputEmail1" placeholder="Nama/Toko Customer" value="{{ !empty($customer) ? $customer->customer_name : '' }}">
    </div>
    <button type="submit" class="btn btn-outline-primary">{{ $button }}</button>
    <!-- /.card-body -->
</div>