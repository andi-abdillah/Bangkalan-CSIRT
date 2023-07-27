<div class="lg:drawer-open">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-side">
    <label for="my-drawer-2" class="drawer-overlay"></label>
    <ul class="flex flex-col gap-1.5 w-72 h-full bg-neutral rounded-[20px] p-4 my-auto lg:m-5 backdrop-blur-md bg-neutral drop-shadow-lg">
      <li class="{{ Request::is('dashboard') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              dashboard
            </span>
          </div>
          <span class="self-center">
            Dashboard
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/posts*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/posts" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/posts*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              post_add
            </span>
          </div>
          <span class="self-center">
            My Post
          </span>
        </a>
      </li>
      @can('admin')
      <div class="divider">Administrator</div>
      <li class="{{ Request::is('dashboard/categories*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/categories" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/categories*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              category
            </span>
          </div>
          <span class="self-center">
            Post Category
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/footers*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/footers" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/footers*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              barefoot
            </span>
          </div>
          <span class="self-center">
            Post Footer
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/properties*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/properties" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/properties*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              photo_library
            </span>
          </div>
          <span class="self-center">
            Image Property
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/profils*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/profils" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/profils*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              assignment_ind
            </span>
          </div>
          <span class="self-center">
            Profile
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/files*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/files" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/files*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              description
            </span>
          </div>
          <span class="self-center">
            File RFC2350
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/services*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/services" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/services*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              support_agent
            </span>
          </div>
          <span class="self-center">
            Service
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/keys*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/keys" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/keys*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              vpn_key
            </span>
          </div>
          <span class="self-center">
            PGP Key
          </span>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/guidances*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/guidances" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/guidances*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              developer_guide
            </span>
          </div>
          <span class="self-center">
            File Panduan
          </span>
        </a>
      </li>
      @endcan
      @can('superadmin')
      <li class="{{ Request::is('dashboard/users*') ? 'bg-admin-active' : 'hover:bg-neutral-focus' }} rounded-[12px] overflow-hidden">
        <a href="/dashboard/users" class="flex gap-4 w-full h-full px-4 py-2">
          <div class="flex w-8 h-8 self-center rounded-lg bg-neutral-focus drop-shadow-lg {{ Request::is('dashboard/users*') ? 'icon-active' : '' }}">
            <span class="material-symbols-rounded m-auto">
              group
            </span>
          </div>
          <span class="self-center">
            User Management
          </span>
        </a>
      </li>
      @endcan
    </ul>
  </div>
</div>


<!-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <span data-feather="file-text"></span>
          My Post
        </a>
      </li>
    </ul>

    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid"></span>
          Post Category
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/footers*') ? 'active' : '' }}" href="/dashboard/footers">
          <span data-feather="book"></span>
          Post Footer
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/properties*') ? 'active' : '' }}" href="/dashboard/properties">
          <span data-feather="image"></span>
          Image Property
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/profils*') ? 'active' : '' }}" href="/dashboard/profils">
          <span data-feather="clipboard"></span>
          Profile
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/files*') ? 'active' : '' }}" href="/dashboard/files">
          <span data-feather="file"></span>
          File RFC2350
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/services*') ? 'active' : '' }}" href="/dashboard/services">
          <span data-feather="award"></span>
          Service
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/keys*') ? 'active' : '' }}" href="/dashboard/keys">
          <span data-feather="key"></span>
          PGP Key
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/guidances*') ? 'active' : '' }}" href="/dashboard/guidances">
          <span data-feather="book-open"></span>
          File Panduan
        </a>
      </li>

      @endcan
      @can('superadmin')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
          <span data-feather="users"></span>
          User Management
        </a>
      </li>
      @endcan
    </ul>
  </div>
</nav> -->