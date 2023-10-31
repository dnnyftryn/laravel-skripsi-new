@extends('layouts.template.app-master')

@section('context')
    Laporan Penjualan Barang
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Penjualan Barang</h3>
                    </div>
                    <div class="card-body">
                        {{-- menampilkan error validasi --}}
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{route('laporan_penjualan.cari')}}" method="get">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="form-group col-5" id="tanggal_before">
                                    <input type="datetime-local" class="form-control" placeholder="Dari Tanggal" id="tanggal_before" name="tanggal_before">
                                </div>
                                <div class="form-group col-5" id="tanggal_after">
                                    <input type="datetime-local" class="form-control" placeholder="Sampai Tanggal" id="tanggal_after" name="tanggal_after">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary text-right">Submit</button>
                        </form>
                    </div>
                </div>

                {{-- @include('admin.barang.laporan-barang.penjualan.table') --}}

            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        // <option value="between">Antara</option>
        // <option value="equals">Sama Dengan</option>
        // <option value="less_than">Kurang Dari</option>
        // <option value="more_than">Lebih Dari</option>

        $('#type').on('change', function() {
            var value = this.value;
            console.log(value);
            switch (value) {
                case "between":
                    $("#tanggal_after").show();
                    break;
                default:
                    $("#tanggal_after").hide();
                    break;
            }
        });

        $('#type2').on('change', function() {
            var value = this.value;
            console.log(value);
            switch (value) {
                case "between":
                    $("#tanggal_jatuh_tempo_after").show();
                    break;
                default:
                    $("#tanggal_jatuh_tempo_after").hide();
                    break;
            }
        });
    });

</script>
@endsection
