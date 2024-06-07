@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Welcome to Mashal indestry</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
          <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
        </div>
        <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="printer"></i>
          Print
        </button>
        
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-3 ">Total Cost of factory</h6>
                 
                   
       
                    @php
                    //all record
                    $currentMonth = date('m');
                    $currentYear = date('Y');
                    //cost of factory code
                         $totalcost=DB::table('add_costs')->sum('totalcost');
                        $totalwork=DB::table('works')->sum('totalprice');
                        $totalworkcost=$totalcost+$totalwork;
                    
                      //Weakly  Record
                      $startDate = date('Y-m-d', strtotime('last sunday'));
    $endDate = date('Y-m-d', strtotime('next saturday'));

    // Weekly cost of factory code
    $weeklyCost = DB::table('add_costs')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->sum('totalcost');

    $weeklyWork = DB::table('works')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->sum('totalprice');

    $weeklyTotalCost = $weeklyCost + $weeklyWork;

                //Monthly Record
    $monthlycost = DB::table('add_costs')
                    ->whereMonth('created_at', $currentMonth)
                    ->whereYear('created_at', $currentYear)
                    ->sum('totalcost');

    $monthlywork = DB::table('works')
                    ->whereMonth('created_at', $currentMonth)
                    ->whereYear('created_at', $currentYear)
                    ->sum('totalprice');

    $monthlyworkcost = $monthlycost + $monthlywork;

                //Yearly Record
                // Get the current year
    $currentYear = date('Y');

    // Yearly cost of factory code
    $yearlyCost = DB::table('add_costs')
                    ->whereYear('created_at', $currentYear)
                    ->sum('totalcost');

    $yearlyWork = DB::table('works')
                    ->whereYear('created_at', $currentYear)
                    ->sum('totalprice');

    $yearlyTotalCost = $yearlyCost + $yearlyWork;
                    @endphp

                   
                    
                 
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h6>All record</h6>
                    <h3 class="mb-2">{{$totalworkcost}}</h3>
                    
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>s</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6>Weakly record</h6>
                    <h3 class="mb-2">{{$weeklyTotalCost}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-5">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6>Monthly  record</h6>
                    <h3 class="mb-2">{{$monthlyworkcost}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6>Yearly record</h6>
                    <h3 class="mb-2">{{$yearlyTotalCost}}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- ******************************** -->

        @php
          $currentMonth = date('m');
          $currentYear = date('Y');
          $currentYear = date('Y');
          $startDate = date('Y-m-d', strtotime('last sunday'));
          $endDate = date('Y-m-d', strtotime('next saturday'));
          $totalsells =DB::table('add_sells')->sum('totalprice');
          $weaklysell =DB::table('add_sells')->whereBetween('created_at', [$startDate, $endDate])->sum('totalprice');
          $monthlysell =DB::table('add_sells') ->whereMonth('created_at', $currentMonth)->sum('totalprice');
          $yearlysell =DB::table('add_sells')->whereYear('created_at', $currentYear)->sum('totalprice');
        @endphp
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class=" mb-2">Sale Acount</h6>
                  <div class="dropdown mb-2">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h6 style="color: blue; ">All record</h6>
                    <h3 style="color: blue; " class="mb-2">{{$totalsells}}</h3>
                    
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>s</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: blue; " style="color: blue; ">Weakly record</h6>
                    <h3 style="color: blue; " style="color: blue; " class="mb-2">{{$weaklysell}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-5">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: blue; ">Monthly  record</h6>
                    <h3 style="color: blue; " class="mb-2">{{$monthlysell}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: blue; ">Yearly record</h6>
                    <h3 style="color: blue; "  class="mb-2">{{$yearlysell}}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
          @php
                    //cost of All
                         $totalselldebate=DB::table('works')->sum('debate');
                        $totalworkdebate=DB::table('add_costs')->sum('debate');
                        $totaldebate=$totalselldebate+$totalworkdebate;
                    //cost of weakly
                         $weaklyselldebate=DB::table('works')->whereBetween('created_at', [$startDate, $endDate])->sum('debate');
                        $weaklyworkdebate=DB::table('add_costs')->whereBetween('created_at', [$startDate, $endDate])->sum('debate');
                        $weaklydebate=$weaklyselldebate+$weaklyworkdebate;

                        //cost of wmonthlyeakly
                         $monthlyselldebate=DB::table('works') ->whereMonth('created_at', $currentMonth)->sum('debate');
                        $monthlyworkdebate=DB::table('add_costs') ->whereMonth('created_at', $currentMonth)->sum('debate');
                        $monthlydebate=$monthlyselldebate+$monthlyworkdebate;

                        //cost of yearly
                         $yearlyselldebate=DB::table('works')->whereYear('created_at', $currentYear)->sum('debate');
                        $yearlyworkdebate=DB::table('add_costs')->whereYear('created_at', $currentYear)->sum('debate');
                        $yearlydebate=$yearlyselldebate+$yearlyworkdebate;


                    
                    @endphp

          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">فابرکې باندې مکمل قرض</h6>
                  
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h6 style="color: brown; ">All record</h6>
                    <h3 style="color: brown; " class="mb-2 ">{{$totaldebate}}</h3>
                    
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>s</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: brown; ">Weakly record</h6>
                    <h3 style="color: brown; "class="mb-2">{{$weaklydebate}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-5">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: brown; ">Monthly  record</h6>
                    <h3 style="color: brown; " class="mb-2">{{$monthlydebate}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: brown; ">Yearly record</h6>
                    <h3 style="color: brown; " class="mb-2">{{$yearlydebate}}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        @php
          $currentMonth = date('m');
          $currentYear = date('Y');
          $currentYear = date('Y');
          $startDate = date('Y-m-d', strtotime('last sunday'));
          $endDate = date('Y-m-d', strtotime('next saturday'));

          $totaldebate =DB::table('add_sells')->sum('debate');
          $weaklydebate =DB::table('add_sells')->whereBetween('created_at', [$startDate, $endDate])->sum('debate');
          $monthlydebate =DB::table('add_sells') ->whereMonth('created_at', $currentMonth)->sum('debate');
          $yearlydebate =DB::table('add_sells')->whereYear('created_at', $currentYear)->sum('debate');
        @endphp
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">مشتریانو  باندی زمونږ قرض</h6>
                  <!-- @php
                       $totalcost=DB::table('add_sells')->sum('debate');
                  @endphp -->
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h6 style="color: blue; ">All record</h6>
                    <h3 style="color: blue; " class="mb-2">{{$totaldebate}}</h3>
                    
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>s</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: blue; " style="color: blue; ">Weakly record</h6>
                    <h3 style="color: blue; " style="color: blue; " class="mb-2">{{$weaklydebate}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-5">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: blue; ">Monthly  record</h6>
                    <h3 style="color: blue; " class="mb-2">{{$monthlydebate}}</h3>
                    </div>
                  </div>
                  <div class="col-6 col-md-12 col-xl-7">
                    <div  class="mt-md-3 mt-xl-0">
                    <h6 style="color: blue; ">Yearly record</h6>
                    <h3 style="color: blue; "  class="mb-2">{{$yearlydebate}}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">ټوله  ګټه</h6>
                  @php
                  @endphp
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalsells-$totalworkcost}}   افغانۍ </h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>+2.8%</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  @php
                  
                  //cost of factory code
                       $totalsellbox=DB::table('add_costs')->sum('quantity');
                     
                      $totalworkedbox=DB::table('works')->sum('workbybox');
                      $totalcostbox=DB::table('add_costs')->sum('cost');
                      $totalworkcost=$totalsellbox-$totalworkedbox;
                   

                  @endphp
                  
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">نغدې  روپۍ</h6>
                  
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalworkcost}} افغانۍ</h3>
                    <p class="text-success">
                    <button type="button" class="btn btn-primary"><a href=" {{route('insertmony')}}">Amount</a> </button>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                  </div>
 


                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          </div>
          </div> 
          <style>
          center{
            text-align: center;
          }
          </style>
          <h1 center>Werehouse</h1> 
           
          <hr>
          <!-- start weare house -->
          <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">



          <!-- were hosee    Salanty -->

          @php
                  
                  //cost of factory code
                  $totalsalanti=DB::table('works')->where('typeofproduct','salanty') ->sum('weight');
                  $salesalanti=DB::table('add_sells')->where('product_type','salanty')->sum('weight');    

           @endphp
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">سلانټي</h6>
                 
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalsalanti-$salesalanti}} kg </h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                      
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  @php
                  
                  //cost of factory code
                  $totalmincha=DB::table('works')->where('typeofproduct','mincha') ->sum('weight');
                  $salemincha=DB::table('add_sells')->where('product_type','mincha')->sum('weight');    

           @endphp
                  
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        <!-- Mencha -->

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">مینچه </h6>
                  @php
                  @endphp
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalmincha-$salemincha}} kg</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                     
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  @php
                  
                  //cost of factory code
                  $totalring=DB::table('works')->where('typeofproduct','ring') ->sum('weight');
                  $salering=DB::table('add_sells')->where('product_type','ring')->sum('weight');    

           @endphp
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Ring -->

          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">رینګ</h6>
                  @php
                  @endphp
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalring-$salering}} kg </h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                       
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  @php
                  
                  //cost of factory code
                  $totalsundal=DB::table('works')->where('typeofproduct','sundal') ->sum('weight');
                  $salesundal=DB::table('add_sells')->where('product_type','sundal')->sum('weight');    

           @endphp
                  
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Sundal -->
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">سندل</h6>
                  @php
                  @endphp
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalsundal-$salesundal}} kg </h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  @php
                  
                  //cost of factory code
                  $totalpipe=DB::table('works')->where('typeofproduct','pipe') ->sum('weight');
                  $salepipe=DB::table('add_sells')->where('product_type','pipi')->sum('weight');    

           @endphp
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Pipe  -->

          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">فایف</h6>
                  @php
                  @endphp
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$salepipe-$totalpipe}} kg</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                       
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  @php
                  
                  //cost of factory code
                  $totalother=DB::table('works')->where('typeofproduct','other') ->sum('weight');
                  $saleother=DB::table('add_sells')->where('product_type','other')->sum('weight');    

           @endphp
                  
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- other types -->
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">نور اقسام</h6>
                  @php
                  @endphp
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalother-$saleother}} kg </h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- flours -->
          @php
                  
                  //cost of factory code
                  $totalflour=DB::table('add_costs')->where('types','flour') ->sum('quantity');
                  $saleflour=DB::table('works')->sum('workbybox');    

           @endphp
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">flours</h6>
                 
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$totalflour-$saleflour}} Box </h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                      
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
 
                  @php
                  
                  //cost of factory code
                  $totalmincha=DB::table('works')->where('typeofproduct','mincha') ->sum('weight');
                  $salemincha=DB::table('add_sells')->where('product_type','mincha')->sum('weight');    

           @endphp
                  
                  <div class="col-6 col-md-12 col-xl-7">
                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div> 

    
    
    <!-- row -->

    

    

    <div class="row">
      <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Monthly sales</h6>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
            <div id="monthlySalesChart"></div>
          </div> 
        </div>
      </div>
      
    </div> <!-- row -->

   
</div>
@endsection