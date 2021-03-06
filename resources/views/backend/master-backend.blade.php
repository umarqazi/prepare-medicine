<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin Dashboard - Prepare Medicine</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Custom Js && Css --}}
    @yield('js-css')
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ url('/') }}" target="_blank">User Interface</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{ url('/account/change-password') }}"><i class="fa fa-user fa-lg"></i> Change Password</a></li>
            <li><a class="dropdown-item showModal_changeEmail" href="#"><i class="fa fa-user fa-lg"></i> Change Email</a></li>
            <li class="nav-item dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="//s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name ?? '' }}</p>
          <p class="app-sidebar__user-designation">Admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-question-circle"></i><span class="app-menu__label">Questions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ url('admin/question/single') }}"><i class="icon fa fa-circle-o"></i> Questions view</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Categories</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ url('admin/category') }}"><i class="icon fa fa-circle-o"></i> Categories</a></li>
          </ul>
        </li>
        {{-- <li><a class="app-menu__item " href="{{ url('admin/feedback') }}"><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Feedback manage</span></a></li> --}}
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-group"></i><span class="app-menu__label">Plab Community</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ url('admin/Community/whatsapp') }}"><i class="icon fa fa-circle-o"></i> WhatsApp Groups</a></li>
            <li><a class="treeview-item" href="{{ url('admin/Community/facebook') }}"><i class="icon fa fa-circle-o"></i> Facebook Groups/Page</a></li>
            <li><a class="treeview-item" href="{{ route('admin.getCommunityQuestionsList') }}"><i class="icon fa fa-circle-o"></i> Community Questions</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Team Work</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ url('admin/ui/about-us') }}"><i class="icon fa fa-circle-o"></i> About Us</a></li>
            <li><a class="treeview-item" href="{{ url('admin/ui/our-team') }}"><i class="icon fa fa-circle-o"></i> Our Team</a></li>
            <li><a class="treeview-item" href="{{ url('admin/ui/volunteer') }}"><i class="icon fa fa-circle-o"></i> Become a Volunteer</a></li>
            <li><a class="treeview-item" href="{{ url('admin/ui/about-exam') }}"><i class="icon fa fa-circle-o"></i> About Plab Exam</a></li>
            {{-- <li><a class="treeview-item" href="{{ url('admin/ui/plab-news') }}"><i class="icon fa fa-circle-o"></i>News & Updates</a></li> --}}
            <li><a class="treeview-item" href="{{ url('admin/ui/useful-link') }}"><i class="icon fa fa-circle-o"></i> Useful Links</a></li>
            {{-- <li><a class="treeview-item" href="{{ url('admin/ui/work-for-us') }}"><i class="icon fa fa-circle-o"></i> Work For Us</a></li> --}}
            <li><a class="treeview-item" href="{{ url('admin/ui/disclaimer') }}"><i class="icon fa fa-circle-o"></i> Disclaimer</a></li>
            <li><a class="treeview-item" href="{{ url('admin/ui/faq') }}"><i class="icon fa fa-circle-o"></i> FAQ</a></li>
            <li><a class="treeview-item" href="{{ url('admin/ui/lab-value') }}"><i class="icon fa fa-circle-o"></i> Lab Value</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item " href="{{ url('admin/recall-exam') }}"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Recall Exam</span></a></li>
        <li><a class="app-menu__item " href="{{ url('admin/notification') }}"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Notification</span></a></li>
        <li><a class="app-menu__item " href="{{ route('get_users_list') }}"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Users</span></a></li>
        <li><a class="app-menu__item " href="{{ route('subscriber_list') }}"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Subscribers</span></a></li>
        <li><a class="app-menu__item " href="{{ route('subscribers_requests') }}"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Requests</span></a></li>
        <li><a class="app-menu__item " href="{{ route('course-list.index') }}"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Courses</span></a></li>
        <li><a class="app-menu__item " href="{{ route('blog.index') }}"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Blog</span></a></li>
        <li><a class="app-menu__item " href="{{ route('news.index') }}"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">News</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
      </div>
	<!-- There you have to Work -->
	@yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('backend/js/popper.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/js/main.js') }}"></script>
    {{-- Custom Js --}}
    @yield('js')
    
    
    
        <script>
            $(document).ready(function(){
                $(".showModal_changeEmail").on('click', function(e){
                    e.preventDefault()
                    $("#changeEmail__modal").modal('show')
                })
            })
        </script>
        <!-- Modal -->
        <div class="modal fade" id="changeEmail__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_e" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_e">Change Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.updateEmail') }}" method="POST">
                    @csrf
                    <div class='form-group'>
                        <label><b>Current Email</b></label>
                        <input type="email" name='email' value="{{ Auth::user()->email}}" class='form-control' required='1'>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
  </body>
</html>
