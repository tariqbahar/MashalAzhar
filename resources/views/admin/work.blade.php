@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
  @php
  $boxes=0;
  $totalsalary=0;
  $totalpyment=0;
  $totaldebate=0;
  $totalweight=0;

@endphp
  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">Add Work </button>

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
            <form method="POST" action="{{route('addwork')}}">
              @csrf
                <div class="row">
                  
               

              <div class="col-md-3">
                <label for="recipient-name" class="form-label " >Name of worker:</label>
                <input type="text" name="workername" class="form-control  @error('workername') is-invalid @enderror" required >
                @error('workername')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>

              <div class="col-md-3">
                <label >product Type</label>
                    <select class="text_color" name="typeofproduct">
                        <option value="" selected="" >Add  a Catagory here !</option>
                        @foreach ($catagory as $catagory)
                        
                        <option value="{{$catagory->producttype}}">{{$catagory->producttype}}</option>
                        @endforeach
                    </select>
              </div>
              
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Unitprice:</label>
                <input type="number" name="unitprice" class="form-control @error('unitprice') is-invalid @enderror" required >
                @error('unitprice')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Work by box:</label>
                <input type="number" name="workbybox" class="form-control @error('workbybox') is-invalid @enderror" required >
                @error('workbybox')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>

              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Pyment By factory:</label>
                <input type="number" name="pymentbyfactory" class="form-control @error('pymentbyfactory') is-invalid @enderror" required >
                @error('pymentbyfactory')
                <span class="text-danger"></span>{{$message}}</span>
                @enderror
              </div>
              
              <div class="col-md-3">
                <label for="recipient-name" class="form-label">Work weight:</label>
                <input type="number" name="weight" class="form-control @error('weight') is-invalid @enderror" required >
                @error('weight')
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
           
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

          @foreach ( $types as $key => $item )
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
          
            <td><a href="{{route('workdestory',$item->id)}}">Delete</a></td>

           
          @php
              $boxes +=$item->workbybox;
              $totalsalary +=$item->unitprice*$item->workbybox;
              $totalpyment +=$item->pymentbyfactory;
              $totaldebate +=$item->unitprice*$item->workbybox-$item->pymentbyfactory;
              $totalweight +=$item->weight;
          @endphp
          </tr>
          
          @endforeach         
        </tbody>
      </table>
      
      <table class="table">
        <tr>
            <th>
                <div class="row">
                    <div class="col-12">
                        <label class="btn btn-primary col-6">Total worked Boxes</label>
                    </div>
                </div>
            </th>
            <td class="text-center">
                <label class="badge badge-success col-3" style="font-size: 1.2em;">AFN: {{ number_format($boxes) }}</label>
            </td>
        </tr>
        
        <tr>
          <th>
              <div class="row">
                  <div class="col-12">
                      <label class="btn btn-primary col-6">Total Salary of employes</label>
                  </div>
              </div>
          </th>
          <td class="text-center">
              <label class="badge badge-success col-3" style="font-size: 1.2em;">AFN:{{ number_format($totalsalary) }}</label>
          </td>
      </tr>
      <tr>
        <th>
            <div class="row">
                <div class="col-12">
                    <label class="btn btn-primary col-6">Total Pyment</label>
                </div>
            </div>
        </th>
        <td class="text-center">
            <label class="badge badge-success col-3" style="font-size: 1.2em;">AFN: {{ number_format($totalpyment) }}</label>
        </td>
    </tr>
    <tr>
      <th>
          <div class="row">
              <div class="col-12">
                  <label class="btn btn-primary col-6">Total Debated Factory  from emplo</label>
              </div>
          </div>
      </th>
      <td class="text-center">
          <label class="badge badge-success col-3" style="font-size: 1.2em;">AFN: {{ number_format($totaldebate) }}</label>
      </td>
  </tr>
  <tr>
    <th>
        <div class="row">
            <div class="col-12">
                <label class="btn btn-primary col-6">Total Weight</label>
            </div>
        </div>
    </th>
    <td class="text-center">
        <label class="badge badge-success col-3" style="font-size: 1.2em;">AFN: {{ number_format($totalweight) }}</label>
    </td>
</tr>
        <!-- Repeat the structure for other rows -->
        
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