<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>  
        @include('includes.head')
    </head>
    <body class="bodyy" >
        <header>
            @include('includes.header')
        </header>
        <div class="main" style="width: 75%">
            <div class="container-fluid">
                <div class="row-fluid">
                

                    <div class="container padd2" >
                        @include('includes.menu')
                    </div> 

                    </div>
                    </div>

            <div class="container">
                <div class="row-fluid padd">
                    <div class="col-md-4  offset-md-0 ">
                        @include('includes.sidebar')
                    </div>
                    
                    <div class="col-md-8 offset-md-0">
                        @yield('content')
                    </div>

                </div>
                </div> 
            


        </div>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>