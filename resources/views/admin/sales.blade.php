@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <button style="margin-left: 20px"; type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">Add cost </button>
            <button  style="margin-left: 20px"; type="button" class="btn btn-inverse-info"  ><a href="{{url('producttype')}}">Add Product Type</a> </button>
            <button style="margin-left: 20px"; type="button" class="btn btn-inverse-info"><a href="{{ route('add_user') }}">Add User</a> </button>



    </ol>
  </nav>
  @php
  $itemdebate=0;
  $totaldebate=0;
  $totalpyment=0;
$totalCost = 0; // Initialize total cost variable
@endphp

    <div class="modal fade modal-xl " id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header ">
            
            <h5 class="modal-title " id="varyingModalLabel">Add Cost</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
          </div>

          
          
          <div class="modal-body">
            <form method="POST" action="{{route('store.sell')}}">
              
              @csrf
                <div class="row">
              <div class="col-md-3">
                <label for="recipient-name" class="form-label " >BuyerName:</label>
                <select class="text_color" name="buyer_name">
                        <option value="" selected="" >Add  a Catagory here !</option>
                        @foreach ($buyersname as $catagor)
                        
                        <option value="{{$catagor->name}}">{{$catagor->name}}</option>
                        @endforeach
                    </select>
                <!-- <input type="text" name="buyer_name" class="form-control  @error('name') is-invalid @enderror" required > -->
                @error('name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror

              </div>
              
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">detaile:</label>
                <input type="text" name="detaile" class="form-control @error('quantity_name') is-invalid @enderror" required >
                @error('quantity_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>

              <div class="col-md-3">
                <label >product Type</label>
                    <select class="text_color" name="product_type">
                        <option value="" selected="" >Add  a Catagory here !</option>
                        @foreach ($catagory as $catagory)
                        <option value="{{$catagory->producttype}}">{{$catagory->producttype}}</option>
                        @endforeach
                    </select>
              </div>
              
              <!-- {{-- <div class="col-md-3">
                <label for="recipient-name" class="form-label">product_type:</label>
                <input type="text" name="product_type" class="form-control @error('cost_name') is-invalid @enderror" required >
                @error('cost_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div> --}} -->
              <div class="col-md-3">
                <label for="message-text" class="form-label">weight</label>
                <input type="number" name="weight" class="form-control @error('date_name') is-invalid @enderror" required>
                @error('date_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
             
            
            
             
              <div class="col-md-12">
                <label for="message-text" class="form-label">unit_price:</label>
                <input type="number" name="unit_price" class="form-control @error('description_name') is-invalid @enderror" required>
                @error('description_name')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              

              

              <div class="col-md-12">
                <label for="message-text" class="form-label">pyment:</label>
                <input type="number" name="pyment" class="form-control @error('description_name') is-invalid @enderror" required>
                @error('description_name')
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
            <th>Buyer_name</th>
            <th>Detaile</th>
            <th>Product Type</th>
            <th>Weight</th>
            <th>Unit price</th>
            <th>Total Sell</th>
            <th>Pyment</th>
            <th>Debate</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>PDF</th>
            
          </tr>
        </thead>
        <tbody>
        
          @foreach ($type as $key => $item )
              
          
          <tr>
            <td>{{$key+1}} </td>
            <td><a href="{{route('buyerinfo',$item->id)}} ">{{$item->buyer_name}}</a> </td>
            <td>{{$item->detaile}} </td>
            <td>{{$item->product_type}} </td>
            <td>{{$item->weight}} </td>
            <td>{{$item->unit_price}} </td>
            <td>{{$item->weight*$item->unit_price}} </td>
            <td>{{$item->pyment}} </td>
            <td>{{$item->weight*$item->unit_price - $item->pyment}} </td>
            <td>{{$item->datetime}} </td>
            <td><a href="{{route('saleedit',$item->id)}}">Edit</a></td>
            <td><a href="{{route('saledestory',$item->id)}}">Delete</a></td>
            <!-- <td>
              <a href="#" class=" btn-inverse-warning">Edit</a>
              <a href="#" class=" btn-inverse-danger">Delete</a>  
            </td> -->


            @php
            $total_price=$item->weight*$item->unit_price;
            @endphp
           
            @php
                
            $totalCost += $item->weight*$item->unit_price; // Add the cost of each item to the total cost
            $totalpyment += $item->pyment;
            $totaldebate=$totalCost-$totalpyment;
              @endphp
          </tr>

         
          @endforeach
          
         
        
        
        </tbody>
        </table>
      
       
        <table>
          <th>
            <td><label class="btn btn-primary col-12">Total Sell </label></td>
            <td class="text-center"><label   class=" badge badge-success col-12" style="font-size: 1.2em; ">AFN:{{ number_format($totalCost) }}</label></td>
          </th>
          <th>
            <td><label class="btn btn-primary col-12">Total Pyment </label></td>
            <td class="text-center"><label class=" badge badge-success col-12" style="font-size: 1.2em;">AFN:{{ number_format($totalpyment) }}</label></td>  
          </th>
         
            <td><label class="btn btn-primary col-12">Total Debate </label></td>
            <td class="text-center"><label class=" badge badge-success col-12"  style="font-size: 1.2em;">AFN:{{ number_format($totaldebate) }}</label></td>  
            

          </th>
        </table>
          
            
          
      
      
    
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