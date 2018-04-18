<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Panel</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('css/backend/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend/matrix-style.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend/matrix-media.css') }}" />
<link href="{{asset('fonts/backend/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/backend/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header" style="margin-bottom:30px; padding-left:20px;">
  <img src="{{Auth::user('admin')->avatar}}" style="width:100px; height:100px; border-radius:50%;" />
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{Auth::user('admin')->firstname}}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="icon-key"></i> Log Out
                                    </a>

                                    <form id="logout-form" action="{{route('admin.logout')}}" method="get" style="display: none;">
                                        @csrf
                                    </form></li>
      </ul>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar" style="margin-top:20px;"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
     <li class="submenu"> <a href="#"><i class="icon icon-file"></i><span>Manage Faculties</span></a>
      <ul>
        <li><a href="/faculties">View Faculties</a></li>
        <li><a href="/faculties/create">Add Faculty</a></li>
      </ul>
    </li>
   
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Manage Departments</span></a>
      <ul>
         <li><a href="/departments">View Departments</a></li>
        <li><a href="/departments/create">Add Department</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Manage Students</span></a>
      <ul>
         <li><a href="/students">View Students</a></li>
        <li><a href="/students/create">Add Student</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Manage Courses</span></a>
      <ul>
        <li><a href="/courses">View Courses</a></li>
        <li><a href="/courses/create">Add Course</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">


<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="/faculties"> FACULTIES<br>{{$facultyCount}} </a> </li>
        <li class="bg_lg"> <a href="/departments"></i> DEPARTMENTS<br>{{$departmentCount}}</a> </li>
        <li class="bg_ly"> <a href="/students">  STUDENTS<br>{{$studentCount}} </a> </li>
        <li class="bg_lo"> <a href="/courses"> COURSES<br>{{$courseCount}}</a> </li>
      </ul>
    </div>
  </div>
<!--End-Action boxes-->    

      
      
          
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              <img src="images/backend/demo/demo-image1.jpg" alt="demo-image"/></div>
            <div id="tab2" class="tab-pane"> <img src="images/backend/demo/demo-image2.jpg" alt="demo-image"/>
              <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment.</p>
            </div>
            <div id="tab3" class="tab-pane">
            
              <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. </p>
              <img src="images/backend/demo/demo-image3.jpg" alt="demo-image"/></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->

<script src="{{asset('js/backend/excanvas.min.js')}}"></script> 
<script src="{{asset('js/backend/jquery.min.js')}}"></script> 
<script src="{{asset('js/backend/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('js/backend/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/backend/jquery.flot.min.js')}}"></script> 
<script src="{{asset('js/backend/jquery.flot.resize.min.js')}}"></script> 
<script src="{{asset('js/backend/jquery.peity.min.js')}}"></script> 
<script src="{{asset('js/backend/fullcalendar.min.js')}}"></script> 
<script src="{{asset('js/backend/matrix.js')}}"></script> 
<script src="{{asset('js/backend/matrix.dashboard.js')}}"></script> 
<script src="{{asset('js/backend/jquery.gritter.min.js')}}"></script> 
<script src="{{asset('js/backend/matrix.interface.js')}}"></script> 
<script src="{{asset('js/backend/matrix.chat.js')}}"></script> 
<script src="{{asset('js/backend/jquery.validate.js')}}"></script> 
<script src="{{asset('js/backend/matrix.form_validation.js')}}"></script> 
<script src="{{asset('js/backend/jquery.wizard.js')}}"></script> 
<script src="{{asset('js/backend/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/backend/select2.min.js')}}"></script> 
<script src="{{asset('js/backend/matrix.popover.js')}}"></script> 
<script src="{{asset('js/backend/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('js/backend/matrix.tables.js')}}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
