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
          </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
</div>

@include('admin.stock-opname.modal')