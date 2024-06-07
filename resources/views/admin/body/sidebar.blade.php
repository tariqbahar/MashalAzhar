<nav class="sidebar">
  <div class="sidebar-header">
   
    <a href="#" class="sidebar-brand">
      Mashal<span>indestry</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">کور پاڼه</span>
        </a>
      </li>
      <li class="nav-item nav-category">Factory</li>
      <li class="nav-item">
        <a href="{{route('admin.insidecost')}}" class="nav-link" >
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">مصارف</span>
          <i class="link-arrow"></i>
        </a>
        <div class="collapse" id="emails">
          
        </div>
      </li>
   
      
      <li class="nav-item">
        <a href="{{route('admin.sales')}}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">خرڅول</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
          <i class="link-icon" data-feather="anchor"></i>
          <span class="link-title">تولیدات</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="advancedUI">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('admin.work')}}" class="nav-link">روزانه تولیدات</a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.weakly')}}" class="nav-link">اونیز تولیدات</a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.monthly')}}" class="nav-link">میاشتنی تولیدات</a>
            </li>
           
          </ul>
        </div>
      </li>
       
      
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
          <i class="link-icon" data-feather="anchor"></i>
          <span class="link-title">ګودام</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="advancedUI">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('admin.materials')}}" class="nav-link">Materials</a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.products')}}" class="nav-link">Products</a>
            </li>
           
          </ul>
        </div>
      </li>
      --}}

      

      <!-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Werehouse</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="forms">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('admin.salanty')}}" class="nav-link">Salanty</a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.mencha')}}" class="nav-link">Mencha</a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/editors.html" class="nav-link">Ring</a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/wizard.html" class="nav-link">Sundal</a>
            </li>
          </ul>
        </div>
      </li> -->

      <!-- <li class="nav-item">
        <a href="{{route('admin.loans')}}"  class="nav-link">
          <i class="link-icon" data-feather="hash"></i>
          <span class="link-title">Loans</span>
        </a>
      </li> -->
    </ul>   
  </div>
</nav>
