<nav class="navbar navbar-expand d-flex flex-column align-item-start p-0" id="sidebar">
    <a href="{{route('admin_index')}}" class="   text-dark text-decoration-none mt-3">
        <img class="logo mx-auto d-block" src="{{ asset('assets/images/logo_final.png') }}" alt="" width="150">
    </a>

    <ul class="navbar-nav d-flex flex-column mt-3 w-100">
        <li class="nav-item w-100">
            <a href="{{route('admin_index')}}" class="nav-link text-dark pl-4">Home</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('branch')}}" class="nav-link text-dark pl-4">Branch</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('catagory')}}" class="nav-link text-dark pl-4">Catagory</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('sub_catagory')}}" class="nav-link text-dark pl-4">Sub Catagory</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('product')}}" class="nav-link text-dark pl-4">Product</a>
        </li>
        <li class="nav-item w-100" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <a href="#" class="nav-link text-dark pl-4">Website</a>

            <div class="collapse" id="collapseExample">
                <a href="#" class="nav-link text-dark pl-4 ms-3">Slider</a>
            </div>
        </li>

{{--        <li class="nav-item w-100">--}}
{{--            <a href="#" class="nav-link text-dark pl-4">Shop Profile</a>--}}
{{--        </li>--}}
        <li class="nav-item w-100">
            <a href="{{route('logout')}}" class="nav-link text-dark pl-4">Logout</a>
        </li>
    </ul>
</nav>
<div class="b-example-divider" id="sidebar_shade"></div>
