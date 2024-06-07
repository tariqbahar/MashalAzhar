@extends('admin.admin_dashboard')
@section('admin')

<div class="card">
  <div class="card-body">
    <h6 class="card-title">daily work</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name of worker</th>
            <th>Types of Product</th>
            <th>unit price</th>
            <th>work By box</th>
            <th>total sallary</th>
            <th>Pyment By Factory</th>
            <th>Debate By worker</th>
            <th>Work Weight</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>

          @foreach ( $data as $item )
          <tr>
           
            <td>{{$item->id}} </td>
            <td>{{$item->workername}}</td>
            <td>{{$item->typeofproduct}}</td>
            <td>{{$item->unitprice}}</td>
            <td>{{$item->workbybox}}</td>
            <td>{{$item->unitprice*$item->workbybox}}</td>
            <td>{{$item->pymentbyfactory}}</td>
            <td>{{$item->unitprice*$item->workbybox-$item->pymentbyfactory}}</td>
            <td>{{$item->weight}}</td>
            <td>{{$item->date}}</td>


           
         
          </tr>
          
          
          @endforeach  
                 
        </tbody>
      </table>
      
      <div>

       
        
      </div>

    </div>
  </div>
</div>
@endsection