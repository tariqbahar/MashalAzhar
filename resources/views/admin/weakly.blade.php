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

          @foreach ( $data as $key => $item )
          <tr>
           
            <td>{{$key+1}} </td>
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
      <table>
        <th>
<a href="{{route('weakly_work_report')}}"  class="btn btn-primary col-12" >Total report</a>
        </th>
      </table>
      <div>

       
        
      </div>

    </div>
  </div>
</div>
@endsection