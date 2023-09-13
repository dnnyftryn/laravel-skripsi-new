
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Barang</h4>
        </div>
        <div class="modal-body">
           <!-- Main content -->
           <form action="{{route('stock-opname.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="kode_barang">Kode Barang</label>
              <div class="input-field">
                  <input type="text" class="form-control" placeholder="Kode Barang" id="kode_barang" name="kode_barang">
              </div>
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                    placeholder="Masukkan nama barang">
            </div>
            <div class="form-group">
                <label for="name">Stok Aplikasi</label>
                <input type="text" name="stok_aplikasi" class="form-control" id="stok_aplikasi"
                    placeholder="Masukkan Stok Aplikasi">
            </div>
            <div class="form-group">
                <label for="name">Stok Fisik</label>
                <input type="text" name="stok_fisik" class="form-control" id="stok_fisik"
                    placeholder="Masukkan Stok Fisik">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->