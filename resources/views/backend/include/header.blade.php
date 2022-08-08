 <!-- main-header -->
 <div class="main-header sticky side-header nav nav-item">
     <div class="container-fluid">
         <div class="main-header-left ">
             <div class="responsive-logo">
                 <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/img') }}/brand/logo.png"
                         class="logo-1" alt="logo"></a>
                 <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/img') }}/brand/logo-white.png"
                         class="dark-logo-1" alt="logo"></a>
                 <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/img') }}/brand/favicon.png"
                         class="logo-2" alt="logo"></a>
                 <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/img') }}/brand/favicon.png"
                         class="dark-logo-2" alt="logo"></a>
             </div>
             <div class="app-sidebar__toggle" data-toggle="sidebar">
                 <a class="open-toggle" href="#"><i class="fas fa-bars"></i></a>
                 <a class="close-toggle" href="#"><i class="fas fa-bars"></i></a>
             </div>
         </div>
         <div class="main-header-right">
             <div class="nav nav-item  navbar-nav-right ml-auto">
                 <div class="nav-link" id="bs-example-navbar-collapse-1">
                     <a href="{{ url('/') }}" target="_blank" style="line-height: 3;" class="text-dark"><i
                             class="fas fa-globe fa-sm"></i> View Website</a>
                 </div>


                 <div class="dropdown nav-item main-header-notification">
                     <a class="new nav-link" onclick="notifications()" href="#">
                         <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                             <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                             <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                         </svg><span class=" pulse"></span></a>
                     <div class="dropdown-menu">
                         <div class="menu-header-content bg-primary text-left">
                             <div class="d-flex">
                                 <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications
                                 </h6>
                             </div>
                             <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have <span
                                     id="notification-count"></span> unread Notifications</p>
                         </div>
                         <div class="main-notification-list notification-all">
                             <div class="text-center py-5 d-none notification-spinner">
                                 <div class="spinner-border text-primary" role="status">
                                     <span class="sr-only"></span>
                                 </div>
                             </div>
                         </div>
                         <div class="dropdown-footer">
                             <a href="javascript:">READ ALL</a>
                         </div>
                     </div>
                 </div>

                 <div class="nav-item full-screen fullscreen-button">
                     <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                             class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-maximize">
                             <path
                                 d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                             </path>
                         </svg></a>
                 </div>

                 <div class="dropdown main-profile-menu nav nav-item nav-link">
                     <a class="profile-user d-flex" href="">
                         <img alt="{{ Auth::user()->name }}"
                             src="{{ asset(file_exists(Auth::user()->avatar) ? Auth::user()->avatar : 'backend/img/faces/6.jpg') }}"></a>
                     <div class="dropdown-menu">
                         <div class="main-header-profile bg-primary p-3">
                             <div class="d-flex wd-100p">
                                 <div class="main-img-user"><img alt="{{ Auth::user()->lname }}"
                                         src="{{ asset(file_exists(Auth::user()->avatar) ? Auth::user()->avatar : 'backend/img/faces/6.jpg') }}"
                                         class=""></div>
                                 <div class="ml-3 my-auto">
                                     <h6>{{ Auth::user()->lname }}</h6>
                                 </div>
                             </div>
                         </div>

                         <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                 class="fas fa-sign-out-alt text-secondary fs-5"></i> Sign Out</a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /main-header -->
