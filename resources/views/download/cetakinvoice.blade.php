<style>
    #table {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #table td, #table th {
      border: 1px solid #000000;
      padding: 8px;
    }
    
    #table tr:nth-child(even){background-color: #f2f2f2;}
    
    #table tr:hover {background-color: #ddd;}
    
    #table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #00BFFF;
      color: white;
    }
    </style>
<h1>Invoice Orderan</h1>
<table id="table" class="table" ref="content">
    <tr>
        <th>Pesanan</th>
        <th>Harga satuan</th>
        <th>Qty</th>
        <th>Total Harga per Menu</th>
    </tr>
       @foreach ($tambahmakanan as $tambahmakanan)
        <tr>
        <td>{{$tambahmakanan->nama_prdk}}</td>
        <td>Rp.{{$tambahmakanan->harga}},00</td>
        <td>{{$tambahmakanan->qty}}</td>
        <td>Rp.{{$tambahmakanan->qty * $tambahmakanan->harga}},00</td>
        </tr>
      @endforeach
  </table> 
  <h3>Total Harga <b> Rp {{$total_orderan->totalorderan}},00 </b></h3>