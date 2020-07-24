<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fluid App</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>
<body class="bg-light">
  <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2><a href="{{ url('/') }}">Fluid App</a></h2>
    <p class="lead">Cadastro de Clientes</p>
  </div>
    @yield('main')
  </div>
  <!-- Footer -->

  <footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© 2020 Fluid App</div>
  </footer>
<!-- Footer -->
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>