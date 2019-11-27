<div class="col-md-12">
    <div class="form-group">
        <input type="hidden" name="tipe_store" value="price">
        <label for="exampleInputEmail1">Harga</label>
        <input type="text" class="form-control" name="price" id="exampleInputEmail1" placeholder="Harga" value="{{ !empty($price) ? $price->price : '' }}">
    </div>
    <button type="submit" class="btn btn-outline-primary">{{ $button }}</button>
</div>