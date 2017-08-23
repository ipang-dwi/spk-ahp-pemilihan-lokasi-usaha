<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DSS Candra - AHP Based >> Analisa</title>

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
                    <h3 class="page-header">Analisa</h3>
                </div>
                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Panel Analisa Hasil Dengan Metode AHP</b>
                        </div>
						<div class="panel-body">
							<?php
										include 'config.php';

										$arl = 5;	//array lenght, 4 means ordo for 4x4 matrix
										$alternatif = 0;
										$kri = get_kriteria();
										$alt = get_alternatif();
										$mb = create_mx($kri);
										for($i=0;$i<$arl;$i++){
											@$mbk[$i] = create_mx($alt[$i]);
										}
										echo "<center>";
										$k = print_art($mb,$arl,0);
										$al = array(
											0 => print_art($mbk[0],$arl,1),   //
											1 => print_art($mbk[1],$arl,1),   //
											2 => print_art($mbk[2],$arl,1),   //
											3 => print_art($mbk[3],$arl,1),    //
											4 => print_art($mbk[4],$arl,1)    //
										);
										
										$wil = get_alt_name();   //new up 5 lines
										$kriteria = get_kri_name();   //new up 5 lines
										end($wil); $arl2 = key($wil)+1; //new
										for($i=0; $i<$arl2; $i++){ //new
											for($j=0; $j<$arl; $j++){
												@$pha[$i] = $pha[$i] + ($k[$j]*$al[$j][$i]);
											}
											$pha[$i] = round($pha[$i],3);
										}
								?>
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <?php
												for($i=0; $i<$arl2; $i++){ //new
													echo "<th>".$wil[$i]."</th>";
												}
												?>
												<th>Prioritas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											for($i=0; $i<$arl; $i++){
												echo "<tr>";
													echo "<td>".$kriteria[$i]." </td>";
													for($j=0; $j<$arl2; $j++){ //new
														echo "<td>".$al[$i][$j]."</td>";
													}
													echo "<td>".$k[$i]."</td>";
												echo "</tr>";
											}
											echo "<tr><td>Jumlah Hasil Perkalian</td>";
											for($i=0; $i<$arl2; $i++){
												echo "<td>".$pha[$i]."</td>";
											}
											echo "<td></td></tr>";
											?>
                                        </tfoot>
                                </table>
								<?php
										uasort($pha,'cmp');
										for($i=0;$i<$arl2;$i++){ //new for 8 lines below
											if($i==0)
												echo "<b><i>Dari tabel tersebut dapat disimpulkan bahwa ".$wil[array_search((end($pha)), $pha)]." mempunyai hasil paling tinggi, yaitu ".current($pha);
											elseif($i==$arl2-1)
												echo "</br>Dan terakhir ".$wil[array_search((prev($pha)), $pha)]." dengan nilai ".current($pha).".</i></b>";
											else
												echo "</br>Lalu diikuti dengan ".$wil[array_search((prev($pha)), $pha)]." dengan nilai ".current($pha);
										}
								?>
								</br></br><a href='ahpcax.php' target=_blank>Klik untuk melihat detail proses.</a>
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
									<?php
										function cmp($a, $b) {		//function for last sorting
											if ($a == $b) {
												return 0;
											}
											return ($a < $b) ? -1 : 1;
										}
												 
										function print_art(array $x,$arl,$type){	
											global $alternatif;
											end($x); $arl = key($x)+1; //new
											for($i=0; $i<$arl; $i++){	//sum of each column
												for($j=0; $j<$arl; $j++){
														@$jml[$i] = $jml[$i] + $x[$j][$i];
												}
											}
											for($i=0; $i<$arl; $i++){
													for($j=0; $j<$arl; $j++){
														$mnk[$i][$j]=round(($x[$i][$j]/$jml[$j]),3);
														@$jmlnk[$i] = $jmlnk[$i] + $mnk[$i][$j]; 	//sum of each row
													}
													$prio[$i] = round(($jmlnk[$i]/$arl),3);
											}

											for($i=0; $i<$arl; $i++){
													for($j=0; $j<$arl; $j++){
														$mp[$i][$j]=round(($x[$i][$j]*$prio[$i]),3);
														@$jmlp[$i] = $jmlp[$i] + $mp[$i][$j]; 	//sum of each row
													}
											}
											
											for($i=0; $i<$arl; $i++){
													@$hasil[$i] = round(($jmlp[$i] + $prio[$i]),3);
													@$hsl = $hsl + $hasil[$i]; 
											}

											$nmax = round(($hsl/$arl),3);
											$ci = round((($nmax-$arl)/($arl-1)),3);
											$ri = round(((1.98*($arl-2))/$arl),3);
											@$cr = round(($ci/$ri),3);
											
											$alternatif++;
											return $prio;
										}

										function create_mx(array $input){
											end($input); $l = key($input);
											for($i=0;$i<=$l;$i++){
												for($j=0;$j<=$l;$j++){
													@$hsl[$i][$j] = round(($input[$j]/$input[$i]),3);
												}
											}
											//print_ar($hsl);
											return($hsl);
										}

										function get_kriteria(){
											include 'config.php';
											$kriteria = $mysqli->query("select * from kriteria");
											if(!$kriteria){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kriteria->fetch_assoc()) {
												@$kri[$i] = $row["bobot"];
												$i++;
											}
											//print_ar($kri);
											return $kri;
										}

										function get_kri_name(){
											include 'config.php';
											$kriteria = $mysqli->query("select * from kriteria");
											if(!$kriteria){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kriteria->fetch_assoc()) {
												@$kri[$i] = $row["kriteria"];
												$i++;
											}
											//print_ar($kri);
											return $kri;
										}

										function get_alternatif(){
											include 'config.php';
											$alternatif = $mysqli->query("select * from alternatif");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[0][$i] = $row["k1"];
												@$alt[1][$i] = $row["k2"];
												@$alt[2][$i] = $row["k3"];
												@$alt[3][$i] = $row["k4"];
												@$alt[4][$i] = $row["k5"];
												$i++;
											}
											//print_ar($alt);
											return $alt;
										}

										function get_alt_name(){
											include 'config.php';
											$alternatif = $mysqli->query("select * from alternatif");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[$i] = $row["alternatif"];
												$i++;
											}
											//print_ar($alt);
											return $alt;
										}

										function print_ar(array $x){	//just for print array
											echo "<pre>";
											print_r($x);
											echo "</pre></br>";
										}

										/*
										// DSS with ahp method implementation using N as ordo for matrix creation, web based coding with PHP..
										// coded with love, by ip@ng http://www.firstplato.com    email: admin@firstplato.com
										*/
									?>
</html>
