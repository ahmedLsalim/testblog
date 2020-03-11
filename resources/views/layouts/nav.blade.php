<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="http://localhost:8000/">Home</a>
      @if(Auth::user())
      <a class="nav-link" href="http://localhost:8000/posts/create">create post</a>
      @endif
      <a class="nav-link" href="#">Press</a>
      <a class="nav-link" href="#">New hires</a>
      <a class="nav-link" href="#">About</a>
      @if (Auth::user())
      <hr>

          <li class="dropdown">
              <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <ul class="dropdown-menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
          @else
          <hr>
          <li><a class="nav-link" href="{{ route('login') }}">Login</a></li> <hr>
          <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @endif



    </nav>
  </div>
</div>
