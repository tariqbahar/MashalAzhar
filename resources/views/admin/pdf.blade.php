<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 2</title>

    <style>
        @font-face {
    font-family: SourceSansPro;
    src: url(SourceSansPro-Regular.ttf);
  }
  
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #0087C3;
    text-decoration: none;
  }
  
  body {
    position: relative;
    width: 21cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #555555;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 14px; 
    font-family: SourceSansPro;
  }
  
  header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
  }
  
  #logo {
    float: left;
    margin-top: 8px;
  }
  
  #logo img {
    height: 70px;
  }
  
  #company {
    float: right;
    text-align: right;
  }
  
  
  #details {
    margin-bottom: 50px;
  }
  
  #client {
    padding-left: 6px;
    border-left: 6px solid #0087C3;
    float: left;
  }
  
  #client .to {
    color: #777777;
  }
  
  h2.name {
    font-size: 1.4em;
    font-weight: normal;
    margin: 0;
  }
  
  #invoice {
    float: right;
    text-align: right;
  }
  
  #invoice h1 {
    color: #0087C3;
    font-size: 2.4em;
    line-height: 1em;
    font-weight: normal;
    margin: 0  0 10px 0;
  }
  
  #invoice .date {
    font-size: 1.1em;
    color: #777777;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }
  
  table th,
  table td {
    padding: 20px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
  }
  
  table th {
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table td {
    text-align: right;
  }
  
  table td h3{
    color: #57B223;
    font-size: 1.2em;
    font-weight: normal;
    margin: 0 0 0.2em 0;
  }
  
  table .no {
    color: #FFFFFF;
    font-size: 1.6em;
    background: #57B223;
  }
  
  table .desc {
    text-align: left;
  }
  
  table .unit {
    background: #DDDDDD;
  }
  
  table .qty {
  }
  
  table .total {
    background: #57B223;
    color: #FFFFFF;
  }
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }
  
  table tbody tr:last-child td {
    border: none;
  }
  
  table tfoot td {
    padding: 10px 20px;
    background: #FFFFFF;
    border-bottom: none;
    font-size: 1.2em;
    white-space: nowrap; 
    border-top: 1px solid #AAAAAA; 
  }
  
  table tfoot tr:first-child td {
    border-top: none; 
  }
  
  table tfoot tr:last-child td {
    color: #57B223;
    font-size: 1.4em;
    border-top: 1px solid #57B223; 
  
  }
  
  table tfoot tr td:first-child {
    border: none;
  }
  
  #thanks{
    font-size: 2em;
    margin-bottom: 50px;
  }
  
  #notices{
    padding-left: 6px;
    border-left: 6px solid #0087C3;  
  }
  
  #notices .notice {
    font-size: 1.2em;
  }
  
  footer {
    color: #777777;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #AAAAAA;
    padding: 8px 0;
    text-align: center;
  }
  .custom-padding {
    padding-right: 80px; /* Adjust the value as needed */
  }
  
  
    </style>
</head>
  <body>
   
      <div class="custom-padding">
    <header class="clearfix">
      <div id="logo">
        <img src="#">
      </div>
      <div id="company">
        <h2 class="name">Mashal Foods industry</h2>
        <div>Base-E-Kmalaty 3rd flat Jilalabad Afghanistan</div>
        <div><p>Phone:</p>+93731111973</div>
        <div><a href="warismashal143@gmail.com">Mashal143@gmail.com</a></div>
      </div>
  
    </header>
    <main>
      
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{$data->name}} </h2>
          <div class="address">{{$data->name}} Food Company Afghanistan </div>
          <div class="email"><a href="mailto@example.com">{{$data->name}}@example.com</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE {{$data->id}}</h1>
          <div class="date">Date of Invoice: <?php echo date('Y-m-d'); ?> </div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
       
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="no">{{$data->id}}</th>
            <th class="desc">{{$data->details}} </th>
            <th class="unit">{{$data->cost}} </th>
            <th class="qty">{{$data->quantity}} </th>
            <th class="unit">{{$data->totalcost}} </th>
     
          </tr>
         
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Total</td>
            <td>AFN {{$data->totalcost}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Pyment</td>
            <td>{{$data->pyment}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Debate</td>
            <td>{{$data->debate}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">check your finance bill if product is out from our factory we are not allowed any problem its depend on you!</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </div>
  
  </body>
</html>