<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-columns"></i>
            Dashboard
          </a>
        </li>

        @if(auth()->user()->role == "ewarung")

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            {{-- <span data-feather="file-text"></span> --}}
            <i class="bi bi-file-earmark-text"></i>
            Penerima Bantuan
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('data-barang*') ? 'active' : '' }}" href="/data-barang">
              
              <i class="bi bi-file-earmark-text"></i>
              Data Barang
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('laporan-ewarung*') ? 'active' : '' }}" href="/laporan-ewarung">
                {{-- <span data-feather="file-text"></span> --}}
                <i class="bi bi-file-earmark-text"></i>
                Laporan
              </a>
          </li>

        @endif
        

        @can("admin")

        {{-- <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            
            <i class="bi bi-file-earmark-text"></i>
            Kategori bantuan
          </a>
        </li> --}}

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            {{-- <span data-feather="file-text"></span> --}}
            <i class="bi bi-file-earmark-text"></i>
            Penerima Bantuan
          </a>
        </li>

        {{-- <li class="nav-item">
          <a class="nav-link {{ Request::is('ewarung*') ? 'active' : '' }}" href="/ewarung">
         
            <i class="bi bi-file-earmark-text"></i>
            E - Warung
          </a>
        </li> --}}

        <li class="nav-item">
          <a class="nav-link {{ Request::is('laporan-ewarung*') ? 'active' : '' }}" href="/laporan-ewarung">
              {{-- <span data-feather="file-text"></span> --}}
              <i class="bi bi-file-earmark-text"></i>
              Laporan
            </a>
        </li>

        @endcan

        {{-- ===================================== --}}

        @if(auth()->user()->role == "pb")

        <li class="nav-item">
          <a class="nav-link {{ Request::is('data-barang*') ? 'active' : '' }}" href="/data-barang-pb">
              
              <i class="bi bi-file-earmark-text"></i>
              Data Barang
            </a>
          </li>

        @endif


        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/edit-password">
            <i class="bi bi-key"></i>
            Edit Password
          </a>
        </li>

      </ul>

      {{-- <!-- @can('admin')

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                <i class="bi bi-grid"></i>
                Category
              </a>
          </li>

      </ul>
      @endcan --> --}}

    </div>
  </nav>
 