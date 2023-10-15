<form action="{{ route('keranjang_penjualan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Input Barang</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-2">
                <label for="kode_barang">Kode Barang</label>
                <div class="input-field">
                    <input type="text" class="form-control" placeholder="Kode Barang" id="kode_barang" name="kode_barang">
                </div>
            </div>
            <div class="form-group col-3">
                <label for="nama_barang">Nama Barang</label>
                <div class="input-field">
                    <input type="text" class="form-control" placeholder="Nama Barang"  id="nama_barang" name="nama_barang">
                </div>
            </div>
            <div class="form-group col-1">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" placeholder="Qty" id="jumlah" name="jumlah">
            </div>
            <div class="form-group col-2">
                <label for="harga">Harga Jual</label>
                <div class="input-field">
                    <input type="text" class="form-control harga" placeholder="Harga Barang"  id="harga" name="harga">
                </div>
            </div>
            <div class="form-group col-2">
                <label for="harga">Harga Beli</label>
                <div class="input-field">
                    <input type="text" class="form-control harga" placeholder="Harga Barang"  id="harga_beli" name="harga_beli">
                </div>
            </div>
            <div class="form-group col-2" hidden>
                <label for="harga">Harga hide</label>
                <div class="input-field">
                    <input type="text" class="form-control harga_new" placeholder="Harga Barang"  id="harga_new" name="harga_new">
                </div>
            </div>
            <div class="form-group col-2" hidden>
                <label for="harga">Harga hide</label>
                <div class="input-field">
                    <input type="text" class="form-control harga_beli_new" placeholder="Harga Barang"  id="harga_beli_new" name="harga_beli_new">
                </div>
            </div>
            <div class="form-group col-1">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" placeholder="Satuan Barang" id="satuan" name="satuan">
            </div>
            <div class="form-group col-1">
                <label for="discountBarang">
                    <input type="checkbox" class="check" id="discountcheck">
                    Disc
                </label>
                <input type="text" class="form-control" placeholder="Disc" id="discount" name="discount" disabled>
            </div>
            <div class="form-group col-2">
                <label for="total">Total</label>
                <input type="text" class="form-control" placeholder="Total Barang"  id="total_keranjang" name="total_keranjang" @readonly(true)>
            </div>
            <div class="form-group col-2" hidden>
                <label for="total">Total Beli</label>
                <input type="text" class="form-control" placeholder="Total Barang"  id="total_beli_keranjang" name="total_beli_keranjang" @readonly(true)>
            </div>
            <div class="form-group col-2" hidden>
                <label for="total">Total hide</label>
                <input type="text" class="form-control" placeholder="Total Barang"  id="total_keranjang_new" name="total_keranjang_new" @readonly(true)>
            </div>
            <div class="form-group col-2">
                <input type="text" class="form-control" placeholder="Total Barang" value="pembelian"  id="state" name="state" hidden>
            </div>
          </div>
          {{-- <button type="submit" class="btn btn-success">submit</button> --}}
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-body -->
      </div>
</form>
