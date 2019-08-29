<header class="header-section">
    <div class="container-fluid">
        <!-- logo -->
        <div class="site-logo">
            <a href="{{url('/')}}"> <img src="{{ asset('user/img/logo.png') }}" alt="logo"></a>
            
        </div>
        <!-- responsive -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        <div class="header-right">
            <a href="{{route('cart')}}" class="card-bag"><img src="img/icons/bag.png" alt=""><span>{{ App\Cart::where('coustomer_ip','127.0.0.1')->count()}}</span></a>
            <a href="#" class="search"><img src="img/icons/search.png" alt=""></a>
        </div>
        <!-- site menu -->
        <ul class="main-menu">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="#">Woman</a></li>
            <li><a href="#">Man</a></li>
            <li><a href="#">LookBook</a></li>
            <li><a href="#">Blog</a></li>
        <li><a href="{{ url('/contact')}}">Contact</a></li>
        </ul>
    </div>
</header>