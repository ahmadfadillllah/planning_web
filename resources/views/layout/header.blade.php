<header class="">
               <div class="topbar">
               <div class="container-fluid">
                    <div class="navbar-header">
                         <div class="d-flex align-items-center gap-2">
                              <!-- Menu Toggle Button -->
                              <div class="topbar-item">
                                   <button type="button" class="button-toggle-menu topbar-button">
                                        <i class="ri-menu-2-line fs-24"></i>
                                   </button>
                              </div>

                              <!-- App Search-->
                              <form class="app-search d-none d-md-block me-auto">
                                   <div class="position-relative">
                                        <input type="search" class="form-control border-0" placeholder="Search..." autocomplete="off" value="">
                                        <i class="ri-search-line search-widget-icon"></i>
                                   </div>
                              </form>
                         </div>

                         <div class="d-flex align-items-center gap-1">
                              <!-- Theme Color (Light/Dark) -->
                              <div class="topbar-item">
                                   <button type="button" class="topbar-button" id="light-dark-mode">
                                        <i class="ri-moon-line fs-24 light-mode"></i>
                                        <i class="ri-sun-line fs-24 dark-mode"></i>
                                   </button>
                              </div>

                              <!-- Category -->
                              <div class="dropdown topbar-item d-none d-lg-flex">
                                   <button type="button" class="topbar-button" data-toggle="fullscreen">
                                        <i class="ri-fullscreen-line fs-24 fullscreen"></i>
                                        <i class="ri-fullscreen-exit-line fs-24 quit-fullscreen"></i>
                                   </button>
                                </div>

                              <!-- Theme Setting -->
                              <div class="topbar-item d-none d-md-flex">
                                   <button type="button" class="topbar-button" id="theme-settings-btn" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                                        <i class="ri-settings-4-line fs-24"></i>
                                   </button>
                              </div>

                              <!-- User -->
                              <div class="dropdown topbar-item">
                                   <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="d-flex align-items-center">
                                             @php
                                                $avatar = Auth::user()->avatar;
                                                $nik = Auth::user()->nik;
                                                $avatarUrl = $avatar == 'gbr.jpg' ? asset('app/assets/images/users/avatar.png') : "http://10.72.4.202:86/asset/file/{$nik}/{$avatar}";
                                            @endphp

                                            <img class="rounded-circle" width="32" src="{{ $avatarUrl }}" alt="avatar">
                                        </span>
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <h6 class="dropdown-header">Semangat pagi, {{ Auth::user()->name }}!</h6>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Swal.fire({ icon: 'info', title: 'Fitur belum tersedia', text: 'Fitur ini belum difungsikan.', confirmButtonText: 'OK' })">
                                             <iconify-icon icon="solar:lock-keyhole-broken" class="align-middle me-2 fs-18"></iconify-icon><span class="align-middle">Profile</span>
                                        </a>

                                        <div class="dropdown-divider my-1"></div>

                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                             <iconify-icon icon="solar:logout-3-broken" class="align-middle me-2 fs-18"></iconify-icon><span class="align-middle">Logout</span>
                                        </a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div></div>
          </header>
