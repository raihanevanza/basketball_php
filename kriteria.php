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
      @$nama_kriteria = $_POST["nama_kriteria"];      
      @$bobot = $_POST["bobot"];
      @$attribute = $_POST["attribute"];
      if(mysqli_query($db, "INSERT INTO kriteria(nama_kriteria, bobot, attribute) VALUES('".$nama_kriteria."', '".$bobot."', '".$attribute."')")){
        echo "<script>alert('Data berhasil disimpan!');</script>";
      }else{
        echo "<script>alert('Error!');</script>";
      }      
    }

    if (isset($_GET["edit"])){
      @$id = $_GET["id"];
      @$sql = mysqli_query($db, "SELECT * FROM kriteria WHERE id_kriteria = '".$id."'");
      @$edit = mysqli_fetch_assoc($sql);
    }

    if (isset($_POST["update"])) {
      @$id = $_GET["id"];
      @$nama_kriteria = $_POST["nama_kriteria"];      
      @$bobot = $_POST["bobot"];
      @$attribute = $_POST["attribute"];        
      if(mysqli_query($db, "UPDATE kriteria SET nama_kriteria = '$nama_kriteria', bobot = '$bobot', attribute = '$attribute' WHERE id_kriteria = '$id'")){
        echo "<script>alert('Data berhasil diupdate!');document.location.href='kriteria.php';</script>";
      }else{
        echo "<script>alert('Error!');</script>";
      }
    }

    if (isset($_GET["delete"])){
      @$id = $_GET["id"];      
      if(mysqli_query($db, "DELETE FROM kriteria WHERE id_kriteria = '".$id."'")){
        echo "<script>alert('Data berhasil dihapus!');document.location.href='kriteria.php';</script>";
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
          <h3 class="entry-title">Form Kriteria</h3>
        </div>   

        <div class="dropdown-divider"></div>                  

        <div class="dropdown-divider"></div>

        <div class="card-body">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Data Table Kriteria</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kriteria</th>  
                      <th>Nilai</th>  
                      <th>Atribut</th>  
                      <th>Aksi</th>                                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      @$no = 0;
                      @$query = mysqli_query($db, "SELECT * FROM kriteria ORDER BY id_kriteria");
                      while (@$data = mysqli_fetch_array($query)) {                                              
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data["nama_kriteria"]; ?></td>      
                      <td><?php echo $data["bobot"]; ?></td>      
                      <td><?php echo $data["attribute"]; ?></td>      
                      <td>
                        <a class="text-warning" href="?edit&id=<?php echo $data["id_kriteria"]; ?>"><i class="fa fa-edit"></i></a>
                        <a class="text-danger" href="?delete&id=<?php echo $data["id_kriteria"]; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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
