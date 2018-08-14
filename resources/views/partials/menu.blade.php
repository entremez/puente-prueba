<div class="menu" id="navbar">
  <div class="container">
  <div class="row">
    <div class="col-md-12 offset-md-1">
      <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ url('/images/logo.png') }}"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto flex-row">  <!--ml-auto alinea a derecha-->
            @if(Auth::check())
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->email }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                      <div class="dropdown-divider"></div>
                      <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Cerrar sesión
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
            @else
            <li class="nav-item"> <!-- active para negritas -->
              <a class="nav-link" href="{{ route('login') }}"><i class="material-icons">account_circle</i><span class="mb-3">Inicia sesión</span></a>
            </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">  <!--ml-auto alinea a derecha-->
          <li class="nav-item"> <!-- active para negritas -->
            <a class="nav-link" href="{{ route('cases') }}">Casos de diseño en los negocios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('evaluate') }}">Evalúa tu empresa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('providers-list') }}">Proveedores de diseño</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Recursos</a>
          </li>
        </ul>
      </div>
    </nav>
    </div>
  </div>
</div>
</div>