<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="col-sm-3 col-md-2 mr-0" href="<?php echo base_url() ?>admin">
                <span style="width:100%;
                color:#fff;white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;  ">Dashboard - <?php
                    print_r('Welcome ' . $this->session->userdata['fullname']);
                  ?>
              </span>
    </a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="<? echo base_url()?>admin">
                  <span data-feather="home"></span>
                  Buat Post Baru
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<? echo base_url()?>admin/postlist">
                  <span data-feather="book"></span>
                  Daftar Post
                </a>
              </li>
          </ul>
          <hr/>
          <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="<? echo base_url()?>logout">
                  <span data-feather="log-out"></span>
                  Logout
                </a>
              </li>
          </ul>

        </div>
      </nav>