@extends('layouts.template.app-master')

@section('context')
    Kategori Barang
@endsection

@section('content')
    <section class="content">
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show " id="notifDiv" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Kategori Barang</h3>
                          <button type="button" class="btn btn-primary float-right"> 
                            <a href="{{ route('kategori.create') }}" class="text-white">
                                Tambah kategori Barang
                            </a>
                          </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($barang as $barang)
                                <tr id="{{ $barang->id }}">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $barang->nama_kategori }}</td>
                                  <td>
                                    <form action="{{route('kategori.destroy', $barang->id)}}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning" href="{{route('kategori.edit', $barang->id)}}"><i class="fas fa-pen"></i></a>
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
                </div>
            </div>
        </div>

        <!-- Modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Kategori Barang</label>
                        <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                            placeholder="Masukkan Kategori Barang">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    </section>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    
    // $(document).on('click', '.btn-edit', function() {
    //     var id = $(this).attr('data-id');
    //     url = "{{ route('kategori.show', ':id') }}";
    //     url = url.replace(':id', id);
    //     $.ajax({
    //         url: url,
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data) {
    //             $('#modal-default-updated').modal('show');
    //             $('#modal-default-updated').find('.modal-body #nama_kategori').val(data.nama_kategori);
    //         },
    //         error: function() {
    //             alert("Tidak ada data");
    //         }
    //     });      
    // });

    // $(document).on('click', '.btn-updated', function() {
    //     var nama_kategori = $('#modal-default-updated').find('.modal-body #nama_kategori').val();
    //     url = "{{ route('kategori.update', ':nama_kategori') }}";
    //     url = url.replace(':nama_kategori', nama_kategori);          
    //     $.ajax({
    //         url: url,
    //         type: "PUT",
    //         data: {
    //             nama_kategori: nama_kategori,
    //         },
    //         success: function(data) {
    //             $('#modal-default-updated').modal('hide');
    //             alert('Data berhasil diubah');
    //             location.reload();
    //         },
    //         error: function() {
    //             alert("Tidak ada data");
    //         }
    //     }); 
    // });
</script>
@endsection
