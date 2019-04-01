<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");

$app_id=$_GET['uid'];
$fid=$_GET['fid'];
$district=$_GET['district'];
$dist_code=find_district_code($district);
$table_name=$dist_code.'_application_table';
$sql="SELECT * from $table_name where app_id='".$app_id."' and id_parse='".$fid."'";
$execQuery=mysqli_query($con,$sql);
$row=mysqli_fetch_array($execQuery);





?>

<div id="divToPrint" style="display:none"><div class='container'><div class='container'><div class="row print-header-one">GOVERNMENT OF KARNATAKA</div><div class="row print-header-one">MINORITY WELFARE DEPARTMENT</div><div class="row print-header-one"><?php echo strtoupper($_SESSION['login']);?></div><br><div class="row print-header-two">BIDAAI APPLICATION</div>
						<div class="row">
						<table>
	                  	  	  
	                  	  	 <thead>
							 <tr>
								<th></th>
								<th></th>
								<th></th>
								

							 </tr>
							 </thead>
                              <tbody>
							<tr>
                              <td colspan="3"><img src="../<?php echo $row['applicant_photo']; ?>"  height="100" width="100" alt="Applicant Photo"></td>
							 </tr>
                           
                            <tr>
                              <td colspan="3"><h4>Registration ID:<?php echo $row['id_parse'].sprintf("%05d",$row['app_id']); ?></h4></td>
                            </tr>
							<tr>
								<td><p>Application Received Date:<?php echo convert_date_dmy($row['received_date']); ?></p></td>
								<td></td>
                                 
                                 <td><p>Marriage Date:<?php echo convert_date_dmy($row['marriage_date']); ?></p></td> 
							</tr>
							  <tr>
								<td ><p>Application Received before:<?php $date1=date_create($row['received_date']);
											 $date2=date_create($row['marriage_date']);
											 $diff=date_diff($date1,$date2);
											 echo $diff->format("%a Days");  ?></p></td> 

									<td></td>
									<td><p>Location Marriage:<?php echo $row['marriage_place']; ?></p><p><?php echo $row['marriage_place_kannada']; ?></p></td>
									
											 
							  
							  </tr>
							  <tr><td colspan="3"><h4><u>Bride Details</u></h4></td> </tr>
							<tr>
                              <td><p>Name:<?php echo $row['applicant_name']; ?></p><p><?php echo $row['applicant_name_kannada']; ?></p></td>
                             
							  <td><p>Date of birth:<?php echo convert_date_dmy($row['dob']); ?></p></td>
							  
							  <td><p>Age:<?php echo date_diff(date_create($row['dob']), date_create('today'))->y;  ?>&nbsp;Years</p></td>
							  
							</tr>
							<tr>
								  <td><p>Parent/Guardian Name:<?php echo $row['parent']; ?></p><p><?php echo $row['parent_kannada']; ?></p></td>
								   <td></td>
                                  
								  <td><p>Religion:<?php echo $row['religion']; ?></p><td>
                                  
							</tr>
							<tr>
								  <td><p>Mobile No:<?php echo $row['mobile']; ?></p></td>
                                  
								  <td></td>
                                  
								   <td><p>Annual Income:<?php echo $row['annual_income']; ?></p></td> 
								   
							</tr>
							<tr>
							<td colspan="3"><p>Address:<?php echo $row['address']; ?></p><p><?php echo $row['address_kannada']; ?></p></td>
							</tr>
							
								<tr ><td colspan="3" ><h4><u>Bride Groom Details</u></h4></td></tr>
							
							<tr>
							       <td ><p>Name:<?php echo $row['name_of_the_would_be_groom']; ?></p><p><?php echo $row['name_of_the_would_be_groom_kannada']; ?></p></td> 
									
								  <td  ><p>Date of birth:<?php echo convert_date_dmy($row['groom_dob']); ?></p></td>
                                 
								  <td ><p>Age:<?php echo date_diff(date_create($row['groom_dob']), date_create('today'))->y;  ?>&nbsp; Years</p></td> 
							
							</tr>
							<tr>
							       <td colspan="3"><p>Address:<?php echo $row['address_of_the_would_be_groom']; ?></p></td> 
								   
							
							</tr>
							<tr>
                              
								  <td colspan="3" ><h4><u>Application Status</u></h4><p> <?php echo status_full_description($row['status']); ?></p></td>

                            </tr>
							<tr>
							<?php
							if($row['status']==2 )
							{
							?>
							 <td colspan="3" ><p>Kindly submit marriage certificate/Daftar,Marriage photo and other document within 15 days after marriage.</p></td>
							
							<?php
							}
							?>
							</tr>
							
							    <tr>                        
								  <td><p><strong>Date:</strong></p><p><strong>Place:</strong></p></td>
								  <td></td>
                                  <td  align="center"><p><strong>District Officer,</strong></p><p><strong>Minority Welfare Department</strong></p><p><strong><?php echo strtoupper($district);?></strong></p></td>
								
                                 
                                  
								

                              </tr>
							                              
								
                             
                             
                              </tbody>
                          </table>
	
		

		
						</div>
					
						</div>
						 </div>
						 
						</div>
 <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>						
<script>
var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
            popupWin.document.open();
            popupWin.document.write("<html><body onload='window.print()' style='border: solid black; border-width: thin;'><head> <link href='assets/font-awesome/css/font-awesome.css' rel='stylesheet' /><link href='assets/css/style.css' rel='stylesheet'></head>" + divToPrint.innerHTML + "</html>");
            popupWin.document.close();
			window.location='reports.php';
</script>						
						 
						 
						 