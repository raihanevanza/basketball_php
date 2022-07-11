<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description">
    <meta name="author">
    <meta name="keywords">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Registrasi</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Nama">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="label label--block">Jenis Kelamin</label>
                            <div class="p-t-15">

                            
                                <label class="radio-container m-r-55">Laki - laki
                                   
                                    <input type="radio" checked="checked" name="jenis_kelamin" value="laki-laki" id= "laki"> 
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Perempuan
                                    <input type="radio" checked="checked" name="jenis_kelamin" value="perempuan" id ="perempuan">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Absensi</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Absensi">
                                            <option disabled="disabled" selected="selected">Pilih</option>
                        
                                            <?php
                                            include('config.php');
                                            $sql = mysqli_query($db, "SELECT * FROM absensi");
                                            if(mysqli_num_rows($sql) != 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    echo "<option value = ".$row['id_absensi'].">".$row['ket_absensi']."</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Berat Badan</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Berat Badan">
                                            <option disabled="disabled" selected="selected">Pilih</option>
                             
                                            <?php
                                            include('config.php');
                                        
                                            $sql = mysqli_query($db, "SELECT * FROM bb_male");
                                            if(mysqli_num_rows($sql) != 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    echo "<option value = ".$row['no_bbm'].">".$row['id_bbm']." ",$row['ket_bbm']."</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Fisik</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Fisik">
                                            <option disabled="disabled" selected="selected">Pilih</option>

                                            <?php
                                            include('config.php');
                                            $sql = mysqli_query($db, "SELECT * FROM fisik");
                                            if(mysqli_num_rows($sql) != 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    echo "<option value = ".$row['id_fisik'].">".$row['ket_fisik']."</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Teknik</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Teknik">
                                            <option disabled="disabled" selected="selected">Pilih</option>
                                            
                                            <?php
                                            include('config.php');
                                            $sql = mysqli_query($db, "SELECT * FROM teknik");
                                            if(mysqli_num_rows($sql) != 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    echo "<option value = ".$row['id_teknik'].">".$row['ket_teknik']."</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-row">
                            <div class="name">Training Club</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Training Club">
                                            <option disabled="disabled" selected="selected">Pilih</option>

                                            <?php
                                            include('config.php');
                                            $sql = mysqli_query($db, "SELECT * FROM tclub");
                                            if(mysqli_num_rows($sql) != 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    echo "<option value = ".$row['id_tc'].">".$row['ket_tc']."</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Jam Terbang</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Jam Terbang">
                                </div>
                            </div>
                        </div>
                       
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
</html>