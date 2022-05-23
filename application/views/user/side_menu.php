 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('dashboard');?>" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/efarina1.png" alt="Efarina Logo" class="brand-image">
      <span class="brand-text font-weight-light">Tools Efarina</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a>Hi, <?php echo $this->session->userdata('nama_lengkap'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('u_dashboard')?>" <?=$this->uri->segment(1) == 'u_dashboard' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"'?>>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-<?=$this->uri->segment(1) == 'u_karyawan' || $this->uri->segment(1) == 'u_rkk' ? 'open"' : ''?>">
            <a href="#" class="nav-link <?=$this->uri->segment(1) == 'u_karyawan' || $this->uri->segment(1) == 'u_rkk' ? 'active"' : ''?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>u_karyawan" <?=$this->uri->segment(1) == 'u_karyawan' ? 'class="nav-link active"' : 'class="nav-link"'?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>u_rkk" <?=$this->uri->segment(1) == 'u_rkk' ? 'class="nav-link active"' : 'class="nav-link"'?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Asuhan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('u_supervisi');?>"<?=$this->uri->segment(1) == 'u_supervisi' ? 'class="nav-link active"' : 'class="nav-link"'?>>
              <i class="nav-icon fas fa-book"></i>
              <p>
                Supervisi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('u_penilaian');?>"<?=$this->uri->segment(1) == 'u_penilaian' ? 'class="nav-link active"' : 'class="nav-link"'?>>
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Penilaian
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-<?=$this->uri->segment(2) == 'u_supervisi' || $this->uri->segment(2) == 'u_penilaian' ? 'open"' : ''?>">
            <a href="#" class="nav-link <?=$this->uri->segment(2) == 'u_supervisi' || $this->uri->segment(2) == 'u_penilaian' ? 'active"' : ''?>">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="<?php echo base_url();?>u_laporan/supervisi/" <?=$this->uri->segment(2) == 'supervisi' ? 'class="nav-link active"' : 'class="nav-link"'?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supervisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('u_laporan/penilaian');?>" <?=$this->uri->segment(2) == 'penilaian' ? 'class="nav-link active"' : 'class="nav-link"'?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penilaian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Users</li>          
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url('user');?>" <?=$this->uri->segment(1) == 'user' ? 'class="nav-link active"' : 'class="nav-link"'?>>
                <i class="nav-icon far fa-user"></i>
                <p>
                  Pengguna
                </p>
              </a>
            </li>
            <li class="nav-header">Aksesibilitas</li>          
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url('login/logout');?>" class="nav-link">
                <i class="nav-icon far fa-window-close"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div> 
    </div>
  </aside>