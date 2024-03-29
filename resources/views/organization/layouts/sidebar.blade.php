<style>
   .sidebar .nav-item .nav-link {
      padding: 12px 22px !important;
   }

   /* Fixed sidenav, full height */
   .sidenav {

      padding-top: 0px;
   }

   /* Style the sidenav links and the dropdown button */
   .sidenav a,
   .dropdown-btn {
      padding: 6px 8px 6px 24px;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      color: azure;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
   }

   /* On mouse-over */
   .sidenav a:hover,
   .dropdown-btn:hover {
      color: azure;
   }

   .dropdown-item:hover {
      /* color:red; */
      background-color: rgba(255, 255, 255, .2);
   }

   /* Main content */
   /* .main {
  margin-left: 200px; /* Same as the width of the sidenav */
   font-size: 20px;
   /* Increased text to enable scrolling */
   padding: 0px 10px;
   }

   */

   /* Add an active class to the active dropdown button */
   .active {
      /* background-color: green; */
      color: #e83e8c;
   }

   /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
   .dropdown-container {
      display: none;
      /* background-color: #262626; */
      padding-left: 8px;
   }

   /* Optional: Style the caret down icon */
   .fa-caret-down {
      float: right;
      padding-right: 8px;
   }

   /* Some media queries for responsiveness */
   @media screen and (max-height: 450px) {
      .sidenav {
         padding-top: 15px;
      }

      .sidenav a {
         font-size: 18px;
      }
   }
</style>
<ul class="sidebar navbar-nav">
   <li class="nav-item active">
      <a class="nav-link" href="{{route('organization_dashboard.index')}}">
         <i class="fas fa-fw fa-home"></i>
         <span>Dashboard</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="{{route('organization_profile.index')}}">
         <i class="fas fa-fw fa-user"></i>
         <span>Profile</span>
      </a>
   </li>
      <li class="nav-item">
      <a class="nav-link" href="{{route('user_organizations.index')}}">
         <i class="fa fa-university"></i>
         <span>Organizations</span>
      </a>
   </li>
         <div class="sidenav">
      <button class="dropdown-btn"><i class="fa fa-bars"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>HR</span>
         <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
         <a class="dropdown-item" style="margin-left: 17px;" href="{{route('all_org_shift_branches')}}">Shifts</a>
         <a class="dropdown-item" style="margin-left: 17px;"
            href="{{route('all_org_attendance_branches')}}">Attendance</a>
         <a class="dropdown-item" style="margin-left: 17px;" href="{{route('easysign_org')}}">Easy
            Sign</a>
         <a class="dropdown-item" style="margin-left: 17px;" href="{{route('all_org_employees')}}">Employee</a>
      </div>

   </div>
   {{-- <li class="nav-item">
      <a class="nav-link" href="{{route('pharmacy_admins.index')}}">
         <i class="fa fa-users"></i>
         <span>Organization Admins</span>
      </a>
   </li> --}}
   {{-- <li class="nav-item">
      <a class="nav-link" href="{{route('organization_branchs.index')}}">
         <i class="fa fa-sitemap"></i>
         <span>Organization Branches</span>
      </a>
   </li> --}}
   {{-- <li class="nav-item">
      <a class="nav-link" href="{{route('organization_purchases.index')}}">
         <i class="fa fa-shopping-cart"></i>
         <span>Purchases</span>
      </a>
   </li> --}}

   {{-- <div class="sidenav">
      <button class="dropdown-btn"><i class="fas fa-fw fa-list-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Countries</span>
         <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
         <a class="dropdown-item" href="{{route('countries.index')}}">Countries</a>
   <a class="dropdown-item" href="{{route('cities.index')}}">City</a>
   <a class="dropdown-item" href="{{route('districts.index')}}">District</a>
   </div>

   </div> --}}


   {{-- <li class="nav-item">
      <a class="nav-link" href="{{route('organization_branch_medicins.index')}}">
         <i class="fa fa-plus-square"></i>
         <span>Branches Medicins</span>
      </a>
   </li> --}}
   {{-- <li class=" nav-item">
      <a class="nav-link" href="{{route('organization_medicins.index')}}">
         <i class="fa fa-plus-square"></i>
         <span>Medicins</span>
      </a>
   </li> --}}
   {{-- <li class="nav-item">
      <a class="nav-link" href="{{route('organization_sale_page.index')}}">
         <i class="fa fa-shopping-basket"></i>
         <span>Orders</span>
      </a>
   </li> --}}
   {{-- <li class="nav-item">
      <a class="nav-link" target="__blank" href="{{route('organization_sale_page.create')}}">
         <i class="fa fa-receipt"></i>
         <span>POS</span>
      </a>
   </li> --}}
   {{-- <div class="sidenav">
      <button class="dropdown-btn"><i class="fa fa-bars"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>HR</span>
         <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
         <a class="dropdown-item" style="margin-left: 17px;" href="{{route('org_shifts.index')}}">Shifts</a>
         <a class="dropdown-item" style="margin-left: 17px;"
            href="{{route('org_attendances.index')}}">Attendance</a>
         <a class="dropdown-item" style="margin-left: 17px;" href="{{route('org_shifts.create')}}">Easy
            Sign</a>
         <a class="dropdown-item" style="margin-left: 17px;" href="{{route('org_employees.index')}}">Employee</a>
      </div>

   </div> --}}
   {{-- <li class="nav-item">
      <a class="nav-link" href="{{route('organization_timeline_posts.index')}}">
         <i class="fa fa-indent"></i>
         <span>TimeLine Posts</span>
      </a>
   </li> --}}

   <hr>
</ul>
<script>
   /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>