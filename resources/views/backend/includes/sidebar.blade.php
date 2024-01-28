<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="index-2.html" class="text-nowrap logo-img">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg" class="light-logo"  width="180" alt="" />
      </a>
      <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8 text-muted"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <!-- ============================= -->
        <!-- Home -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <!-- =================== -->
        <!-- Dashboard -->
        <!-- =================== -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('index') }}" aria-expanded="false" target="_blank">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                    <path d="M3.6 9h16.8"></path>
                    <path d="M3.6 15h16.8"></path>
                    <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                    <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                 </svg>
            </span>
            <span class="hide-menu">Visit Site</span>
          </a>
        </li>
        <!-- ============================= -->
        <!-- Apps -->
        <!-- ============================= -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Admin</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
            <span class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12.684 3.27l.084 .09l4.7 5.64h3.532a1 1 0 0 1 .991 1.131l-.02 .112l-1.984 7.918c-.258 1.578 -1.41 2.781 -2.817 2.838l-.17 .001l-10.148 -.002c-1.37 -.053 -2.484 -1.157 -2.787 -2.57l-.035 -.185l-2 -8a1 1 0 0 1 .857 -1.237l.113 -.006h3.53l4.702 -5.64a1 1 0 0 1 1.452 -.09zm-.684 8.73a3 3 0 0 0 -2.98 2.65l-.015 .174l-.005 .176l.005 .176a3 3 0 1 0 2.995 -3.176zm0 -6.438l-2.865 3.438h5.73l-2.865 -3.438z" stroke-width="0" fill="currentColor"></path>
                 </svg>
            </span>
            <span class="hide-menu">Course</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('department') }}" class="sidebar-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Department</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('courses') }}" class="sidebar-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Courses</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
              <span class="d-flex">
                <i class="ti ti-user-circle"></i>
              </span>
              <span class="hide-menu">About</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a href="{{ route('adminAbout') }}" class="sidebar-link">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                  </div>
                  <span class="hide-menu">About</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="{{ route('companyInformation') }}" class="sidebar-link">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                  </div>
                  <span class="hide-menu">Company Information</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="{{ route('hero') }}" class="sidebar-link">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                  </div>
                  <span class="hide-menu">Hero</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="{{ route('workspace') }}" class="sidebar-link ">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="ti ti-circle"></i>
                  </div>
                  <span class="hide-menu">Workspace</span>
                </a>
              </li>
            </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('successStory') }}" aria-expanded="false">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-accessible" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" /><circle cx="12" cy="7.5" r=".5" fill="currentColor" /></svg>
            </span>
            <span class="hide-menu"> Success Stroy </span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('meetOurMentors') }}" aria-expanded="false">
            <span class="fa fa-users"></span>
            <span class="hide-menu"> Meet Our Mentors </span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('review') }}" aria-expanded="false">
            <span class="fas fa-comment-dots"></span>
            <span class="hide-menu"> Review </span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
