<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 2</title>
    {{-- <link rel="stylesheet" href="admin/style.css" media="all" /> --}}
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
    padding: 5px 0;
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
    padding: 10px;
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
    padding: 5px 10px;
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
  
  .last-padding {
    padding-right: 200px; /* Adjust the value as needed */
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
        <h2 class="name">Mashal Food Company</h2>
        <div>Mashal food company jilalabad Afghanistan</div>
        <div>+93731111973</div>
        <div><a href="mailto:company@example.com">Mashl143@example.com</a></div>
      </div>
      
    </header>
    <main >
     
      
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to"><h2>Total Sell Report</h2></div>
        
          <h2 class="name">Database user name: {{$user->username}}</h2>
        
         
          <div class="address">{{$user->address}} </div>
          <div class="email"><a href="mailto:john@example.com">{{$user->email}} </a></div>
        </div>
        <div id="invoice">
          <h1>Mashal Total Report bill</h1>
          <div class="date">@php echo date('Y-m-d'); @endphp</div>
          
        </div>
      </div>
      <table>
        @php
        $totalcost=0;
        $totalpyment=0;
        $totaldebate=0;
    @endphp
        <thead>
          <tr>
            
            <th class="unit">NAME</th>
            <th class="qty">TYPE</th>          
            <th class="unit">QTTY</th>
            <th class="qty">UNIT COST</th>
            <th class="unit">TOTAL</th>
            <th class="qty">PYMENT</th>
            <th class="unit">DEBATE</th>
            <th class="qty">DATE</th>
          </tr>
        
        </thead>
        
          @foreach ($data as $item )
              
          
          <tr>
         
            <td class="unit">{{$item->name}} </td>
            <td class="qty">{{$item->types}} </td>            
            <td class="unit">{{$item->quantity}} </td>
            <td class="qty">{{$item->cost}} </td>
            <td class="unit">{{$item->totalcost}} </td>
            <td class="qty">{{$item->pyment}} </td>
            <td class="unit">{{$item->debate}} </td>
            <td class="qty">{{$item->datetime}} </td>
         
            @php
            $totalcost += $item->quantity*$item->cost; // Add the cost of each item to the total cost
            $totalpyment += $item->pyment;
            $totaldebate += $item->quantity*$item->cost-$item->pyment;
           @endphp
          </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
             
              <td colspan="6"></td>
              <td colspan="1">Total Cost</td>
              <td>AFN {{$totalcost}}</td>
            </tr>
            <tr>
              <td colspan="6"></td>
              <td colspan="1">Total Pyment</td>
              <td>{{$totalpyment}}</td>
            </tr>
            <tr>
              <td colspan="6"></td>
              <td colspan="1">TotalDebate</td>
              <td>{{$totaldebate}}</td>
            </tr>
          </tfoot>
        
      </table>
      
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </div>
  </body>
</html>