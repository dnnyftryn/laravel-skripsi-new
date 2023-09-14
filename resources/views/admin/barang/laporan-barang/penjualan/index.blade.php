@extends('layouts.template.app-master')

@section('context')
    Laporan Penjualan Barang
@endsection

{{-- <label for="tanggal">Tanggal</label>
<input type="datetime-local" class="form-control" placeholder="Tanggal"  id="tanggal" name="tanggal">   --}}

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
                                <div class="col-sm-2">
                                    <select class="form-control" id="type">
                                      <option value="between">Antara</option>
                                      <option value="equals">Sama Dengan</option>
                                      <option value="less_than">Kurang Dari</option>
                                      <option value="more_than">Lebih Dari</option>
                                    </select>
                                </div>
                                <div class="form-group col-4" id="tanggal_before">
                                    <input type="datetime-local" class="form-control" placeholder="Tanggal"  id="tanggal_before" name="tanggal_before">  
                                </div>
                                <div class="form-group col-4" id="tanggal_after">
                                    <input type="datetime-local" class="form-control" placeholder="Tanggal"  id="tanggal_after" name="tanggal_after">  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pembeli</label>
                                <div class="col-sm-10">
                                    <select class="select2" multiple="multiple" data-placeholder="Pilih Nama Pembeli" style="width: 100%;">
                                        @foreach ($nama_pembeli as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_member }}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pembayaran</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                      <option value="lunas">Lunas</option>
                                      <option value="kredit">Kredit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Jatuh Tempo</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="type2">
                                      <option value="between">Antara</option>
                                      <option value="equals">Sama Dengan</option>
                                      <option value="less_than">Kurang Dari</option>
                                      <option value="more_than">Lebih Dari</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <input type="datetime-local" class="form-control" placeholder="tanggal_jatuh_tempo"  id="tanggal_jatuh_tempo_before" name="tanggal_jatuh_tempo_before">  
                                </div>
                                <div class="form-group col-4">
                                    <input type="datetime-local" class="form-control" placeholder="tanggal_jatuh_tempo"  id="tanggal_jatuh_tempo_after" name="tanggal_jatuh_tempo_after">  
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
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