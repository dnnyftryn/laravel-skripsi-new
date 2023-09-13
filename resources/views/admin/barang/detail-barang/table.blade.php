<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Barang</h3>
    <button type="button" class="btn btn-primary float-right"> 
      <a href="{{ route('barang.create') }}" class="text-white">
          Tambah Barang
      </a>
    </button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Nama Kategori</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Satuan</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($barang as $barang)
          <tr id="{{ $barang->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->nama_kategori }}</td>
            <td>{{ $barang->harga_beli }}</td>
            <td>{{ $barang->harga_jual }}</td>
            <td>{{ $barang->satuan }}</td>
            <td><img src="{{ asset('storage/' . $barang->image) }}" alt="" width="100px"></td>
            <td>
                <form action="{{route('barang.destroy', $barang->id)}}" method="Post">
                  @csrf
                  @method('DELETE')
                  <a class="btn btn-warning" href="{{route('barang.edit', $barang->id)}}"><i class="fas fa-pen"></i></a>
                  <button type="submit" class="btn btn-danger"><i
                          class="fas fa-trash"></i></button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>