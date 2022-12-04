<style>
   /* Fixed sidenav, full height */
   .sidenav {

      padding-top: 0px;
   }

   /* Style the sidenav links and the dropdown button */
   .sidenav a,
   .dropdown-btn {
      padding: 6px 8px 6px 14px;
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
      <a class="nav-link" href="{{route('branch_dashboard.index')}}">
         <i class="fas fa-fw fa-home"></i>
         <span>Dashboard</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="{{route('branch_admin_profile.index')}}">
         <i class="fas fa-fw fa-users"></i>
         <span>Profile</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="{{route('branch_admin_branches.index')}}">
         <i class="fas fa-fw fa-list-alt"></i>
         <span>Branches</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="{{route('branch_admin_purchases.index')}}">
         <i class="fas fa-fw fa-list-alt"></i>
         <span>Purchases</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="{{route('branch_admin_branch_medicins.index')}}">
         <i class="fas fa-fw fa-list-alt"></i>
         <span>Branch Medicins</span>
      </a>
   </li>

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


   <li class="nav-item">
      <a class="nav-link" href="{{route('branch_admin_sale_page.index')}}">
         <i class="fas fa-fw fa-list-alt"></i>
         <span>Orders</span>
      </a>
   </li>
   <li class=" nav-item">
            <a class="nav-link" target="__blank" href="{{route('branch_admin_sale_page.create')}}">
               <i class="fas fa-fw fa-history"></i>
               <span>POS</span>
            </a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="{{route('branch_admin_timeline_posts.index')}}">
         <i class="fas fa-fw fa-history"></i>
         <span>TimeLine Posts</span>
      </a>
   </li>

 
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