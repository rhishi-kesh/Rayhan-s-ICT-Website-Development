<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
    </ul>
    <div class="d-block d-lg-none">
      <img src="{{ asset('storage/companyInformation/'. $companyInformation->logo) }}" class="dark-logo" width="180" alt="" />
      <img src="{{ asset('storage/companyInformation/'. $companyInformation->logo) }}" class="light-logo"  width="180" alt="" />
    </div>
    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="p-2">
        <i class="ti ti-dots fs-7"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <div class="d-flex align-items-center justify-content-between">
        <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
          <i class="ti ti-align-justified fs-7"></i>
        </a>
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
            <li>
                @if (auth()->user()->role == 0)
                <a href="{{ route('register') }}" class="btn btn-info mt-2 me-3 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16v6"></path>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                    </svg>
                    <span class="ms-2">Add New User</span>
                </a>
                @endif
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                    <div class="user-profile-img">
                        <img src="{{ empty(Auth::user()->profile) ? url('profile.jpeg') : url('storage/profile/') . '/' . Auth::user()->profile }}" class="rounded-circle" width="35" height="35" alt="" />
                    </div>
                    </div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                    <div class="profile-dropdown position-relative" data-simplebar>
                    <div class="py-3 px-7 pb-0">
                        <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                    </div>
                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                        <img src="{{ empty(Auth::user()->profile) ? url('profile.jpeg') : url('storage/profile/') . '/' . Auth::user()->profile }}" class="rounded-circle" width="80" height="80" alt="" />
                        <div class="ms-3">
                        <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                        </div>
                    </div>
                    <div class="message-body">
                        <a href="{{ route('profile') }}" class="py-10 mb-1 px-7 mt-8 d-flex align-items-center justify-content-center bg-info text-white p-6">
                          <span class="d-flex align-items-center justify-content-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                  <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                               </svg>
                          </span>
                          <div class="d-inline-block v-middle ps-3">
                            <h6 class="mb-1 bg-hover-dark text-white fw-semibold">Profile Settings</h6>
                          </div>
                        </a>
                        <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="py-8 px-7 mt-10 d-flex align-items-center justify-content-center text-center bg-info text-white text-uppercase">
                          <div class="d-inline-block v-middle ps-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M9 12h12l-3 -3"></path>
                                <path d="M18 15l3 -3"></path>
                             </svg>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-flex align-items-center justify-content-center">
                          @csrf
                          <span>
                            <span>Logout</span>
                            </span>
                        </form>
                        </a>

                      </div>
                    </div>
                </div>
            </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
