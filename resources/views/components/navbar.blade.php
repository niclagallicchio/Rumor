
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
       <img src="{{asset('images/logoipsum-294.svg')}}" alt="">{{config('app.name')}} </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          
          
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @guest
                
           
            <li class="nav-item">
              <a class="nav-link" href="/register">Registrati</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/login">Accedi</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('articles.index')}}">Articoli</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('categories.index')}}">Categorie</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->email }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger ms-2">Esci</button>
                    </form>
                </li>
                @endguest
              </ul>
            </li>
          </ul>
      </div>
    </div>
  </nav>