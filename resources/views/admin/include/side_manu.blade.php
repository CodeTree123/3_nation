<nav class="navbar navbar-expand d-flex flex-column align-item-start p-0" id="sidebar">
<a href="/admin" class="   text-dark text-decoration-none mt-3">
                         <img class="logo mx-auto d-block" src="{{ asset('assets/images/logo_final.png') }}" alt="" width="150">
                     </a>
   
    <ul class="navbar-nav d-flex flex-column mt-3 w-100">
        <li class="nav-item w-100">
            <a href="{{route('index')}}" class="nav-link text-dark pl-4">Home</a>
        </li>
        <li class="nav-item w-100">
            <a href="#" class="nav-link text-dark pl-4">Catagory</a>
        </li>
        <li class="nav-item w-100">
            <a href="#" class="nav-link text-dark pl-4">Sub Catagory</a>
        </li>
        <li class="nav-item w-100">
            <a href="#" class="nav-link text-dark pl-4">Service</a>
        </li>
        <li class="nav-item w-100" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <a href="#" class="nav-link text-dark pl-4">Service Dropdown</a>

            <div class="collapse" id="collapseExample"> 
                 <a href="#" class="nav-link text-dark pl-4 ms-3">Sub Catagory</a> 
            </div>
        </li>
       
            


        <!-- <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-dark pl-4" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Catagory</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <li><a href="#" class="dropdown-item text-dark pl-4 p-2">Add Catagory</a></li>
                <li><a href="#" class="dropdown-item text-dark pl-4 p-2">Catagory List</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-dark pl-4" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Sub Catagory</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <li><a href="#" class="dropdown-item text-dark pl-4 p-2">Add Sub Catagory</a></li>
                <li><a href="#" class="dropdown-item text-dark pl-4 p-2">Sub Catagory List</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-dark pl-4" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Service</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <li><a href="#" class="dropdown-item text-dark pl-4 p-2">Add Service</a></li>
                <li><a href="#" class="dropdown-item text-dark pl-4 p-2">Service List</a></li>
            </ul>
        </li> -->
        <li class="nav-item w-100">
            <a href="#" class="nav-link text-dark pl-4">Shop Profile</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('logout')}}" class="nav-link text-dark pl-4">Logout</a>
        </li>
   

    </ul>
</nav>
<div class="b-example-divider" id="sidebar_shade"></div>