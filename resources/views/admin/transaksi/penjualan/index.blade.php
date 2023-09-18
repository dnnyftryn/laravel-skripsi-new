@extends('layouts.template.app-master')
@section('context')
    Penjualan
@endsection

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.transaksi.penjualan.table')
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.3/dist/cleave.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
    const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
        }).format(number);
    }

    var harga = 0;

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
                        var harga_currency = dataCust2[val].harga_beli
                        harga = dataCust2[val].harga_beli

                        $('#harga_new').val(harga);

                        $('#nama_barang').val(dataCust2[val].nama_barang);
                        $('#harga').val(rupiah(harga_currency));
                    },
                });
            }
        });
    });

        document.getElementById('total_keranjang').addEventListener('click', function() {
            var jumlah_barang = document.getElementById('jumlah').value;
            // var harga = document.getElementById('harga').value;

            var total = jumlah_barang * harga;
            var value = total.toLocaleString()

            document.getElementById('total_keranjang_new').value = total;

            document.getElementById('total_keranjang').value = rupiah(total);
        });

        document.getElementById('bayar').addEventListener('mousemove', function() {
            var total = document.getElementById('total_new').value;
            var bayar = document.getElementById('bayar').value;

            var bayar_new = parseFloat(bayar.replace(/,/g, ''))

            var jumlah = bayar_new - total;

            document.getElementById('kembali').value = rupiah(jumlah);
        });

        document.getElementById('kembali').addEventListener('mousemove', function() {

            document.getElementById('kembali').value = jumlah;
        });

        //jQuery
        $(".bayar").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });


</script>
<script>

    // Tanggal
    flatpickr("input[type=datetime-local]");

    var update_pembayaran = function () {
        if ($('#pembayaran').val() == 'lunas') {
            $('#hari').prop('disabled', true);
        } else {
            $('#hari').prop('disabled', false);
        }
    };
    $(update_pembayaran);
    $('#pembayaran').change(update_pembayaran);
</script>

@endsection
