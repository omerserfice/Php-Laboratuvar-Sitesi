<?php include 'header.php';

error_reporting(0);

$menusor = $baglan->prepare("SELECT * FROM menu");
$menusor->execute();



?>
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Menü Listeleme</h2>   
				
			</div>
		</div>
		
		<hr />
		<div align="right"><a href="menu-ekle.php"><button class="btn btn-success btn-xs">Menü Ekle</button></a></div><br>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Menüler 
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
														<td align="center"><b>Sıra No</b></td>
														<td align="center"><b>Menü Adı</b></td>
														<td align="center"><b>Menü Url</b></td>
														<td align="center"><b>Menü Sıra</b></td>
														<td align="center"><b>Menü Durum</b></td>
														<td align="center"><b>Düzenle</b></td>
														<td align="center"><b>Sil</b></td>
													</tr>
												</thead>
												<tbody>
													<?php
                                                          $say = 0;


													 while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
														
														<tr>
															<td align="center"><?php echo $say; ?></td>
															<td align="center"><?php echo $menucek["menu_ad"]; ?></td>
															<td align="center"><?php echo $menucek["menu_url"]; ?></td>
															<td align="center"><?php echo $menucek["menu_sira"]; ?></td>
															<td align="center"><?php 

                                                                if ($menucek["menu_durum"]==1) { ?>
                                                                	
                                                                	<button class="btn btn-success btn-xs">Aktif</button>
                                                               <?php }else{ ?>

                                                                       <button class="btn btn-danger btn-xs">Pasif</button>

                                                                 <?php  } ?>
															</td>
		<td align="center"><a href="menu-duzenle.php?id=<?php echo $menucek["menu_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
		<td align="center"><a href="netting/islem.php?id=<?php echo $menucek["menu_id"];?>&menusil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
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
