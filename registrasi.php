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

<div style="background-image: url('gambar/foto.jpg');">
</div>

  <!-- nav -->
  <?php
    include("header.php");
  ?>
  <?php  
    if (isset($_POST["simpan"])) {
      @$nama = $_POST["nama"];      
      @$jk = $_POST["jk"];
      @$pertandingan = $_POST["pertandingan"];
      @$bb = $_POST["bb"];
      @$fisik = $_POST["fisik"];
      @$fieldgoal = $_POST["fieldgoal"];
      @$turnover = $_POST["turnover"];
      @$posisi = $_POST["posisi"]; 
      @$umur = $_POST["umur"];            
      if(mysqli_query($db, "INSERT INTO evaluasi_hasil VALUES(NULL, 
        '".$nama."', '".$jk."', '".$pertandingan."', '".$bb."', '".$fisik."', '".$fieldgoal."', '".$turnover."', '".$posisi."', '".$umur."'
      )")){
        echo "<script>alert('Data berhasil disimpan!');</script>";
      }else{
        echo "<script>alert('Error!');</script>";
        // echo "jk: ".$jk."   absen: ".$pertandingan.", bb: ".$bb.", fisik: ".$fisik.", fieldgoal: ".$fieldgoal."   ".$turnover."   ".$umur;
      }      
    }

    if (isset($_GET["edit"])){
      @$id = $_GET["id"];
      @$sql = mysqli_query($db, "
          SELECT a.*, b.ket_pertandingan, c.id_bbm, c.ket_bbm, d.id_bbf, d.ket_bbf, e.ket_fisik, f.ket_fieldgoal, g.ket_to, h.ket_posisi
                        FROM evaluasi_hasil a
                        INNER JOIN pertandingan b ON a.id_pertandingan = b.id_pertandingan
                        LEFT JOIN bb_male c ON a.bb = c.no_bbm
                        LEFT JOIN bb_fmale d ON a.bb = d.no_bbf
                        INNER JOIN fisik e ON a.id_fisik = e.id_fisik
                        INNER JOIN fieldgoal f ON a.id_fieldgoal = f.id_fieldgoal
                        INNER JOIN turnover g ON a.id_to = g.id_to
                        INNER JOIN posisi h on a.id_posisi = h.id_posisi 
                        WHERE id_eval = '".$id."'
        ");
      @$edit = mysqli_fetch_assoc($sql);
    }

    if (isset($_POST["update"])) {
      @$id = $_GET["id"];
      @$nama = $_POST["nama"];      
      @$jk = $_POST["jk"];
      @$pertandingan = $_POST["pertandingan"];
      @$bb = $_POST["bb"];
      @$fisik = $_POST["fisik"];
      @$fieldgoal = $_POST["fieldgoal"];
      @$turnover = $_POST["turnover"];
      @$posisi = $_POST["posisi"];
      @$umur = $_POST["umur"];           
      if(mysqli_query($db, "UPDATE evaluasi_hasil SET nama = '".$nama."', jk = '".$jk."', id_pertandingan = '".$pertandingan."', bb = '".$bb."', id_fisik = '".$fisik."', 
        id_fieldgoal = '".$fieldgoal."', id_to = '".$turnover."', id_posisi = '".$posisi."', umur = '".$umur."' WHERE id_eval = '$id'")){
        echo "<script>alert('Data berhasil diupdate!');document.location.href='registrasi.php';</script>";
      }else{
        echo "<script>alert('Error!');</script>";
      }
    }

    if (isset($_GET["delete"])){
      @$id = $_GET["id"];      
      if(mysqli_query($db, "DELETE FROM evaluasi_hasil WHERE id_eval = '".$id."'")){
        echo "<script>alert('Data berhasil dihapus!');document.location.href='registrasi.php';</script>";
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
          <h3 class="entry-title">Form Registrasi Peserta</h3>
        </div>   

        <div class="dropdown-divider"></div>                  

        <div class="card-body col-md-6">
          <form  method="post">
            <div class="form-group">
              <label>Nama</label>
              <div class="form-label-group">
                <input type="text" id="nama" name="nama" value="<?php echo @$edit["nama"]; ?>" class="form-control" placeholder="Keterangan" required="required" autocomplete="off">
              </div>
            </div>                
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="L" name="jk" value="L" required="required" <?php echo (@$edit["jk"] == "L" ? "checked" : "") ?>>
                    <label class="custom-control-label" for="L">Laki-laki</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="P" name="jk" value="P" required="required" <?php echo (@$edit["jk"] == "P" ? "checked" : "") ?>>
                    <label class="custom-control-label" for="P">Perempuan</label>
                  </div>
                </div>
              </div>              
            </div>
            <div class="form-group">
              <div id="datam">
                <label>Berat Badan</label>
                <div class="form-label-group">
                  <select id="bbm" class="form-control" placeholder="Berat Badan" required="required" autocomplete="off">
                      <option value="<?php echo @$edit["no_bbm"]; ?>"><?php echo @$edit["id_bbm"]." ".@$edit["ket_bbm"]; ?></option>                
                      <?php  
                        @$sql2 = mysqli_query($db, "SELECT * FROM bb_male");
                        while($datam = mysqli_fetch_array($sql2)) {
                      ?>                  
                        <option value="<?php echo $datam["no_bbm"]; ?>"><?php echo $datam["id_bbm"]." ".$datam["ket_bbm"]; ?></option>                  
                      <?php } ?>                                                                      
                  </select>                  
                </div>
              </div>
              <div id="dataf">
                <label>Berat Badan</label>
                <div class="form-label-group">                 
                  <select id="bbf" class="form-control" placeholder="Berat Badan" required="required" autocomplete="off">
                    <option value="<?php echo @$edit["no_bbf"]; ?>"><?php echo @$edit["id_bbf"]." ".@$edit["ket_bbf"]; ?></option>
                    <?php  
                      @$sql3 = mysqli_query($db, "SELECT * FROM bb_fmale");
                      while($dataf = mysqli_fetch_array($sql3)) {
                    ?>                  
                      <option value="<?php echo $dataf["no_bbf"]; ?>"><?php echo $dataf["id_bbf"]." ".$dataf["ket_bbf"]; ?></option>                  
                    <?php } ?>
                  </select>
                </div>
              </div>              
            </div>
            <div class="form-group">
              <label>Kehadiran</label>
              <div class="form-label-group">
                <select id="pertandingan" name="pertandingan" class="form-control" placeholder="Pertandingan" required="required" autocomplete="
                off">
                    <option value="<?php echo @$edit["id_pertandingan"]; ?>"><?php echo @$edit["ket_pertandingan"]; ?></option>
                    <?php  
                      @$Pertandingan = mysqli_query($db, "SELECT * FROM pertandingan");
                      while($dataPertandingan = mysqli_fetch_array($Pertandingan)) {
                    ?>                  
                      <option value="<?php echo $dataPertandingan["id_pertandingan"]; ?>"><?php echo $dataPertandingan["ket_pertandingan"]; ?></option>                  
                    <?php } ?>                                                                      
                </select>                  
              </div>
            </div>
            <div class="form-group">
              <label>Tinggi</label>
              <div class="form-label-group">
                <select id="fisik" name="fisik" class="form-control" placeholder="Fieldgoal" required="required" autocomplete="
                off">
                    <option value="<?php echo @$edit["id_fisik"]; ?>"><?php echo @$edit["ket_fisik"]; ?></option>
                    <?php  
                      @$Fisik = mysqli_query($db, "SELECT * FROM fisik");
                      while($dataFisik = mysqli_fetch_array($Fisik)) {
                    ?>                  
                      <option value="<?php echo $dataFisik["id_fisik"]; ?>"><?php echo $dataFisik["ket_fisik"]; ?></option>                  
                    <?php } ?>                                                                      
                </select>                  
              </div>
            </div>
            <div class="form-group">
              <label>Fieldgoal</label>
              <div class="form-label-group">
                <select id="fieldgoal" name="fieldgoal" class="form-control" placeholder="Fieldgoal" required="required" autocomplete="
                off">
                    <option value="<?php echo @$edit["id_fieldgoal"]; ?>"><?php echo @$edit["ket_fieldgoal"]; ?></option>
                    <?php  
                      @$Fieldgoal = mysqli_query($db, "SELECT * FROM fieldgoal");
                      while($dataFieldgoal = mysqli_fetch_array($Fieldgoal)) {
                    ?>                  
                      <option value="<?php echo $dataFieldgoal["id_fieldgoal"]; ?>"><?php echo $dataFieldgoal["ket_fieldgoal"]; ?></option>                  
                    <?php } ?>                                                                      
                </select>                  
              </div>
            </div>
            <div class="form-group">
              <label>Turn Over</label>
              <div class="form-label-group">
                <select id="turnover" name="turnover" class="form-control" placeholder="Training Club" required="required" autocomplete="
                off">
                    <option value="<?php echo @$edit["id_to"]; ?>"><?php echo @$edit["ket_to"]; ?></option>
                    <?php  
                      @$turnover = mysqli_query($db, "SELECT * FROM turnover");
                      while($datatolub = mysqli_fetch_array($turnover)) {
                    ?>                  
                      <option value="<?php echo $datatolub["id_to"]; ?>"><?php echo $datatolub["ket_to"]; ?></option>                  
                    <?php } ?>                                                                      
                </select>                  
              </div>
            </div>
            <div class="form-group">
              <label>Posisi</label>
              <div class="form-label-group">
               <select id="posisi" name="posisi" class="form-control" placeholder="Posisi" required="required" autocomplete="
                off">
                    <option value="<?php echo @$edit["id_posisi"]; ?>"><?php echo @$edit["ket_posisi"]; ?></option>
                    <?php  
                      @$posisi = mysqli_query($db, "SELECT * FROM posisi");
                      while($dataposisi = mysqli_fetch_array($posisi)) {
                    ?>                  
                      <option value="<?php echo $dataposisi["id_posisi"]; ?>"><?php echo $dataposisi["ket_posisi"]; ?></option>                  
                    <?php } ?>                                                                      
                </select>                
            </div>
          </div>
            <div class="form-group">
              <label>Umur</label>
              <div class="form-label-group">
                <input type="number" id="umur" name="umur" min="17" max="20" value="<?php echo @$edit["umur"]; ?>" class="form-control" placeholder="Umur" required="required" autocomplete="off">
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
                <a href="registrasi.php" class="btn btn-primary btn-block">Refresh</a>                            
              </div>  
            </div>            
          </form>          
        </div>

        <div class="dropdown-divider"></div>

        <div class="card-body">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Data Table Peserta Laki-laki</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>  
                      <th>Jenis Kelamin</th>
                      <th>Berat Badan</th>
                      <th>Kehadiran</th>
                      <th>Tinggi</th>
                      <th>Fieldgoal</th>
                      <th>Turnover</th>
                      <th>Posisi</th>
                      <th>Umur</th>
                      <th>Aksi</th>                                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      @$no = 0;
                      @$query = mysqli_query($db, "
                        SELECT a.*, b.ket_pertandingan, c.id_bbm, c.ket_bbm, d.id_bbf, d.ket_bbf, e.ket_fisik, f.ket_fieldgoal, g.ket_to, h.ket_posisi
                        FROM evaluasi_hasil a
                        INNER JOIN pertandingan b ON a.id_pertandingan = b.id_pertandingan
                        LEFT JOIN bb_male c ON a.bb = c.no_bbm
                        LEFT JOIN bb_fmale d ON a.bb = d.no_bbf
                        INNER JOIN fisik e ON a.id_fisik = e.id_fisik
                        INNER JOIN fieldgoal f ON a.id_fieldgoal = f.id_fieldgoal
                        INNER JOIN turnover g ON a.id_to = g.id_to
                        INNER JOIN posisi h on a.id_posisi = h.id_posisi
                        WHERE jk = 'L'
                        ORDER BY id_eval
                      ");
                      while (@$data = mysqli_fetch_array($query)) {                                              
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data["nama"]; ?></td>      
                      <td><?php echo ($data["jk"] == "L" ? "Laki-laki" : "Perempuan"); ?></td>
                      <td><?php echo ($data["id_bbm"] == null ? $data["id_bbf"] : $data["id_bbm"])." ".($data["ket_bbm"] == null ? $data["ket_bbf"] : $data["ket_bbm"]); ?></td>
                      <td><?php echo $data["ket_pertandingan"]; ?></td>
                      <td><?php echo $data["ket_fisik"]; ?></td>
                      <td><?php echo $data["ket_fieldgoal"]; ?></td>
                      <td><?php echo $data["ket_to"]; ?></td>
                      <td><?php echo $data["ket_posisi"]; ?></td>
                      <td><?php echo $data["umur"]; ?></td>
                      <td>
                        <a class="text-warning" href="?edit&id=<?php echo $data["id_eval"]; ?>"><i class="fa fa-edit"></i></a>
                        <a class="text-danger" href="?delete&id=<?php echo $data["id_eval"]; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                      </td>                                      
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
                <table class="table "  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>  
                      <th>Jenis Kelamin</th>
                      <th>Berat Badan</th>
                      <th>Kehadiran</th>
                      <th>Tinggi</th>
                      <th>Fieldgoal</th>
                      <th>Turnover</th>
                      <th>Posisi</th>
                      <th>Umur</th>
                      <th>Aksi</th>                                         
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      @$no = 0;
                      @$query = mysqli_query($db, "
                        SELECT a.*, b.ket_pertandingan, c.id_bbm, c.ket_bbm, d.id_bbf, d.ket_bbf, e.ket_fisik, f.ket_fieldgoal, g.ket_to, h.ket_posisi
                        FROM evaluasi_hasil a
                        INNER JOIN pertandingan b ON a.id_pertandingan = b.id_pertandingan
                        LEFT JOIN bb_male c ON a.bb = c.no_bbm
                        LEFT JOIN bb_fmale d ON a.bb = d.no_bbf
                        INNER JOIN fisik e ON a.id_fisik = e.id_fisik
                        INNER JOIN fieldgoal f ON a.id_fieldgoal = f.id_fieldgoal
                        INNER JOIN turnover g ON a.id_to = g.id_to
                        INNER jOIN posisi h on a.id_posisi = h.id_posisi
                        WHERE jk = 'P'
                        ORDER BY id_eval
                      ");
                      while (@$data = mysqli_fetch_array($query)) {                                              
                      $no++;
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data["nama"]; ?></td>      
                      <td><?php echo ($data["jk"] == "L" ? "Laki-laki" : "Perempuan"); ?></td>
                      <td><?php echo ($data["id_bbm"] == null ? $data["id_bbf"] : $data["id_bbm"])." ".($data["ket_bbm"] == null ? $data["ket_bbf"] : $data["ket_bbm"]); ?></td>
                      <td><?php echo $data["ket_pertandingan"]; ?></td>
                      <td><?php echo $data["ket_fisik"]; ?></td>
                      <td><?php echo $data["ket_fieldgoal"]; ?></td>
                      <td><?php echo $data["ket_to"]; ?></td>
                      <td><?php echo $data["ket_posisi"]; ?></td>
                      <td><?php echo $data["umur"]; ?></td>
                      <td>
                        <a class="text-warning" href="?edit&id=<?php echo $data["id_eval"]; ?>"><i class="fa fa-edit"></i></a>
                        <a class="text-danger" href="?delete&id=<?php echo $data["id_eval"]; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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
  <script type="text/javascript">
    $(document).ready(function(){
      $('#dtpl').DataTable();
      $('#dtpp').DataTable();
      $("#datam").hide();
      $("#dataf").hide(); 
      if($('#L').is(':checked')) {
        $("#bbm").attr("name", "bb");
        $("#bbf").removeAttr("name");
        $("#bbm").attr("required", "required");
        $("#bbf").removeAttr("required");
        $("#datam").show();      
        $("#dataf").hide();        
      }      
      if($('#P').is(':checked')) {
        $("#bbf").attr("name", "bb");
        $("#bbm").removeAttr("name");
        $("#bbf").attr("required", "required");
        $("#bbm").removeAttr("required");
        $("#datam").hide();
        $("#dataf").show();              
      }
    });
    $('#L').click(function() {      
      $("#bbm").attr("name", "bb");
      $("#bbf").removeAttr("name");
      $("#bbm").attr("required", "required");
      $("#bbf").removeAttr("required");
      $("#datam").show();      
      $("#dataf").hide();              
    });
    $('#P').click(function() {
      $("#bbf").attr("name", "bb");
      $("#bbm").removeAttr("name");
      $("#bbf").attr("required", "required");
      $("#bbm").removeAttr("required");
      $("#datam").hide();
      $("#dataf").show();          
    });
  </script>

</body>

</html>
