@extends('layouts.template.app-master')

@section('context')
    Barang
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    @include('admin.stock-opname.table')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    console.log("ready");
        $.ajax({
        type: "GET",
        url: "{{ route('kodebarang.index') }}",
            success: function(response){
                console.log(response);

                var kodeBarangArray = response;
                var dataKodeBarang  = {};
                var dataCust2       = {};

                for (var i = 0; i < kodeBarangArray.length; i++) {
                    dataKodeBarang[kodeBarangArray[i].kode_barang] = null;
                    dataCust2[kodeBarangArray[i].kode_barang] = kodeBarangArray[i];

                }

                $('input#kode_barang').autocomplete({
                    data: dataKodeBarang,
                    onAutocomplete: function(val) {
                        // Callback function when value is autcompleted.
                        // console.log(val);
                        console.log(dataCust2[val].harga_jual);

                        $('#nama_barang').val(dataCust2[val].nama_barang);
                        $('#harga').val(dataCust2[val].harga_jual);
                    },
                });
            }
        });
    });
</script>
@endsection
