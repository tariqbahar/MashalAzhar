@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">Add cost </button>
     <span style="padding-left: 30px" >
        
      <button type="button" class="btn btn-inverse-info"><a href="{{url('admin/addtype')}}">Add Type</a>  </button>
    </span>
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
                <label >product Type</label>
                    <select class="text_color" name="types">
                        <option value="" selected="" >Add  a Catagory here !</option>
                        @foreach ($catagory as $catagory)
                        
                        <option value="{{$catagory->typename}}">{{$catagory->typename}}</option>
                        @endforeach
                    </select>
              </div>
              
              {{-- <div class="col-md-3">
                <label for="recipient-name" class="form-label">Details:</label>
                <input type="text" name="types" class="form-control @error('details') is-invalid @enderror" required >
                @error('details')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div> --}}

              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Details:</label>
                <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" required >
                @error('details')
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
                <label for="recipient-name" class="form-label">Pyment:</label>
                <input type="number" name="pyment" class="form-control @error('pyment') is-invalid @enderror" required >
                @error('pyment')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              

             
              
           

              <div>
                <label for="dateTimeField">Current Date and Time:</label>
                <input type="text" id="dateTimeField" class="form-control" name="datetime" readonly >
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
            <th>id</th>
            <th>Name</th>
            <th>Type</th>
            <th>details</th>
            <th>Quantity Boxes</th>           
            <th>Unit price</th>
            <th>Total cost</th>
            <th>Pyment</th>
            <th>Debate</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>PDF</th>
            
          </tr>
        </thead>
        <tbody>
           @php
     $totalCost = 0; // Initialize total cost variable
    $totalpyment=0;
    $totaldebate=0;
  @endphp 
  
          @foreach ($types as $key => $item )
              
          
          <tr>
            <td>{{$key+1}} </td>
            <td>{{$item->name}} </td>
            <td>{{$item->types}} </td>
            <td>{{$item->details}} </td>            
            <td>{{$item->quantity}} </td>
            <td>{{$item->cost}} </td>
            <td>{{$item->quantity*$item->cost}} </td>
            <td>{{$item->pyment}}</td>
            <td>{{$item->quantity*$item->cost-$item->pyment}}</td>
            <td>{{$item->datetime}} </td>
            <td><a href="{{route('costedit',$item->id)}}">Edit</a></td>
            <td><a href="{{route('costdestory',$item->id)}}">Delete</a></td>
            <td><a href="{{route('print_pdf',$item->id)}}">PDF</a></td>
            @php
            $totalCost += $item->quantity*$item->cost; // Add the cost of each item to the total cost
            $totalpyment += $item->pyment;
            $totaldebate += $item->quantity*$item->cost-$item->pyment;
           @endphp
          </tr>
          @endforeach         
        </tbody>
      </table>
      <div>
      <table>
        <th>
<a href="{{route('cost_report')}}"  class="btn btn-primary col-12" >Total report</a>
        </th>
        {{-- <th>


          <td><label class="btn btn-primary col-12">Total Cost:</label></td>
        <td class="text-center"><label class="badge badge-success col-12" style="font-size: 1.2em;">AFN:{{ number_format($totalCost) }}</label></td>
    
        </th>
        <th>
          <td><label class="btn btn-primary col-12">Total Pyment:</label></td>
          <td class="text-center"><label class="badge badge-success col-12" style="font-size: 1.2em;">AFN:{{ number_format($totalpyment) }}</label></td>    
        </th>
        <th>
          <td><label class="btn btn-primary col-12">Total Debate:</label></td>
        
          <td class="text-center"><label class="badge badge-success col-12" style="font-size: 1.2em;">AFN:{{ number_format($totaldebate) }}</label></td>
 
       </th> --}}
      </table>
      
  </div>
      

    </div>
  </div>
</div>
        </div>
    </div>

</div>
<script>
  function updateDateTime() {
      var now = new Date();

      // Get date components
      var year = now.getFullYear();
      var month = now.getMonth() + 1; // Months are zero-based
      var day = now.getDate();

      // Get time components
      var hours = now.getHours();
      var minutes = now.getMinutes();
      var seconds = now.getSeconds();

      // Format the date and time as YYYY-MM-DD HH:MM:SS
      var formattedDateTime =
          year + "-" + padZero(month) + "-" + padZero(day) + " " +
          padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds);

      // Update the content of the input field
      document.getElementById("dateTimeField").value = formattedDateTime;
  }

  function padZero(number) {
      return (number < 10 ? "0" : "") + number;
  }

  // Update the date and time every second
  setInterval(updateDateTime, 1000);

  // Initial call to set the date and time immediately
  updateDateTime();
</script>

@endsection