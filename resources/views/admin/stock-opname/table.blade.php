<div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Stock Opname</h3>

      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg"> 
              Tambah Barang
      </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok Aplikasi</th>
            <th>Stok Fisik</th>
            <th>Selisih</th>
            <th>Dibuat Tanggal</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($stock_opname as $item)
                <tr>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->stok_aplikasi }}</td>
                    <td>{{ $item->stok_fisik }}</td>
                    <td>{{ $item->selisih }}</td> 
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
</div>

@include('admin.stock-opname.modal')