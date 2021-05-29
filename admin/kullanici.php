<?php include 'header.php';

error_reporting(0);

$kullanicisor = $baglan->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();



?>
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Kullanıcı Listeleme</h2>   
				
			</div>
		</div>
		
		<hr />
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Kullanıcı Tablosu
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<td align="center"><b>Kayıt Tarihi</b></td>
														<td align="center"><b>Ad Soyad</b></td>
														<td align="center"><b>Mail Adresi</b></td>
														<td align="center"><b>Telefon</b></td>
														<td align="center"><b>Düzenle</b></td>
														<td align="center"><b>Sil</b></td>
													</tr>
												</thead>
												<tbody>
													<?php while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>
														
														<tr>
															<td><?php echo $kullanicicek["kullanici_zaman"]; ?></td>
															<td><?php echo $kullanicicek["kullanici_adsoyad"]; ?></td>
															<td><?php echo $kullanicicek["kullanici_mail"]; ?></td>
															<td><?php echo $kullanicicek["kullanici_gsm"]; ?></td>
															<td align="center"><a href="kullanici-duzenle.php?id=<?php echo $kullanicicek["kullanici_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></button></a></td>
															<td align="center"><a href="netting/islem.php?id=<?php echo $kullanicicek["kullanici_id"];?>&kullanicisil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
														</tr>
													<?php } ?>
													
												</tbody>
											</table>
													
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>


</div>

</div>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function () {
		$('#dataTables-example').dataTable();
	});
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>
