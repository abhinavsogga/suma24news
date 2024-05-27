<nav class="navbar-vertical navbar navbar-dark">
     <div class="vh-100" data-simplebar>
         <!-- Brand logo -->
         <a class="navbar-brand" href="/"  target="_blank">
             <img src="{{ asset('assets/img/logo_white.png') }}" alt="" >
         </a>
         <!-- Navbar nav -->
         <ul class="navbar-nav flex-column" id="sideNavbar">
        

             <li class="nav-item">
                 <a class="nav-link" href="/" target="_blank">
                 <i class="nav-icon fe fe-home me-2"></i> Visit Site
                 </a>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link   collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navDashboard" aria-expanded="false"
                     aria-controls="navDashboard">
                     <i class="nav-icon fe fe-book-open me-2"></i> CMS
                 </a>
                 <div id="navDashboard" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <!-- Nav item -->
                         <li class="nav-item ">
                             <a class="nav-link "
                                 href="{{ route('news.index') }}">
                                 All News
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a class="nav-link "
                                 href="{{ route('news.create') }}">
                                 New News
                             </a>
                         </li>
                         <li class="nav-item ">
                             <a class="nav-link "
                                 href="{{ route('categories.index') }}">
                                 Category
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('pages.index') }}">
                     <i class="nav-icon fe fe-file me-2"></i> About Suma
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link   collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navGallery" aria-expanded="false"
                     aria-controls="navGallery">
                     <i class="nav-icon fe fe-camera me-2"></i> Gallery
                 </a>
                 <div id="navGallery" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item ">
                             <a class="nav-link "
                                 href="{{ route('photo-gallery.index') }}">
                                 Photos
                             </a>
                         </li>
                         <!-- Nav item -->
                         <li class="nav-item ">
                             <a class="nav-link "
                                 href="{{ route('video-gallery.index') }}">
                                 Videos
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>

             <li class="nav-item">
                 <a class="nav-link" href="{{ route('users.index') }}">
                     <i class="nav-icon fe fe-user me-2"></i> Users
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link" href="{{ route('user.visit') }}">
                     <i class="nav-icon fe fe-user me-2"></i> User Visits
                 </a>
             </li>

             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('settings.index') }}">
                     <i class="nav-icon fe fe-settings me-2"></i> Settings
                 </a>
             </li>
         </ul>
     </div>
 </nav>