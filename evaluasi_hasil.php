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
          <h3 class="entry-title">Peserta Terpilih Tim Basket</h3>
        </div>             

        <div class="dropdown-divider"></div>

        <div class="card-body">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Data Table Peserta Laki-laki</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class=" table table-striped"  width="100%" cellspacing="0">
                  <thead>
                  <tr class="table-primary">
                      <th>No</th>
                      <th>Nama</th>                        
                      <th>Berat Badan</th>
                      <th>Tinggi Badan</th>
                      <th>Posisi</th>  
                      <th>Field Goal</th>      
                      <th>Nilai Akhir</th>                                                              
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
              
              $sql2 = "select max(id_pertandingan) as pertandingan,
                        max(id_fisik) as fisik,
                        max(id_fieldgoal) as fieldgoal,
                        max(id_to) as tc,
                        max(umur) as umur FROM evaluasi_hasil";
              $query2 = mysqli_query($db,$sql2);
              $result = mysqli_fetch_array($query2);
                      @$no = 0;
                      @$query = mysqli_query($db, "
                        SELECT a.*, b.ket_pertandingan, c.id_bbm, c.ket_bbm, d.id_bbf, d.ket_bbf, e.ket_fisik, f.ket_fieldgoal, g.ket_to,
                        (SUM(CASE 
                          WHEN a.id_pertandingan = 1 THEN (1/$result[pertandingan])*0.25
                          WHEN a.id_pertandingan = 2 THEN (2/$result[pertandingan])*0.25
                            ELSE (3/$result[pertandingan])*0.25
                        END)+
                        SUM(CASE 
                          WHEN a.id_fisik = 1 THEN (1/$result[fisik])*0.15
                          WHEN a.id_fisik = 2 THEN (2/$result[fisik])*0.15
                            ELSE (3/$result[fisik])*0.15
                        END)+
                        SUM(CASE 
                          WHEN a.id_fieldgoal = 1 THEN (1/$result[fieldgoal])*0.30
                          WHEN a.id_fieldgoal = 2 THEN (2/$result[fieldgoal])*0.30
                            ELSE (3/$result[fieldgoal])*0.30
                        END)+
                        SUM(CASE 
                          WHEN a.id_to = 1 THEN (1/$result[tc])*0.20
                          WHEN a.id_to = 2 THEN (2/$result[tc])*0.20
                            ELSE (3/$result[tc])*0.20
                        END)+SUM((a.umur/$result[umur])*-0.10)) AS NilaiAkhir                        
                        FROM evaluasi_hasil a
                        INNER JOIN pertandingan b ON a.id_pertandingan = b.id_pertandingan
                        LEFT JOIN bb_male c ON a.bb = c.no_bbm
                        LEFT JOIN bb_fmale d ON a.bb = d.no_bbf
                        INNER JOIN fisik e ON a.id_fisik = e.id_fisik
                        INNER JOIN fieldgoal f ON a.id_fieldgoal = f.id_fieldgoal
                        INNER JOIN turnover g ON a.id_to = g.id_to
                        WHERE jk = 'L'
                        GROUP BY a.id_eval
                        ORDER BY NilaiAkhir DESC
                        LIMIT 10
                      ");
                      while (@$data = mysqli_fetch_array($query)) {                                              
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data["nama"]; ?></td>                            
                      <td><?php echo ($data["id_bbm"] == null ? $data["id_bbf"] : $data["id_bbm"]); ?></td>
                      <td><?php echo ($data["ket_fisik"] == null ? $data["ket_fisik"] : $data["ket_fisik"]); ?></td>
                      <td><?php echo ($data["ket_bbm"] == null ? $data["ket_bbm"] : $data["ket_bbm"]); ?></td>
                      <td><?php echo ($data["ket_fieldgoal"] == null ? $data["ket_fieldgoal"] : $data["ket_fieldgoal"]); ?></td> 
                      <td><?php echo ($data["NilaiAkhir"] == null ? $data["NilaiAkhir"] : $data["NilaiAkhir"]); ?></td> 
                        
                          
                                                                                      
                    </tr>                              
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>            
          </div>   
        </div>                        

        <div class="dropdown-divider"></div>

        <div class="card-body">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Data Table Peserta Perempuan</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped  "  width="100%" cellspacing="0">
                  <thead>
                    <tr class="table-danger">
                      <th>No</th>
                      <th>Nama</th>                        
                      <th>Berat Badan</th>
                      <th>Tinggi Badan</th>
                      <th>Posisi</th> 
                      <th>Field Goal</th>
                      <th>Nilai Akhir</th>                                                                                 
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      @$no = 0;
                      @$query = mysqli_query($db, "
                        SELECT a.*, b.ket_pertandingan, c.id_bbm, c.ket_bbm, d.id_bbf, d.ket_bbf, e.ket_fisik, f.ket_fieldgoal, g.ket_to,
                        (SUM(CASE 
                          WHEN a.id_pertandingan = 1 THEN (1/$result[pertandingan])*0.25
                          WHEN a.id_pertandingan = 2 THEN (2/$result[pertandingan])*0.25
                            ELSE (3/$result[pertandingan])*0.25
                        END)+
                        SUM(CASE 
                          WHEN a.id_fisik = 1 THEN (1/$result[fisik])*0.15
                          WHEN a.id_fisik = 2 THEN (2/$result[fisik])*0.15
                            ELSE (3/$result[fisik])*0.15
                        END)+
                        SUM(CASE 
                          WHEN a.id_fieldgoal = 1 THEN (1/$result[fieldgoal])*0.30
                          WHEN a.id_fieldgoal = 2 THEN (2/$result[fieldgoal])*0.30
                            ELSE (3/$result[fieldgoal])*0.30
                        END)+
                        SUM(CASE 
                          WHEN a.id_to = 1 THEN (1/$result[tc])*-0.20
                          WHEN a.id_to = 2 THEN (2/$result[tc])*-0.20
                            ELSE (3/$result[tc])*-0.20
                        END)+SUM((a.umur/$result[umur])*-0.10)) AS NilaiAkhir                        
                        FROM evaluasi_hasil a
                        INNER JOIN pertandingan b ON a.id_pertandingan = b.id_pertandingan
                        LEFT JOIN bb_male c ON a.bb = c.no_bbm
                        LEFT JOIN bb_fmale d ON a.bb = d.no_bbf
                        INNER JOIN fisik e ON a.id_fisik = e.id_fisik
                        INNER JOIN fieldgoal f ON a.id_fieldgoal = f.id_fieldgoal
                        INNER JOIN turnover g ON a.id_to = g.id_to
                        WHERE jk = 'P'
                        GROUP BY a.id_eval
                        ORDER BY NilaiAkhir DESC
                        LIMIT 10
                      ");
                      while (@$data = mysqli_fetch_array($query)) {                                              
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data["nama"]; ?></td>                            
                      <td><?php echo ($data["id_bbm"] == null ? $data["id_bbf"] : $data["id_bbm"]); ?></td>
                      <td><?php echo ($data["ket_fisik"] == null ? $data["ket_fisik"] : $data["ket_fisik"]); ?></td>
                      <td><?php echo ($data["ket_bbf"] == null ? $data["ket_bbf"] : $data["ket_bbf"]); ?></td>
                      <td><?php echo ($data["ket_fieldgoal"] == null ? $data["ket_fieldgoal"] : $data["ket_fieldgoal"]); ?></td> 
                         <td><?php echo ($data["NilaiAkhir"] == null ? $data["NilaiAkhir"] : $data["NilaiAkhir"]); ?></td>   
              
                    </tr>                              
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>            
          </div>   
        </div>

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
  <script type="text/javascript">
    $(document).ready(function(){
      $('#dtpl').DataTable();
      $('#dtpp').DataTable();
      $("#datam").hide();
      $("#dataf").hide(); 
      if($('#L').is(':checked')) {
        $("#datam").show();      
        $("#dataf").hide();
        $("#bbm").attr("name", "bb");
        $("#bbf").removeAttr("name");
      }      
      if($('#P').is(':checked')) {
        $("#datam").hide();
        $("#dataf").show();
        $("#bbm").removeAttr("name");
        $("#bbf").attr("name", "bb");
      }
    });
    $('#L').click(function() {      
      $("#datam").show();      
      $("#dataf").hide();
      $("#bbm").attr("name", "bb");
      $("#bbf").removeAttr("name");          
    });
    $('#P').click(function() {
      $("#datam").hide();
      $("#dataf").show();
      $("#bbm").removeAttr("name");
      $("#bbf").attr("name", "bb");
    });
  </script>

</body>

</html>
