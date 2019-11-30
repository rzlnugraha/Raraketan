<div class="col-md-12">
    <div class="form-group">
        <label>Merk</label>
        <select class="form-control select2" name="merk_id" style="width: 100%;">
            @if (!empty($merks))
            @foreach ($merks as $merek)
            @if (!empty($tipe_merk))
            @if ($merek->id == $tipe_merk->merk_id)
            @php
                $selected = 'selected';
            @endphp
             <option value="{{ $merek->id }}" {{ !empty($selected) ? $selected : ''}}>{{ $merek->merk_name }}</option>
            @endif
            @endif
            <option value="{{ $merek->id }}">{{ $merek->merk_name }}</option>
          @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="tipe_store" value="tipe_merk">
        <label for="exampleInputEmail1">Nama Tipe Raket</label>
        <input type="text" class="form-control" name="type_name" id="exampleInputEmail1" placeholder="Jenis Merk" value="{{ !empty($tipe_merk) ? $tipe_merk->type_name : '' }}">
    </div>
    <button type="submit" class="btn btn-outline-primary">{{ $button }}</button>
</div>

@section('script')
    <script>
        $('.select2').select2();
    </script>
@endsection