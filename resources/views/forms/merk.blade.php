<div class="col-md-12">
    <div class="form-group">
        <input type="hidden" name="tipe_store" value="merk">
        <label for="exampleInputEmail1">Merk Raket</label>
        <input type="text" class="form-control" name="merk_name" id="exampleInputEmail1" placeholder="Harga" value="{{ !empty($merk) ? $merk->merk_name : '' }}">
    </div>
    <button type="submit" class="btn btn-outline-primary">{{ $button }}</button>
</div>