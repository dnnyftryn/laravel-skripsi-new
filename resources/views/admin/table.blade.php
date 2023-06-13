<div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Transaksi Terakhir</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th>ID Transaksi</th>
            <th>Member/Supplier</th>
            <th>Alamat</th>
            <th>Pembayaran</th>
            <th>Hari</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $item->invoice }}</td>
                    <td>{{ $item->id_member }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->pembayaran }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->jatuh_tempo }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info">
                          <i class="fas fa-search"></i>
                        </a>
                        <a href="" class="btn btn-sm btn-warning">
                          <i class="fas fa-pen"></i>
                        </a>
                        <form action="" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">
                              <i class="fas fa-trash"></i>
                            </button>
                        </form>  
                    </td>   
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div> --}}
    <!-- /.card-footer -->
</div>