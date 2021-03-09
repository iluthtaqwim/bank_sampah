 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Dashboard</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- Small boxes (Stat box) -->
             <div class="row">
                 <div class="col-lg-1 col-12 "></div>
                 <div class="col-lg-2 col-12 ">
                     <!-- small box -->
                     <div class="small-box bg-info">
                         <div class="inner">
                             <?php foreach ($rw1 as $data) : ?>
                                 <h3>Rp <?php echo $data->jmltabungan1; ?></h3>

                                 <p>RW 01</p>
                             <?php endforeach; ?>
                         </div>
                         <div class="icon">
                             <i class="ion ion-stats-bars"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- ./col -->
                 <div class="col-lg-2 col-12 ">
                     <!-- small box -->
                     <div class="small-box bg-success">
                         <div class="inner">
                             <?php foreach ($rw2 as $data2) : ?>
                                 <h3>Rp <?php echo $data2->jmltabungan2; ?></h3>

                                 <p>RW 02</p>
                             <?php endforeach; ?>
                         </div>
                         <div class="icon">
                             <i class="ion ion-stats-bars"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- ./col -->
                 <div class="col-lg-2 col-12 ">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                         <div class="inner">
                             <?php foreach ($rw3 as $data) : ?>
                                 <h3>Rp <?php echo $data->jmltabungan3; ?></h3>

                                 <p>RW 03</p>
                             <?php endforeach; ?>
                         </div>
                         <div class="icon">
                             <i class="ion ion-stats-bars"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <!-- ./col -->
                 <div class="col-lg-2 col-12 ">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                         <div class="inner">
                             <?php foreach ($rw4 as $data2) : ?>
                                 <h3>Rp <?php echo $data2->jmltabungan4; ?></h3>

                                 <p>RW 04</p>
                             <?php endforeach; ?>
                         </div>
                         <div class="icon">
                             <i class="ion ion-stats-bars"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <div class="col-lg-2 col-12 ">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                         <div class="inner">
                             <?php foreach ($rw5 as $data2) : ?>
                                 <h3>Rp <?php echo $data2->jmltabungan5; ?></h3>

                                 <p>RW 05</p>
                             <?php endforeach; ?>
                         </div>
                         <div class="icon">
                             <i class="ion ion-stats-bars"></i>
                         </div>
                         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 <div class="col-lg-1 col-12 "></div>
                 <!-- ./col -->
             </div>
             <!-- /.row -->
             <!-- Main row -->
            
             <!-- /.row (main row) -->
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->