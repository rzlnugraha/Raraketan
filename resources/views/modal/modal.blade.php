<!-- Modal Tabel Customer -->
<div class="modal fade" id="modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Customer</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            @include('forms.tambah_customer', [
                'button' => 'Save'
            ])
        </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Tabel Toko -->
<div class="modal fade" id="modalToko">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Customer</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            @include('forms.toko')
        </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Harga -->
<div class="modal fade" id="modalHarga">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Harga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            @include('forms.price', [
                'button' => 'Save'
            ])
        </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Merk -->
<div class="modal fade" id="modalMerk">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Merk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            @include('forms.merk', [
                'button' => 'Save'
            ])
        </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Tipe Merk -->
<div class="modal fade" id="modalTipe">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Merk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            @include('forms.jenis_merk', [
                'button' => 'Save'
            ])
        </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Kerusakan -->
<div class="modal fade" id="modalKerusakan">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Gambar Kerusakan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('forms.kerusakan', [
                'button' => 'Save'
            ])
        </div>
        </form>
        </div>
    </div>
</div>