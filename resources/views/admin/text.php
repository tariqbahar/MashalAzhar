@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
  
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">Add cost </button>

    </ol>
  </nav>

      <div class="modal fade modal-xl " id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
            
            <h5 class="modal-title " id="varyingModalLabel">Add Cost</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{route('store.cost')}}">
              @csrf
                <div class="row">
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                @error('name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Quantity:</label>
                <input type="text" name="quantity_name" class="form-control @error('quantity_name') is-invalid @enderror" >
                @error('quantity_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Cost:</label>
                <input type="text" name="cost_name" class="form-control @error('cost_name') is-invalid @enderror" >
                @error('cost_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="message-text" class="form-label">Date:</label>
                <input type="text" name="date_name" class="form-control @error('date_name') is-invalid @enderror" >
                @error('date_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
             
              <div class="col-md-12">
                <label for="message-text" class="form-label">Description:</label>
                <input type="text" name="description_name" class="form-control @error('description_name') is-invalid @enderror" >
                @error('description_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

<div class="card">
  <div class="card-body">
    <h6 class="card-title">Internal Cost</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>quantity</th>
            <th>Date</th>
            <th>Cost</th>
          </tr>
        </thead>
        <tbody>
          @php
    $totalCost = 0; // Initialize total cost variable
  @endphp
          @foreach ($type as $key => $item )
              
          
          <tr>
            <td>{{$key+1}} </td>
            <td>{{$item->types}} </td>
            <td>{{$item->description}} </td>
            <td>{{$item->quantity}} </td>
            <td>{{$item->date}} </td>
            <td>{{$item->cost}} </td>
            <td>
              <a href="#" class=" btn-inverse-warning">Edit</a>
              <a href="#" class=" btn-inverse-danger">Delete</a>  
            </td>
          </tr>
          @php
      $totalCost += $item->cost; // Add the cost of each item to the total cost
          @endphp
          @endforeach
          <tr>
            <td><label class="btn btn-primary col-12">Total Cost:</label></td>
            <td class="text-center"><label class="badge badge-success col-12" style="font-size: 1.2em;">AFN:  {{ number_format($totalCost) }}</label></td>
        </tr>
        
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>
@endsection