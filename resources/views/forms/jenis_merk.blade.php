<div class="col-md-12">
    <div class="form-group">
        <label>Minimal</label>
        <select class="form-control select2" name="merk_id" style="width: 100%;">
            @foreach ($merks as $merek)
                <option value="{{ $merek->id }}">{{ $merek->merk_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="tipe_store" value="tipe_merk">
        <label for="exampleInputEmail1">Nama Tipe Raket</label>
        <input type="text" class="form-control" name="type_name" id="exampleInputEmail1" placeholder="Harga" value="{{ !empty($tipe_merk) ? $tipe_merk->merk_name : '' }}">
    </div>
    <button type="submit" class="btn btn-outline-primary">{{ $button }}</button>
</div>

@section('script')
    <script>
        $('.select2').select2();
    </script>
@endsection