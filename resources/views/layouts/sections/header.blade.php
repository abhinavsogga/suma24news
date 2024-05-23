<!DOCTYPE html>
<html lang="en">

<head>  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Codescandy">



<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="../../../assets/images/favicon/favicon.ico">


<!-- Libs CSS -->
<link href="../../../assets/fonts/feather/feather.css" rel="stylesheet">
<link href="../../../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="../../../assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="../../../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">




<!-- Theme CSS -->
<link rel="stylesheet" href="../../../assets/css/theme.min.css">
  <title>Products | Geeks - Academy Admin Template</title>
</head>

<body>
  <!-- Wrapper -->
  <div id="db-wrapper">
    <!-- navbar vertical -->
     <!-- Sidebar -->
 <nav class="navbar-vertical navbar navbar-dark">
     <div class="vh-100" data-simplebar>
         <!-- Brand logo -->
         <a class="navbar-brand" href="../../../index.html">
             <img src="../../../assets/images/brand/logo/logo-inverse.svg" alt="" >
         </a>
         <!-- Navbar nav -->
         <ul class="navbar-nav flex-column" id="sideNavbar">
             <li class="nav-item">
                 <a class="nav-link   collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navDashboard" aria-expanded="false"
                     aria-controls="navDashboard">
                     <i class="nav-icon fe fe-home me-2"></i> Dashboard
                 </a>
                 <div id="navDashboard" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item ">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-dashboard.html">
                                 Overview
                             </a>
                         </li>
                         <!-- Nav item -->
                         <li class="nav-item ">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/dashboard-analytics.html">
                                 Analytics

                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item">
                 <a class="nav-link  collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navCourses" aria-expanded="false"
                     aria-controls="navCourses">
                     <i class="nav-icon fe fe-book me-2"></i> Courses
                 </a>
                 <div id="navCourses" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-course-overview.html">
                                 All Courses
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-course-category.html">
                                 Courses Category
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-course-category-single.html">
                                 Category Single
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link   collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navProfile" aria-expanded="false"
                     aria-controls="navProfile">
                     <i class="nav-icon fe fe-user me-2"></i> User
                 </a>
                 <div id="navProfile" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-instructor.html">
                                 Instructor
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-students.html">Students</a>
                         </li>
                     </ul>
                 </div>
             </li>

             <!-- Nav item -->
             <li class="nav-item ">
                 <a class="nav-link   collapsed  " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navCMS" aria-expanded="false" aria-controls="navCMS">
                     <i class="nav-icon fe fe-book-open me-2"></i> CMS
                 </a>
                 <div id="navCMS" class="collapse  "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link   "
                                 href="../../../pages/dashboard/admin-cms-overview.html">
                                 Overview
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/admin-cms-post.html">
                                 All Post
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-cms-post-new.html">
                                 New Post
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/admin-cms-post-category.html">
                                 Category
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item ">
                 <a class="nav-link   collapsed  " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navProject" aria-expanded="false"
                     aria-controls="navProject">
                     <i class="nav-icon fe fe-file me-2"></i> Project
                 </a>
                 <div id="navProject" class="collapse  "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link   "
                                 href="../../../pages/dashboard/project-grid.html">
                                 Grid
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/project-list.html">
                                 List
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link   collapsed  "
                                 href="#" data-bs-toggle="collapse" data-bs-target="#navprojectSingle"
                                 aria-expanded="false" aria-controls="navprojectSingle">

                                 Single
                             </a>
                             <div id="navprojectSingle"
                                 class="collapse "
                                 data-bs-parent="#navProject">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/project-overview.html">
                                             Overview
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/project-task.html">
                                             Task
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/project-budget.html">
                                             Budget
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/project-team.html">
                                             Team
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/project-files.html">
                                             Files
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/project-summary.html">
                                             Summary
                                         </a>
                                     </li>

                                 </ul>
                             </div>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/add-project.html">
                                 Create Project
                             </a>
                         </li>









                     </ul>
                 </div>
             </li>






             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link  collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navAuthentication" aria-expanded="false"
                     aria-controls="navAuthentication">
                     <i class="nav-icon fe fe-lock me-2"></i> Authentication
                 </a>
                 <div id="navAuthentication" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/sign-in.html">Sign In</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/sign-up.html">Sign Up</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/forget-password.html">
                                 Forget Password
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/notification-history.html">
                                 Notifications
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/404-error.html"> 404 Error</a>
                         </li>
                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navecommerce" aria-expanded="false"
                     aria-controls="navecommerce">
                     <i class="nav-icon fe fe-shopping-bag me-2"></i> Ecommerce
                 </a>
                 <div id="navecommerce" class="collapse  show "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link   " href="#"
                                 data-bs-toggle="collapse" data-bs-target="#navproduct" aria-expanded="false"
                                 aria-controls="navproduct">

                                 Product
                             </a>
                             <div id="navproduct"
                                 class="collapse  show "
                                 data-bs-parent="#navProduct">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/ecommerce/product-grid.html">Grid</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/ecommerce/product-grid-with-sidebar.html">Grid
                                             Sidebar</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link  active "
                                             href="../../../pages/dashboard/ecommerce/products.html">Products</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/ecommerce/product-single.html">Product
                                             Single</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="../../../pages/dashboard/ecommerce/product-single-v2.html">Product
                                             Single v2</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link  "
                                             href="../../../pages/dashboard/ecommerce/add-product.html">Add Product</a>
                                     </li>

                                 </ul>
                             </div>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/shopping-cart.html">Shopping Cart</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/checkout.html">Checkout</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/order.html">Order</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/order-single.html">Order Single</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/order-history.html">Order History</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/order-summary.html">Order Summary</a>
                         </li>


                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/customers.html">Customers</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/customer-single.html">Customer Single</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/ecommerce/add-customer.html">Add Customer</a>
                         </li>




                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link  collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navlayouts" aria-expanded="false"
                     aria-controls="navlayouts">
                     <i class="nav-icon fe fe-layout me-2"></i> Layouts
                 </a>
                 <div id="navlayouts" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/layouts/layout-horizontal.html">Top</a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/layouts/layout-compact.html">
                                 Compact
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  "
                                 href="../../../pages/dashboard/layouts/layout-vertical.html">Vertical</a>
                         </li>

                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <div class="nav-divider"></div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <div class="navbar-heading">Apps</div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link "
                     href="../../../pages/dashboard/chat-app.html">
                     <i class="nav-icon fe fe-message-square me-2"></i> Chat

                 </a>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link "
                     href="../../../pages/dashboard/task-kanban.html">
                     <i class="nav-icon mdi mdi-trello me-2"></i>
                     Task
                 </a>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link "
                     href="../../../pages/dashboard/mail.html">
                     <i class="nav-icon mdi mdi-email-outline me-2"></i>
                     Mail
                 </a>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link "
                     href="../../../pages/dashboard/calendar.html">
                     <i class="nav-icon mdi mdi-calendar me-2"></i>
                     Calendar
                 </a>
             </li>
             <li class="nav-item">
                 <div class="nav-divider"></div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <div class="navbar-heading">Components</div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link  collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navTables" aria-expanded="false"
                     aria-controls="navTables">
                     <i class="nav-icon fe fe-database me-2"></i> Tables
                 </a>
                 <div id="navTables" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/basic-table.html">
                                 Basic
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/datatables.html">
                                 Data Tables
                             </a>
                         </li>

                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link "
                     href="../../../pages/help-center.html">
                     <i class="nav-icon fe fe-help-circle me-2"></i> Help Center

                 </a>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link  collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navSiteSetting" aria-expanded="false"
                     aria-controls="navSiteSetting">
                     <i class="nav-icon fe fe-settings me-2"></i> Site Setting
                 </a>
                 <div id="navSiteSetting" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/setting-general.html">
                                 General
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/setting-google.html">
                                 Google
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/setting-social.html">
                                 Social
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/setting-social-login.html">
                                 Social Login
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/setting-payment.html">
                                 Payment
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link "
                                 href="../../../pages/dashboard/setting-smpt.html">
                                 SMPT
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link  collapsed " href="#"
                     data-bs-toggle="collapse" data-bs-target="#navMenuLevel" aria-expanded="false"
                     aria-controls="navMenuLevel">
                     <i class="nav-icon fe fe-corner-left-down me-2"></i> Menu Level
                 </a>
                 <div id="navMenuLevel" class="collapse "
                     data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link " href="#"
                                 data-bs-toggle="collapse" data-bs-target="#navMenuLevelSecond" aria-expanded="false"
                                 aria-controls="navMenuLevelSecond">
                                 Two Level
                             </a>
                             <div id="navMenuLevelSecond" class="collapse" data-bs-parent="#navMenuLevel">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="#">NavItem 1</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link "
                                             href="#">NavItem 2</a>
                                     </li>
                                 </ul>
                             </div>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link  collapsed  " href="#"
                                 data-bs-toggle="collapse" data-bs-target="#navMenuLevelThree" aria-expanded="false"
                                 aria-controls="navMenuLevelThree">
                                 Three Level
                             </a>
                             <div id="navMenuLevelThree"
                                 class="collapse "
                                 data-bs-parent="#navMenuLevel">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a class="nav-link  collapsed "
                                             href="#" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThreeOne"
                                             aria-expanded="false" aria-controls="navMenuLevelThreeOne">
                                             NavItem 1
                                         </a>
                                         <div id="navMenuLevelThreeOne"
                                             class="collapse collapse "
                                             data-bs-parent="#navMenuLevelThree">
                                             <ul class="nav flex-column">
                                                 <li class="nav-item">
                                                     <a class="nav-link "
                                                         href="#">
                                                         NavChild Item 1
                                                     </a>
                                                 </li>
                                             </ul>
                                         </div>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link " href="#">Nav
                                             Item 2</a>
                                     </li>
                                 </ul>
                             </div>
                         </li>
                     </ul>
                 </div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <div class="nav-divider"></div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <div class="navbar-heading">Documentation</div>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link" href="../../../docs/index.html">
                     <i class="nav-icon fe fe-clipboard me-2"></i> Documentation
                 </a>
             </li>
             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link" href="../../../docs/changelog.html">
                     <i class="nav-icon fe fe-git-pull-request me-2"></i> Changelog
                     <span class="badge bg-primary ms-2">3.0.1</span>
                 </a>
             </li>
         </ul>
         <!-- Card -->
         <div class="card bg-dark-primary shadow-none text-center mx-4 my-8">
             <div class="card-body py-6">
                 <img src="../../../assets/images/background/giftbox.png" alt="" >
                 <div class="mt-4">
                     <h5 class="text-white">Unlimited Access</h5>
                     <p class="text-white-50 fs-6">
                         Upgrade your plan from a Free trial, to select ‘Business Plan’. Start Now
                     </p>
                     <a href="#" class="btn btn-white btn-sm mt-2">Upgrade Now</a>
                 </div>
             </div>
         </div>
     </div>
 </nav>
    <!-- Page Content -->
    <main id="page-content">
      <div class="header">
    <!-- navbar -->
    <nav class="navbar-default navbar navbar-expand-lg">
        <a id="nav-toggle" href="#">
            <i class="fe fe-menu"></i>
        </a>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center">
                <span class="position-absolute ps-3 search-icon">
                        <i class="fe fe-search"></i>
                    </span>
                <input type="search" class="form-control ps-6" placeholder="Search Entire Dashboard" >
            </form>
        </div>
        <!--Navbar nav -->
        <div class="ms-auto d-flex">
            <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle ">
				<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
				<label class="form-check-label" for="flexSwitchCheckDefault"></label>
			
					   </a>
        <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">
            <li class="dropdown stopevent">
                <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary text-muted" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fe fe-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg" aria-labelledby="dropdownNotification">
                    <div>
                        <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                            <span class="h4 mb-0">Notifications</span>
                            <a href="# " class="text-muted">
                                <span class="align-middle">
                                        <i class="fe fe-settings me-1"></i>
                                    </span>
                            </a>
                        </div>
                        <!-- List group -->
                        <ul class="list-group list-group-flush" data-simplebar style="max-height: 300px;">
                            <li class="list-group-item bg-light">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../../assets/images/avatar/avatar-1.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            >
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course
                                                    Javascript Introduction!
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-success me-1"
                                                        ></span
                                                        >2 hours ago,</span
                                                    >
                                                    <span class="ms-1">2:19 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-info"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as read"
                                        >
                                        </a>
                                        <div>
                                            <a
                                                href="#"
                                                class="bg-transparent"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Remove"
                                            >
                                                <i class="fe fe-x text-muted"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../../assets/images/avatar/avatar-2.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            >
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                <p class="mb-3">
                                                    Just launched a new Courses React for Beginner.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-success me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:20 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../../assets/images/avatar/avatar-3.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            >
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course
                                                    Javascript Introduction!
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-info me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../../assets/images/avatar/avatar-4.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            >
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                <p class="mb-3">
                                                    You earn new certificate for complete the Javascript
                                                    Beginner course.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-award text-warning me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="border-top px-3 pt-3 pb-0">
                            <a href="../../../pages/notification-history.html" class="text-link fw-semi-bold">
                                    See all Notifications
                                </a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- List -->
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="../../../assets/images/avatar/avatar-1.jpg" class="rounded-circle" >
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="../../../assets/images/avatar/avatar-1.jpg" class="rounded-circle" >
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">Annette Black</h5>
                                <p class="mb-0 text-muted">annette@geeksui.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li class="dropdown-submenu dropstart-lg">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                <i class="fe fe-circle me-2"></i> Status
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-success me-2"></span> Online
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-secondary me-2"></span> Offline
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-warning me-2"></span> Away
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-danger me-2"></span> Busy
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../../../pages/profile-edit.html">
                                <i class="fe fe-user me-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../../../pages/student-subscriptions.html">
                                <i class="fe fe-star me-2"></i> Subscription
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="../../../index.html">
                                <i class="fe fe-power me-2"></i> Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        </div>
    </nav>
</div>