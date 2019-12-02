<table class="table table-hover">
    <thead>
        <tr>
            <th>No Raket</th>
            <th>Merk Raket</th>
            <th>Jenis Raket</th>
            <th>Gambar Kerusakan</th>
            <th>Jumlah Kerusakan</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detail as $item)
        <tr>
            <td>{{ $item->no_raket }}</td>
            <td>{{ $item->merk_name }}</td>
            <td>{{ $item->jenis_raket }}</td>
            <td><img src="{{ asset('images/kerusakan/'.$item->damage_position) }}" width="150px" height="100px" alt=""></td>
            <td>{{ $item->damage_qty }}</td>
            <td>{{ $item->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>