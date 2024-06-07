@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
  @php
  $price=55;
  $totalweight=0;
  $totalprice=0;
  $totalbox=0;
@endphp
 
    
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Products werehouse</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
         
          <tr>
            <th>Id</th>
            <th>Types of Products</th>
            <th>Weight</th>
            <th>Total boxes</th>
            <th>total remine </th>
            <th>Date</th>
          </tr>
        </thead>
        @foreach ($data as $key=> $item)
       
       
        <tbody>
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->typeofproduct}} </td>
            <td>{{$item->weight}} </td>
            <td>{{$item->workbybox}} </td>
            <td>{{55}} </td>
            <td>{{$item->date}}</td>
            @php
          $totalweight +=$item->weight;
          $totalprice +=55*$item->workbybox;
          $totalbox +=$item->workbybox;
  
           @endphp
          </tr>
         
          @endforeach
        </tbody>
      </table>
      <div>
        @php
              $sale=DB::table('works')->sum('weight');
            $saleweight=DB::table('add_sells')->sum('weight');
            $toalremineweight=$sale-$saleweight;
        @endphp
       <table>
        <theead>
          <th><label class="btn btn-primary col-12">Total weight </label></th>
          <td class="text-center"><label class=" btn btn-success  col-12" style="font-size: 1.2em; ">AFN:{{ number_format($totalweight) }}</label></td>
          
          
           
       
    
            <th><label class="btn btn-primary col-12">Total Boxes </label></th>
            <td class="text-center"><label class=" btn btn-success  col-12" style="font-size: 1.2em; ">AFN:{{ number_format($totalbox) }}</label></td>
          
          
          
          
          <th><label class="btn btn-primary col-12">Total price op products </label></th>
          <td class="text-center"><label class="btn btn-info col-12" style="font-size: 1.2em;">AFN:{{ number_format($totalprice) }}</label></td>
          
        
          <th><label class="btn btn-primary col-12">Total remine weight </label></th>
          <td class="text-center"><label class=" btn btn-success  col-12" style="font-size: 1.2em; ">AFN:{{ number_format($toalremineweight) }}</label></td>
        
        </theead>
       </table>
        <tr >
          

        </tr>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>

</div>


@endsection