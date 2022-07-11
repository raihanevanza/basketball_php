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
  <?php  
    if (isset($_POST["simpan"])) {
      @$id_bbm = $_POST["id_bbm"];      
      @$ket_bbm = $_POST["ket_bbm"];            
      @$databb_male = mysqli_fetch_assoc(mysqli_query($db, "SELECT MAX(no_bbm) AS Mno_bbm FROM bb_male"));      
      @$newno_bbm = "";            
      if($databb_male["Mno_bbm"] != ""){
        @$getlastno_bbm = substr($databb_male["Mno_bbm"], 1, 1) + 1;        
        $newno_bbm = "L".$getlastno_bbm."";        
        if(mysqli_query($db, "INSERT INTO bb_male(no_bbm, id_bbm, ket_bbm) VALUES('".$newno_bbm."', '".$id_bbm."', '".$ket_bbm."')")){
          echo "<script>alert('Data berhasil disimpan!');</script>";
        }else{
          echo "<script>alert('Error!');</script>";
        }
      }else{
        $newno_bbm = "L1";        
      }      
    }

    if (isset($_GET["edit"])){
      @$id = $_GET["id"];
      @$sql = mysqli_query($db, "SELECT * FROM bb_male WHERE no_bbm = '".$id."'");
      @$edit = mysqli_fetch_assoc($sql);
    }

    if (isset($_POST["update"])) {
      @$id = $_GET["id"];
      @$id_bbm = $_POST["id_bbm"];      
      @$ket_bbm = $_POST["ket_bbm"];
      if(mysqli_query($db, "UPDATE bb_male SET id_bbm = '$id_bbm', ket_bbm = '$ket_bbm' WHERE no_bbm = '$id'")){
        echo "<script>alert('Data berhasil diupdate!');document.location.href='bb_laki.php';</script>";
      }else{
        echo "<script>alert('Error!');</script>";
      }
    }

    if (isset($_GET["delete"])){
      @$id = $_GET["id"];      
      if(mysqli_query($db, "DELETE FROM bb_male WHERE no_bbm = '".$id."'")){
        echo "<script>alert('Data berhasil dihapus!');document.location.href='bb_laki.php';</script>";
      }else{
        echo "<script>alert('Error!');</script>";
      }
    }
  ?>
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include("sidebar.php");
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">          

        <div class="page-header">
          <h3 class="entry-title">Form Berat Badan Laki-laki</h3>
        </div>   

        <div class="dropdown-divider"></div>                  

        <div class="card-body col-md-6">
          <form  method="post">
            <div class="form-group">
              <label>Berat</label>
              <div class="form-label-group">
                <input type="text" id="id_bbm" name="id_bbm" value="<?php echo @$edit["id_bbm"]; ?>" class="form-control" placeholder="Berat" required="required" autofocus="autofocus" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <div class="form-label-group">
                <input type="text" id="ket_bbm" name="ket_bbm" value="<?php echo @$edit["ket_bbm"]; ?>" class="form-control" placeholder="Keterangan" required="required" autofocus="autofocus" autocomplete="off">
              </div>
            </div>   
            <div class="form-row">                                    
            <?php if (@$_GET["id"] == ""){ ?>      
              <div class="col-md-6">
                <button type="submit" name="simpan" class="btn btn-primary btn-success btn-block">Simpan</button>              
              </div> 
            <?php }else{ ?>            
              <div class="col-md-6">                
                <button type="submit" name="update" class="btn btn-primary btn-warning btn-block text-white">Update</button>                 
              </div> 
            <?php } ?>            
              <div class="col-md-6">                
                <a href="bb_laki.php" class="btn btn-primary btn-block">Refresh</a>                            
              </div>  
            </div>            
          </form>          
        </div>

        <div class="dropdown-divider"></div>

        <div class="card-body">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Data Table Berat Badan Laki-laki</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Berat</th>  
                      <th>Keterangan</th>  
                      <th>Aksi</th>                                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      @$no = 0;
                      @$query = mysqli_query($db, "SELECT * FROM bb_male ORDER BY no_bbm");
                      while (@$data = mysqli_fetch_array($query)) {                                              
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data["id_bbm"]; ?></td>      
                      <td><?php echo $data["ket_bbm"]; ?></td>      
                      <td>
                        <a class="text-warning" href="?edit&id=<?php echo $data["no_bbm"]; ?>"><i class="fa fa-edit"></i></a>
                        <a class="text-danger" href="?delete&id=<?php echo $data["no_bbm"]; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                      </td>                                      
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

</body>

</html>
