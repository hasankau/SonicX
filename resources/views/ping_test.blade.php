<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{url('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('assets/js/jspdf.min.js')}}"></script>


    <style>
      /* .search {
        background-color: #fff;
        padding: 4px;
        border-radius: 5px
    } */

    .search-1 {
        position: relative;
        width: 100%
    }

    .search-1 input {
        height: 45px;
        border: none;
        width: 100%;
        padding-left: 34px;
        padding-right: 10px;
        border-right: 2px solid #eee
    }

    .search-1 input:focus {
        border-color: none;
        box-shadow: none;
        outline: none
    }

    .search-1 i {
        position: absolute;
        top: 12px;
        left: 5px;
        font-size: 24px;
        color: #eee
    }

    ::placeholder {
        color: #eee;
        opacity: 1
    }

    .search-2 {
        position: relative;
        width: 100%
    }

    .search-2 input {
        height: 45px;
        border: none;
        width: 100%;
        padding-left: 18px;
        padding-right: 100px
    }

    .search-2 input:focus {
        border-color: none;
        box-shadow: none;
        outline: none
    }

    .search-2 i {
        position: absolute;
        top: 12px;
        left: -10px;
        font-size: 24px;
        color: #eee
    }

    .search-2 button {
        position: absolute;
        right: 1px;
        top: 0px;
        border: none;
        height: 45px;
        background-color: red;
        color: #fff;
        width: 90px;
        border-radius: 4px
    }

    @media (max-width:800px) {
        .search-1 input {
            border-right: none;
            border-bottom: 1px solid #eee
        }

        .search-2 i {
            left: 4px
        }

        .search-2 input {
            padding-left: 34px
        }

        .search-2 button {
            height: 37px;
            top: 5px
        }
    }

    .loading{
      background-image: url("src/loading.gif");
        background-size: 150px;
        background-position: center;
        background-repeat: no-repeat;
    }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
                  <span>Admin</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('dashboard')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('latency_test')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Monitoring</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('speedtest_ookla')}}">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Analysing</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('security_scan')}}">
              <span class="menu-icon">
                <i class="mdi mdi-magnify"></i>
              </span>
              <span class="menu-title">Run scan</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('netstat')}}">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Network Statistics</span>
            </a>
          </li>
          
          <br>
          <br>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#" onclick="$('#add_web_modal').modal()">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Add Website</span>
            </a>
          </li> 
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('my_websites')}}" >
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">My Websites</span>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search services">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a onclick="$('#add_web_modal').modal()" class="nav-link btn btn-success create-new-button"  href="#">+ Add New Website</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::user()->name}}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item preview-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
		  <div id="toprowsub">
  <div class="center">
    <h6>Ping <span class="text-warning" id="pc"></span> <span id="ping"></span> | Internet Speed: <span class="text-success" id="speed"></span></h6>
  </div>
</div>
<!--Toprow END-->
<!--SubPage MiddleRow Begin-->



<!-- <div id="midrow"> -->

<div class="row">
<div class="col-md-12">
                  
                  <div>
                      <div class="search-2"> <i class='bx bxs-map'></i>
                          <input list="url-list" id="url" name="url" type="url" placeholder="Website URL">


                          <datalist id="url-list">
                          @foreach($web as $row)
  <option value="{{$row['url']}}">
    @endforeach
</datalist>

                          <button onclick="start()">Scan</button>
                      </div>
                  </div>
              </div>
</div>

  <div class="col-xl-10">
    <div id="result">
  <canvas id="myChart" style="height: 300px"></canvas>

  </div>

  <pre style='font-size: 12px' id="nmap"></pre>
  </div>

  <div id="editor"></div>
  <button class="btn btn-info btn-md" id="download">Download Report</button>
  <button onclick="printdiv('nmap')" class="btn btn-warning btn-md">Print</button>

<!-- </div> -->

<script>

var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#download').click(function () {
    doc.fromHTML($('#nmap').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('scan-report.pdf');
});
          

var ctx = $("#myChart");

var chart;

