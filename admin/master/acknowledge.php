<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");

$app_id=$_GET['uid'];
$sql="SELECT * from application_table where app_id='".$app_id."'";
$execQuery=mysqli_query($con,$sql);
$row=mysqli_fetch_array($execQuery);





?><div id="divToPrint" style="display:none"><div class='container'><h2 align='center'>Acknowledgement</h2>
						  <table class="table ">
	                  	  	  
	                  	  	 <thead>
							 <tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							 </tr>
							 </thead>
                              <tbody>
								 <tr>
                              <td><img src="/admin/<?php echo $row['applicant_photo']; ?>"  height="100" width="100" alt="Applicant Photo"></td>
                                  <td> </td>
								  <td></td>
									<td></td>
									<td></td>
									<td></td>
								

                              </tr>
                           
                              <tr>
                              <td>Permanent ID</td>
                                  <td><?php echo $row['app_id']; ?></td>
								  <td>Received Date</td>
                                  <td><?php echo convert_date($row['received_date']); ?></td>
                                 
                                  <td>Difference</td> 
								   <td><?php $date1=date_create($row['received_date']);
											$date2=date_create($row['marriage_date']);
											$diff=date_diff($date1,$date2);
											echo $diff->format("%a Days");  ?></td>
								

                              </tr>
								<tr>
                              <td>Name of the Applicant</td>
                                  <td><?php echo $row['applicant_name']; ?><br><?php echo $row['applicant_name_kannada']; ?></td>
								  <td>Name of the Father / Mother/ Guardian</td>
                                  <td><?php echo $row['parent']; ?><br><?php echo $row['parent_kannada']; ?></td>
                                 
                                  <td>Name of the Would -be Groom</td> 
								   <td><?php echo $row['name_of_the_would_be_groom']; ?><br><?php echo $row['name_of_the_would_be_groom_kannada']; ?></td>
								

                              </tr>
								<tr>
                              <td>Applicant Date of Birth</td>
                                  <td><?php echo convert_date($row['dob']); ?><br>Age:<?php echo date_diff(date_create($row['dob']), date_create('today'))->y;  ?>&nbsp;years</td>
								  <td>Would-be Groom Date of Birth</td>
                                  <td><?php echo convert_date($row['groom_dob']); ?><br>Age:<?php echo date_diff(date_create($row['groom_dob']), date_create('today'))->y;  ?>&nbsp;years</td>
                                 
                                  <td>Marriage Date Fixed</td> 
								   <td><?php echo convert_date($row['marriage_date']); ?></td>
								

                              </tr>
								<tr>
                              <td>Domicile State</td>
                                  <td><?php echo $row['domicile_state']; ?></td>
								  <td>Domicile Certificate</td>
                                  <td><?php echo $row['domicile_proof']; ?></td>
								  <td>Annual Income</td> 
								   <td><?php echo $row['annual_income']; ?></td>
								  
                                 
                                  
								

                              </tr>
							  <tr>
                              
								  <td>Physically handicap</td>
                                  <td><?php echo $row['physically_handicap']; ?></td>
								  <td>Application Status</td>
                                  <td><?php echo status_description($row['status']); ?></td>
								  <td></td> 
								   <td></td>
                                 
                                  
								

                              </tr>
								
                             
                             
                              </tbody>
                          </table>
						 </div>
						 
						</div>
<script>
var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
            popupWin.document.open();
            popupWin.document.write('<html><body onload="window.print()" style="border: solid black; border-width: thin;">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
			window.location='reports.php';
</script>						
						 
						 
						 