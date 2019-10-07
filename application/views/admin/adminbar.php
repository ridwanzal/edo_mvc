<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="col-sm-3 col-md-2 mr-0" href="<?php echo base_url() ?>dashboard">Dashboard
    </a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#"><span data-feather="bell"></span>&nbsp;&nbsp;<span style="">Notification</span></a>
      </li>
    </ul>
    <div class="dropdown px-3">
      <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown">
        Welcome Admin ...
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item small" href="<?php echo base_url() ?>"><span data-feather="log-out"></span>&nbsp;&nbsp;Log out</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="<? echo base_url()?>adminpage">
                <span data-feather="home"></span>
                Create New Content
              </a>
            </li>
          </ul>
          <hr/>

        </div>
      </nav>