<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Invoice</title>
      <style>
          /* Add your styling here */
          body {
              font-family: Arial, sans-serif;
              margin: 0;
              padding: 0;
          }
          .invoice {
              padding: 20px;
              border: 1px solid #ccc;
              margin: 50px auto;
              max-width: 800px;
          }
          table {
              width: 100%;
              border-collapse: collapse;
              margin-top: 20px;
          }
          th, td {
              border: 1px solid #ccc;
              padding: 8px;
              text-align: left;
          }
          .footer {
              text-align: center;
              margin-top: 30px;
          }
          .signature-line {
              border-top: 1px solid #000;
              margin-top: 20px;
              padding-top: 10px;
          }
      </style>
  </head>
  <body>
    <div class="invoice">
      <h1>Invoice</h1>
      <div class="row">
        <div>
          <address>
            <br>
            <strong>CV. Uut Beef</strong><br>
            Jl. Batembat No.17, Dawuan, Kec. Tengah Tani, Kabupaten Cirebon, Jawa Barat 45174<br>
            WA: +62 821-1923-2351<br>
            Email: info@uutbeef.com
          </address>
        </div>
        
        <div>
          Cirebon, {{ $date }} <br>
          <address>
            <strong>Kepada, {{ $pembelian->nama_pembeli }} </strong><br>
            {{ $pembelian->alamat }} <br>
          </address>
        </div>
      </div>

      <p>
        Invoice : <b> {{ $pembelian->invoice_id }} </b> <br>
      </p>

      <table>
          <thead>
              <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Harga Barang</th>
                  <th>Discount</th>
                  <th>Total</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($detail_pembelian as $item)
                  <tr>
                      <td>{{ $item->kode_barang }}</td>
                      <td>{{ $item->nama_barang }}</td>
                      <td>{{ $item->jumlah }}</td>
                      <td>{{ $item->harga }}</td>
                      <td>{{ $item->discount }}</td>
                      <td>{{ $item->total }}</td>
                  </tr>
              @endforeach
              <tr>
                <td colspan="5" class="text-right">Subtotal</td>
                <td>{{ $sub_total }}</td>
              </tr>
              <tr>
                <td colspan="5" class="text-right">Discount</td>
                <td>{{ $discount }}</td>
              </tr>
              <tr>
                <td colspan="5" class="text-right">Total</td>
                <td>{{ $total }}</td>
              </tr>
          </tbody>
      </table>

      <div class="footer">
        <div class="row">
          <div>
              <p>Tanda Terima <br><br><br><br>  (__________________________)</p>
          </div>
          <div>
            <p>Hormat Kami <br><br><br><br>  (__________________________)</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>