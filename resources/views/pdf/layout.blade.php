
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{public_path('css/app.css')}}">
        <title>@yield('title')</title>

    </head>
    <body>
        <style>
        </style>
        <header>
              <!--div class="col-md-12 text-right">
                <img src="{{ public_path() . '/images/logo_upz_20_aniv_324x327.webp'}}" width="200px">
            </div-->
          <br>
          <br>
          <!--  @yield('title_report') -->
          <h3> @yield('title') </h3>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                    	@yield('listComponent')
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <small>|    UPZ Fresnillo   |
            <a href="http://www.upz.edu.mx"  target="_blank">www.upz.edu.mx</a></small>
        </footer>
    </body>
</html>
