  <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Album</strong>
          </a>
            @if (Auth::check())
            <a href="/logout" class="navbar-brand d-flex align-items-center ml-auto">
            <strong>Log out</strong>
            </a>
          <a href="#" class="navbar-brand d-flex align-items-center ml-auto">
            <strong>{{ Auth::user()->name }}</strong>
          </a>
          @endif
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>