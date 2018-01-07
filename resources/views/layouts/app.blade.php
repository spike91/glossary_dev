<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>  
        @include('includes.head')
    </head>
    <body class="bg">
        <header>
            @include('includes.header')
        </header>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="menuPadding">
                    @include('includes.menu')</div>
                        <div class="container contentPadding content" >
                            <div class="row">
                                <div class="col-md-4  offset-md-0">
                                    @include('includes.sidebar')
                                </div>
                                <div class="col-md-8 offset-md-0">
                                    @yield('content')
                                </div>
                                </div>
                            </div> 
                        </div>
                </div>
        </div> 
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>


