<div class="col-md-12">
    <div class="form-group">
        <input type="hidden" name="tipe_store" value="damage">
        <label for="gambar">Gambar Kerusakan</label><br>
        <input type="file" name="damage_image" id="gambar">
    </div>
    @if (!empty($rusak))
        <img src="{{ asset('images/kerusakan').'/'.$rusak->damage_image }}" alt="kerusakan" width="150px" height="150px"><br>
    @endif
    <button type="submit" class="btn btn-outline-primary">{{ $button }}</button>
</div>