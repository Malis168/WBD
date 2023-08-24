 	<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">គ្រប់គ្រងអចលនទ្រព្យ</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
							    <div class="col-auto">
								    
								    <select class="form-select w-auto" >
										  <option selected value="option-1">All</option>
										  <option value="option-2">This week</option>
										  <option value="option-3">This month</option>
										  <option value="option-4">Last 3 months</option>
										  
									</select>
							    </div>
							    <div class="col-auto">						    
								    <a class="btn app-btn-secondary" href="#">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
		  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
		</svg>
									    Download CSV
									</a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
			    
			    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="property_type-list-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">ប្រភេទអចលនទ្រព្យ</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="create-property-type-tab" data-bs-toggle="tab" href="#create-property-type" role="tab" aria-controls="orders-paid" aria-selected="false">បង្កើតអចលនទ្រព្យថ្មី</a>
				   
				</nav>
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="property_type-list-tab">

					  	<?php
					  		if(isset($_POST['btnUpdate'])){
								$id = $_POST['txt_id'];
								$property_type_kh = $_POST['txt_property_type_kh'];
								$property_type_en = $_POST['txt_property_type_en'];
								$property_type_desc = $_POST['tar_desc'];

								if(trim($property_type_kh) != '' && trim($property_type_en)){
									$sql = "UPDATE tbl_property_type SET property_type_name_kh='$property_type_kh', 
									property_type_name_en='$property_type_en',
									property_type_desc='$property_type_desc'
									WHERE property_type_id=$id";

									if(mysqli_query($conn, $sql)){
										echo msg_style('Data Updated success!','success');
									}else{
										echo msg_style('Data Updated UNsuccess!','info');
									}

								}
							}
					  	?>

						<?php
							if(isset($_POST['delete_msg'])){
								echo "<h4?>".$_POST['delete_msg']."</h4>";
							}
						?>

					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">#</th>
												<th class="cell">ប្រភេទអចលនទ្រព្យជាខ្មែរ</th>
												<th class="cell">ប្រភេទអចលនទ្រព្យជាអង់គ្លេស</th>
												<th class="cell">បរិយាយ</th>
												<th class="cell">សកម្មភាព</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
											<?PHP
												$sql ="SELECT * from tbl_property_type";
												$result = mysqli_query($conn, $sql);
												$i=0;
												while ($row = mysqli_fetch_array($result)){
											?>
											<tr >
												<td class="cell"><?= $row[0]?></td>
												<td class="cell"><?= $row['property_type_name_kh']?></td>
												<td class="cell"><?= $row['property_type_name_en']?></td>
												<td class="cell"><?= $row[3]?></td>
												<td class="cell">
													<a type="button" class="btn btn-info" href="#"><i class="fa-solid fa-eye"></i></a>
													<a class="btn btn-primary" href="#" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#editModal<?= $row[0]?>"><i class="far fa-edit"></i></a>		
													<a type="submit" name="id" class="btn btn-danger" href="pages/property_type_delete.php?id=<?= $row[0]?>"><i class="fa-solid fa-trash-can"></i></a>											
													<!-- <a type="submit" name="id" class="btn btn-danger" href="pages/property_type_delete.php?id="><i class="fa-solid fa-trash-can"></i></a>											 -->
												</td>
											</tr>
										<?php
											$i++;
										?>
											
										<?php
											$i++;
											echo'
												<!-- Modal -->
												<div class="modal fade bd-example-modal-lg" id="editModal'.$row[0].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">កែប្រប្រភេទអចលនទ្រព្យ</h5>
													</div>
													<div class="modal-body">
													
													<div class="app-card-body">
								<form method="post"class="settings-form">
									<input type="hidden" name="txt_id" value="'.$row[0].'"/>
									<div class="mb-3">
										<label for="setting-input-1" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ*</label>
										<input type="text" class="form-control" name="txt_property_type_kh" id="txt_property_type_kh" value="'.$row['property_type_name_kh'].'" required>
								</div>
								<div class="mb-3">
										<label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស*</label>
										<input type="text" class="form-control" name="txt_property_type_en" id="txt_property_type_en" value="'.$row['property_type_name_en'].'" required>
								</div>
									<div class="mb-3">
										<label for="setting-input-3" class="form-label">បរិយាយ</label>
										<input type="text" class="form-control" name="tar_desc" id="tar_desc" value="'.$row[3].'">
								</div>
								<button type="submit" name="btnUpdate" class="btn app-btn-primary" >រក្សាទុក</button>
								</form>
							</div>
												
													
													</div>
													<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
												</div>
												</div>
											';
											
											}
										?>
		
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							    </li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								    <a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav><!--//app-pagination-->
						
			        </div><!--//tab-pane-->
			        
<div class="tab-pane fade" id="create-property-type" role="tabpanel" aria-labelledby="create-property-type-tab">
	<div class="app-card app-card-orders-table mb-5">  
		    <div class="container-xl">			    
			    <h1 class="app-page-title">បំពេញព័ត៏មានប្រភេទអចលនទ្រព្យ</h1>
	
                <div class="row g-4 settings-section">
	                
	                <div class="col-12 col-md-12">
		                <div class="app-card app-card-settings shadow-sm p-4">
						
						<?php
							//check connection
							if($conn === false){
								die("Error : cloud not connect.". mysqli_connect_error());
							}
							
							
							if(isset ($_POST['btnsave'])){
								$property_type_kh = $_REQUEST['txt_property_type_kh'];
								$property_type_er = $_REQUEST['txt_property_type_en'];
								$property_type_desc = $_POST['tar_desc'];
								
								#performing insert query into tbl
								$sql ="INSERT into tbl_property_type (property_type_name_kh,property_type_name_en,`property_type_desc`)
										VALUES('$property_type_kh','$property_type_er','$property_type_desc')";
										
								if (mysqli_query($conn, $sql)){
									//echo "Data inserted success!";
									echo msg_style('Data inserted success!','success');
									//echo msg_style('Data inserted info!','info');
									//echo msg_style('Data inserted warning!','warning');
								}
								else{
									echo "Error inserting to db $sql".mysqli_error($conn);
								}
								#close connection
								mysqli_close($conn);
								
							}
						
						?>  
						   <div class="app-card-body">
								<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post"class="settings-form">
									<div class="mb-3">
										<label for="setting-input-1" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ*</label>
										<input type="text" class="form-control" name="txt_property_type_kh" id="txt_property_type_kh" value="" required>
								</div>
								<div class="mb-3">
										<label for="setting-input-2" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស*</label>
										<input type="text" class="form-control" name="txt_property_type_en" id="txt_property_type_en" value="" required>
								</div>
									<div class="mb-3">
										<label for="setting-input-3" class="form-label">បរិយាយ</label>
										<textarea type="text" class="form-control" name="tar_desc" id="tar_desc" value=""></textarea>
								</div>
								<button type="submit" name="btnsave" class="btn app-btn-primary" >រក្សាទុក</button>
								</form>
							</div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                
		    </div><!--//container-fluid-->
	    
	  

							
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			        
			       
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
				</div><!--//tab-content-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
		
<script type="text/javascript">
	$(document).ready(function(){
		$("#property_type-list-tab").click(function(){
			// alert('testing');
			window.location.href="index.php?p=property_type";
		});
	});
</script> 
	    
	 
