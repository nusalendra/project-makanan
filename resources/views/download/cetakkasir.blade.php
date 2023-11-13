<h1>INVOICE</h1>
<table class="table">
        <tr>
        <th>Nama Pembeli</th> 
        <th>Pesanan</th>
        <th>Qty</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        </tr>
        @foreach($pemesananoffline as $pesanoffline)
        <tr>
        <td>{{$pesanoffline->nama_pembeli}}</td>
        <td>{{$pesanoffline->menu_offline}}</td>
        <td>{{$pesanoffline->qty_offline}}</td>
        <td>{{$pesanoffline->harga_offline}}</td>
        <td>{{($pesanoffline->qty_offline)*($pesanoffline->harga_offline)}}</td>
        </tr>
        @endforeach
        </table>