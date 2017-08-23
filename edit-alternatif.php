<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DSS Candra - AHP Based >> Edit Data Alternatif</title>

    <!-- Core CSS - Include with every page -->
    <link href="sb2/css/bootstrap.min.css" rel="stylesheet">
    <link href="sb2/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="sb2/css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">DSS Candra - AHP Based</a>
            </div>
            <!-- /.navbar-header -->
        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li  class="active">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="kriteria.php"><i class="fa fa-table fa-fw"></i> Data Kriteria</a>
                    </li>
                    <li>
                        <a href="alternatif.php"><i class="fa fa-edit fa-fw"></i> Data Alternatif</a>
                    </li>
                    <li>
                        <a href="analisa.php"><i class="fa fa-files-o fa-fw"></i> Hasil Analisa</a>
                    </li>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit Data Alternatif</h3>
                </div>
                <!-- /.col-lg-12 -->
				<div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Panel Edit Data Alternatif</b>
                        </div>
						<?php
									include('config.php');
									$result = $mysqli->query("select * from alternatif where id_alternatif = ".$_GET['id']."");
									if(!$result){
										echo $mysqli->connect_errno." - ".$mysqli->connect_error;
										exit();
									}
									while($row = $result->fetch_assoc()){
						?>
						<div class="panel-body">
							<form role="form" method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alternatif Lokasi</label>
                                            <input type="text" class="form-control" name="alternatif" id="alternatif" value="<?php echo $row["alternatif"];?>" placeholder="Alternatif Lokasi">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jarak Dengan Pemukiman</label>
                                            <input type="text" class="form-control" name="k1" id="k1" value="<?php echo $row["k1"];?>" placeholder="Nilai Bobot">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">Jarak Dengan Persimpangan</label>
                                            <input type="text" class="form-control" name="k2" id="k2" value="<?php echo $row["k2"];?>" placeholder="Nilai Bobot">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">Jarak Dengan SPBU</label>
                                            <input type="text" class="form-control" name="k3" id="k3" value="<?php echo $row["k3"];?>" placeholder="Nilai Bobot">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">Harga Sewa Tempat</label>
                                            <input type="text" class="form-control" name="k4" id="k4" value="<?php echo $row["k4"];?>" placeholder="Nilai Bobot">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">Jarak Dengan Kompetitor</label>
                                            <input type="text" class="form-control" name="k5" id="k5" value="<?php echo $row["k5"];?>" placeholder="Nilai Bobot">
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
										<button type="reset" class="btn btn-info">Reset</button>
										<a href="alternatif.php" type="cancel" class="btn btn-warning">Batal</a>
                                        <button type="submit" class="btn btn-primary">Proses Edit</button>
                                    </div>
                            </form>
							<?php
									}
							?>
						</div>
                        <div class="panel-footer">
                            <i>by c@ndr@</i>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="sb2/js/jquery-1.10.2.js"></script>
    <script src="sb2/js/bootstrap.min.js"></script>
    <script src="sb2/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Blank -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="sb2/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>
