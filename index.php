<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php
    include("title.php");    
    include("style.php");
  ?>      
</head>

<body id="page-top">

  <!-- nav -->
  <?php
    include("header.php");
  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include("sidebar.php");
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">          
        <div class="page-header">
          <h3 class="entry-title">Sistem Pendukung Keputusan (SPK) dengan implementasi Metode SAW</h3>
        </div>      
        <div class="dropdown-divider"></div>
        <div class="entry-content">
          <img src="gambar/basket.png" style="position: relative; display: block; margin-left: auto; margin-right: auto; clear: both; opacity: 25%; margin-top: 50px;">
          <h5 style=" position: absolute; margin-top: -430px;">Pengertian Metode Simple Additive Weighting</h5>
          <p style="text-align: justify; position: absolute; margin-top: -400px; display: block; margin-right: 10px;">
            Metode Simple Additive Weighting (SAW) adalah salah satu metode yang dapat digunakan untuk mengambil sebuah keputusan. Metode ini sering kali dikenal sebagai algoritma dengan metode penjumlahan berbobot. Metode ini membutuhkan proses normalisasi matriks keputusan (X) ke suatu skala yang dapat dengan semua rating dari alternatif yang tersedia. SAW ini merupakan metode yang paling terkenal dan banyak sekali digunakan untuk masalah Multiple Attribute Decision Making (MADM), buat yang belum tau MADM itu sendiri adalah suatu metode untuk mencari alternatif yg optimal dari sejumlah alternatif dengan kriteria tertentu.
          </p>
          <h5 style=" position: absolute; margin-top: -270px;">Deskripsi Project</h5>
           <p style="text-align: justify;  position: absolute; margin-top: -240px; margin-right: 10px;">
            Project ini befungsi untuk pemilihan 10 pemain basket Putra dan Putri U-20 untuk provisi jawa barat. Yang mana sebelumnya pemain menjalankan Training Camp (TC) selama seminggu. Lalu untuk penilaian bobot nya berdasarkan pada : <br>
            - Pertandingnan (25%)<br>
            - Fisik (15%)<br>
            - Field Goal (30%)<br>
            - Turnover (20%)<br>
            - Umur (10%)<br>
             Nanti nya hasil pengolahan diatas akan ditampilkan di halaman Peserta Terpilih.
          </p>
        </div>   
        <!-- DataTables Example -->
        <!-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                  </tr>                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> -->

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php
        include("footer.php");
      ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php  
    include("script.php");
  ?> 

</body>

</html>
