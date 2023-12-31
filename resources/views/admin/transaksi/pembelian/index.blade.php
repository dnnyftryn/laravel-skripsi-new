@extends('layouts.template.app-master')
@section('context')
    Pembelian
@endsection

@section('content')
<!-- Main content -->
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
            @include('admin.transaksi.pembelian.table')
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

    var harga_jual = 0;
    var harga_beli = 0;

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
                      var harga_jual_currency = dataCust2[val].harga_jual
                      harga_jual = dataCust2[val].harga_jual

                      var harga_beli_currency = dataCust2[val].harga_beli
                      harga_beli = dataCust2[val].harga_beli

                      $('#harga_new').val(harga_jual);
                      $('#harga').val(rupiah(harga_jual_currency));

                      $('#harga_beli').val(rupiah(harga_beli_currency));
                      $('#harga_beli_new').val(harga_beli);
                    //   console.log(number_format(harga))

                      $('#nama_barang').val(dataCust2[val].nama_barang);

                  },
              });
          }
      });
    });

    document.getElementById('total_keranjang').addEventListener('mousemove', function() {
            var jumlah_barang = document.getElementById('jumlah').value;

            var total_jual = jumlah_barang * harga_jual;
            var total_beli = jumlah_barang * harga_beli;
            
            document.getElementById('total_beli_keranjang').value = total_beli;

            document.getElementById('total_keranjang_new').value = total_jual;
            document.getElementById('total_keranjang').value = rupiah(total_jual);
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
