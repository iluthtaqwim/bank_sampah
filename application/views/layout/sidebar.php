 <!-- Main Sidebar Container -->

 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a class="brand-link">
         <img src="dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="<?php echo base_url() ?>" class="<?php if ($this->uri->segment(1) == "") {
                                                                    echo "active";
                                                                } ?> nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>

                 </li>

                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-usd"></i>
                         <p>
                             Transaksi
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo site_url() ?>transaksi/" class="<?php if ($this->uri->segment(1) == "transaksi") {
                                                                                        echo "active";
                                                                                    } ?> nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Histori Transaksi</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo site_url() ?>transaksi/tambah_transaksi" class="<?php if ($this->uri->segment(2) == "tambah_transaksi") {
                                                                                                        echo "active";
                                                                                                    } ?> nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Tambah Transaksi</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item treeview">
                     <a href="<?php echo site_url() ?>datarw1" class="<?php if ($this->uri->segment(1) == "datarw1") {
                                                                            echo "active";
                                                                        } ?> nav-link">
                         <i class="nav-icon fas fa-table"></i>
                         <p>
                             Data Nasabah
                         </p>
                     </a>
                 </li>




             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>