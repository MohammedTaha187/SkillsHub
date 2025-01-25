<nav id="nav">
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="/">{{ __("lang.home") }}</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">{{ __("lang.categories") }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($cats as $cat)
                    <li><a href="{{ url("/categories/show/$cat->id") }}">{{ $cat->name() }}</a></li>
                @endforeach

            </ul>
        </li>
        <li><a href="{{ url("/messages") }}">{{ __("lang.contact") }} </a></li>
        @guest
            <li><a href="{{ '/login' }}">{{ __("lang.login") }} </a></li>
        <li><a href="{{ '/register' }}">{{ __("lang.register") }} </a></li>
        @endguest
        
      @auth
         <form id="logout-form" action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" style="background: none; border: none;">{{ __("lang.logout") }}</button>
        </form>     
      @endauth
        
            
        
        
        <li><a href="{{ url("lang/set/ar") }}">ع </a></li>
        <li><a href="{{ url("lang/set/en") }}">EN </a></li>
    </ul>
</nav>
