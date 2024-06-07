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
                <label for="recipient-name" class="form-label " >Name:</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" required >
                @error('name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>

              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Type:</label>
                <input type="text" name="types" class="form-control @error('types') is-invalid @enderror" required >
                @error('types')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Quantity:</label>
                <input type="number" name="quantity_name" class="form-control @error('quantity_name') is-invalid @enderror" required >
                @error('quantity_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Cost:</label>
                <input type="number" name="cost_name" class="form-control @error('cost_name') is-invalid @enderror" required >
                @error('cost_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              

             
              
           

            <div class="col-md-3">
              <label for="message-text" class="form-label">Date</label>
              <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" required>
              @error('date')
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
  </nav>

    
<div class="card">
  <div class="card-body">
    <h6 class="card-title">daily work</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>unit price</th>
            <th>work limit</th>
            <th>total sallary</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
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