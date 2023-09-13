<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Pembelian`</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example11" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th style="width: 10px">No</th>
        <th>Nomor Invoice</th>
        <th>Nama Penjual</th>
        <th>Alamat</th>
        <th>Pembayaran</th>
        <th>Tempo Pembayaran</th>
        <th>Jatuh Tempo</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
          @foreach ($pembelian as $item)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->invoice_id }}</td>
              <td>{{ $item->nama_penjual }}</td>
              <td>{{ $item->alamat }}</td>
              <td>{{ $item->pembayaran }}</td>
              <td>{{ $item->tanggal_jatuh_tempo }}</td>
              <td>{{ $item->jatuh_tempo }}</td>
              <td>
                  <a href="{{ route('admin.show', $item->id) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-print"></i>
                  </a>
                  <a href="" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                  </a>
                  <form action="" method="POST" style="display: inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                  </form>
              </td>
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>