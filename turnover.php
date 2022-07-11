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
      @$ket_to = $_POST["ket_to"];      
      if(mysqli_query($db, "INSERT INTO turnover(ket_to) VALUES('".$ket_to."')")){
        echo "<script>alert('Data berhasil disimpan!');</script>";
      }else{
        echo "<script>alert('Error!');</script>";
      }      
    }

    if (isset($_GET["edit"])){
      @$id = $_GET["id"];
      @$sql = mysqli_query($db, "SELECT * FROM turnover WHERE id_to = '".$id."'");
      @$edit = mysqli_fetch_assoc($sql);
    }

    if (isset($_POST["update"])) {
      @$id = $_GET["id"];
      @$ket_to = $_POST["ket_to"];            
      if(mysqli_query($db, "UPDATE turnover SET ket_to = '$ket_to' WHERE id_to = '$id'")){
        echo "<script>alert('Data berhasil diupdate!');document.location.href='training_club.php';</script>";
      }else{
        echo "<script>alert('Error!');</script>";
      }
    }

    if (isset($_GET["delete"])){
      @$id = $_GET["id"];      
      if(mysqli_query($db, "DELETE FROM turnover WHERE id_to = '".$id."'")){
        echo "<script>alert('Data berhasil dihapus!');document.location.href='training_club.php';</script>";
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
          <h3 class="entry-title">Form Training Club</h3>
        </div>   

        <div class="dropdown-divider"></div>                  

        <div class="card-body col-md-6">
          <form  method="post">
            <div class="form-group">
              <label>Keterangan</label>
              <div class="form-label-group">
                <input type="text" id="ket_to" name="ket_to" value="<?php echo @$edit["ket_to"]; ?>" class="form-control" placeholder="Keterangan" required="required" autofocus="autofocus" autocomplete="off">
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
                <a href="training_club.php" class="btn btn-primary btn-block">Refresh</a>                            
              </div>  
            </div>            
          </form>          
        </div>

        <div class="dropdown-divider"></div>

        <div class="card-body">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Data Table Keterangan Training Club</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Keterangan</th>  
                      <th>Aksi</th>                                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      @$no = 0;
                      @$query = mysqli_query($db, "SELECT * FROM turnover ORDER BY id_to");
                      while (@$data = mysqli_fetch_array($query)) {                                              
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data["ket_to"]; ?></td>      
                      <td>
                        <a class="text-warning" href="?edit&id=<?php echo $data["id_to"]; ?>"><i class="fa fa-edit"></i></a>
                        <a class="text-danger" href="?delete&id=<?php echo $data["id_to"]; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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