$(function(){

  //get the line chart canvas

  //line chart data
  var data = {
    labels: ["0", "5", "10", "15", "20", "25", "30", "35", "40", "45", "50"],
    datasets: [
      {
        label: "Speed",
        data: [],
        backgroundColor: "blue",
        borderColor: "lightblue",
        fill: false,
        lineTension: 0,
        radius: 5
      },
    ]
  };

  //options
  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "Latency Graph",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    },
    scales: {
      yAxes: [{
                    ticks: {
                      beginAtZero: true,
                      suggestedMax: 600,
                      stepSize: 100,
                      fontColor: 'rgba(255, 255, 255)' // makes grid lines from y axis red
                   },
                            gridLines: {
                            color: 'rgba(255, 255, 255, 0.2)' // makes grid lines from y axis red
                            }
                        }],

                        xAxes: [{
                    ticks: {
                      beginAtZero: true,
                      suggestedMax: 50,
                      stepSize: 2.5,
                      fontColor: 'rgba(255, 255, 255)' // makes grid lines from y axis red
                   },
                            gridLines: {
                            color: 'rgba(255, 255, 255, 0.2)' // makes grid lines from y axis red
                            }
                        }],
    },

    
  };

  //create Chart class object
  chart = new Chart(ctx, {
    type: "line",
    data: data,
    options: options
  });
});

var i = 30;
function addData(data) {
    // var n = i+5;
    // chart.data.labels.push(n+'');
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}


function removeData() {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}


// function updateChart(index, data) {
//   ctx.data.datasets[index].data = data;
//   ctx.update();
// }

// updateChart(getData(numItems));

// document.getElementById('num-items-input').addEventListener('change', function(e) {
//   numItems = +e.target.value;
//   updateChart(getData(numItems));
// });

// document.getElementById('update-button').addEventListener('click', function() {
//   updateChart(getData(numItems));
// });


$(document).ready(function() {
  // getLatency();
  getHostname();
  // getNmapLatency();
});


// setInterval(getLatency, 1000);
// setInterval(getSpeed, 1000);

function start(){
  removeData();
  getHostname();
  setInterval(getLatency, 1000);
  setInterval(getNmapLatency, 1000);
}

function getLatency() {

  
  if($('#url').val()==""){

  
$.ajax({

    method: "GET",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'test/ping',
    cache: false,
    data: '',
    "_token": "{{ csrf_token() }}",
    dataType: "text",

    beforeSend: function(data) {

    },
    error: function(xhr, status, error) {
        // alert(xhr.responseText);
    },
    success: function(data) {
      // alert(data)
      $('#ping').html(data);
      // updateChart(i, data);
      i = i+1;
    }
});
  }else{
    getLatencyURL();
  }
}


function getLatencyURL() {
$.ajax({

    method: "GET",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'test/pingURL',
    cache: false,
    data: 'url='+$('#url').val(),
    "_token": "{{ csrf_token() }}",
    dataType: "text",

    beforeSend: function(data) {

    },
    error: function(xhr, status, error) {
        console.log(xhr.responseText);
    },
    success: function(data) {
      // alert(data)
      $('#ping').html(data);
      addData(data);
    }
});
}


function getSpeed() {
$.ajax({

    method: "GET",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'test/speed',
    cache: false,
    data: '',
    "_token": "{{ csrf_token() }}",
    dataType: "text",

    beforeSend: function(data) {

    },
    error: function(xhr, status, error) {
        console.log(xhr.responseText);
    },
    success: function(data) {
      // alert(data)
      $('#speed').html(data);
      // updateChart(i, data);
      i = i+1;
    }
});
}


function getHostname() {

$.ajax({

    method: "GET",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'test/hostname',
    cache: false,
    data: 'url='+$('#url').val(),
    "_token": "{{ csrf_token() }}",
    dataType: "text",

    beforeSend: function(data) {
      $("#pc").addClass('loading');
    },
    error: function(xhr, status, error) {

      $("#pc").addClass('loading');
    },
    success: function(data) {
      $("#pc").removeClass('loading');
      $('#pc').html(data);     
    }
});
}


function getNmapLatency() {

$.ajax({

    method: "GET",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'test/nmaprun',
    cache: false,
    data: 'url='+$('#url').val(),
    "_token": "{{ csrf_token() }}",
    dataType: "text",

    beforeSend: function(data) {

    },
    error: function(xhr, status, error) {

        console.log(xhr.responseText);
    },
    success: function(data) {
      $('#nmap').html(data);     
    }
});
}


function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}


</script>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('assets/js/off-canvas.js')}}"></script>
    <script src="{{url('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('assets/js/misc.js')}}"></script>
    <script src="{{url('assets/js/settings.js')}}"></script>
    <script src="{{url('assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

    @include('add_website')
  </body>
</html>