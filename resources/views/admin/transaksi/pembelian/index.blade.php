@extends('layouts.template.app-master')
@section('context')
    Pembelian
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            @include('admin.transaksi.pembelian.table')
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
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

    document.getElementById('total_keranjang').addEventListener('click', function() {
            var jumlah_barang = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga').value;

            var total = jumlah_barang * harga;

            document.getElementById('total_keranjang').value = total;
        });

        document.getElementById('bayar').addEventListener('mousemove', function() {
            
            document.getElementById('kembali').value = jumlah;
        });
        
        document.getElementById('kembali').addEventListener('mousemove', function() {
      
            document.getElementById('kembali').value = jumlah;
        });
</script>


<script>
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