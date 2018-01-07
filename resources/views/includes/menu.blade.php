<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <form class="form-inline my-2 my-lg-0"  action="{{ LaravelLocalization::getLocalizedURL(null, '/search', [], true) }}" method="get">
        {{ csrf_field() }}
            <input class="form-control mr-sm-2" id='search' type="search" placeholder="{{__('sidebar.search')}}" aria-label="Search" name="find">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">@lang('sidebar.search')</button>
        </form>


        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="nav-item active">
                @if($properties['name'] != LaravelLocalization::getCurrentLocaleName())<a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ mb_convert_case($properties['native'], MB_CASE_TITLE, "UTF-8") }}
                </a>
                @endif
            </li>
            @endforeach
        </ul>
  

        <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->

        @if (Auth::guest())
            <li class="nav-item active"><a class="nav-link proba" href="{{ LaravelLocalization::getLocalizedURL(null, '/login', [], true) }}">@lang('sidebar.login')</a></li>
            <li class="nav-item active"><a class="nav-link proba" href="{{ LaravelLocalization::getLocalizedURL(null, '/register', [], true) }}">@lang('sidebar.register')</a></li>
        @else
            @if( Auth::user()->isAdmin())
                <li class="nav-item active"><a class="nav-link proba" href="{{ LaravelLocalization::getLocalizedURL(null, '/dashboard', [], true) }}">@lang('sidebar.dashboard')</a></li>
            @endif
            <li class="dropdown">
                <a href="#" class="dropdown-toggle proba" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                <li>
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL(null, '/glossary/user/id='.Auth::user()->id, [], true) }}">@lang('sidebar.glossary')</a>
                    </li>
                    <li>
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL(null, '/logout', [], true) }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            @lang('sidebar.logout')
                        </a>
                        <form id="logout-form" action="{{ LaravelLocalization::getLocalizedURL(null, '/logout', [], true) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    </div>
</nav>

<!-- <script>
  $( function($name) {
    var availableTags = [];
    $.ajax({
            url: '{{ url('search-live=') }}' + $('#search').val(),
            dataType: 'json',
            success: function (data) {
                availableTags = data;
                echo(data);

            },
            error: function (data) {
            }
        });

    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script> -->



