<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand text-dark fs-4" href="#">
      
      <img src="/img/log.jpg" alt="foto" width="5%" class="img-thumbnail" />
        <b>E-Warung Tanjung Lubuk</b>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
        <b><ul class="navbar-nav ">
          <!-- <li class="nav-item ">
            <a class="nav-link  {{ ($tittle === "Home") ? 'active' :'' }} " href="/" >Home</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link  {{ ($tittle === "Blog") ? 'active' :'' }} " href="/blog">CEK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ ($tittle === "About") ? 'active' :'' }}" href="/about">ABOUT</a>
          </li>
         

          <!-- <li class="nav-item">
            <a class="nav-link  {{ ($tittle === "Categories") ? 'active' :'' }}" href="/categories">Categories</a>
          </li> -->

          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard">My Dashboard <i class="bi bi-layout-text-window-reverse"></i></a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
              <form action="/logout" method="post">
                @csrf
                  <button type="submit" class="dropdown-item"> LogOut <i class="bi bi-box-arrow-right"></i></button>
              </form>
               </li>
            </ul>
          </li>

          @else

          <li class="nav-item">
            <a class="nav-link  {{ ($tittle === "Login") ? 'active' :'' }}" href="/login">LOGIN</a>
          </li>

          @endauth


        </ul></b>
      </div>
    </div>
  </nav>
