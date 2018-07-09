<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	<li class="mt">
                      <a href="application_registration.php">
                          <i class="fa fa-pencil"></i>
                          <span>Application Registration</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="">
                          <i class="fa fa-pencil-square-o"></i>
                          <span>Update Registration</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="">
                          <i class="fa fa-clock-o"></i>
                          <span>Application Processing</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a href="">
                          <i class="fa fa-file"></i>
                          <span>Reports</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-asterisk"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Application Registration</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <h5><i class="fa fa-female"></i> Applicant Details</h5>
					
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputFinancialYear">1. Financial Year</label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="financial_year" id="inputFinancialYear" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="2018-2019">2018-2019</option>
	  <option value="2017-2018">2017-2018</option>
	  <option value="2016-2017">2016-2017</option>
	  </select>
    </div>
	   
	    <div class="form-group col-md-3">
      <label for="inputTaluk">2. Taluk </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="taluk" id="inputTaluk" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="">Dummy 1</option>
	  <option value="">Dummy 2</option>
	  <option value="">Dummy 3</option>
	  </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputConstituency">3. Constituency </label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="constituency" id="inputConstituency" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="">Dummy 1</option>
	  <option value="">Dummy 2</option>
	  <option value="">Dummy 3</option>
	  </select>
    </div>
  </div>
  <div class="form-group col-md-3">
    <label for="inputVillage">4. Village </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputVillage" name="village" placeholder="" required>
  </div>
  <div class="form-group col-md-4">
    <label for="inputName">5. Name of the Applicant </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputName" name="applicant_name" placeholder="" required>
  </div>
  <div class="form-group col-md-4">
    <label for="inputParent">6. Name of the Father/Mother/Guardian</label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputParent" name="applicant_parent" placeholder="" required>
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">7. Address </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputAddress" name="applicant_address" placeholder="" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputReligon">8.Religon</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="religon" id="inputReligon" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="">Dummy 1</option>
	  <option value="">Dummy 2</option>
	  <option value="">Dummy 3</option>
	  </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputMobile">9. Mobile</label>&nbsp;<span class="high-light">*</span>
       <input type="tel" class="form-control" id="inputMobile" name="mobile" pattern="[6789][0-9]{9}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputAnnualIncome">10. Annual Income</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputAnnualIncome" name="annual_income" required>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputDateOfBirth">11. Date of Birth</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputDateOfBirth" name="date_of_birth" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputReceivedDate">12. Received Date</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputReceivedDate" name="received_date" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputDateOfMarriage">13. Date of Marriage </label>&nbsp;<span class="high-light">*</span>
      <input type="Date" class="form-control" id="inputDateOfMarriage" name="date_of_marriage" required>
    </div>
	 <div class="form-group col-md-3">
      <label for="inputPlaceOfMarriage">14. Place of Marriage </label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputPlaceOfMarriage" name="place_of_marriage" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAgeProof">15. Age Proof </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="age_proof[]" id="inputAgeProof" placeholder="" required multiple title="Please Press and hold Ctrl Button to Select Multiple Options">
	  <option  value="Birth Certificate">Birth Certificate</option>
	  <option  value="SSLC">SSLC</option>
	  <option value="TC">TC</option>
	  <option value="Notary">Notary</option>
	  <option value="Affidavit">Affidavit</option>
	  </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputDomicile">16. Domicile State </label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="domicile_state" id="inputDomicile" placeholder="" required>
	  <option  value="Karnataka">Karnataka</option>
	  <option  value="Non-Karnataka">Non-Karnataka</option>
	
	  </select>
    </div>
	
	</div>
	
	  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPhysicalHandicap">17.Physically Handicaped </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="physical_handicap" id="inputPhysicalHandicap" placeholder="" required>
	   <option  value="">Choose..</option>
	  <option  value="Applicant">Applicant</option>
	  <option  value="Mother">Mother</option>
	  <option value="Brother">Brother</option>
	  <option value="Sister">Sister</option>
	  <option value="Child/Children">Child/Children</option>
	  <option value="None">None</option>
	  </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhoto">18. Applicant Photo </label>&nbsp;<span class="high-light">*</span>
      <input class="form-control" type="file" id="inputPhoto" name="applicant_photo">
    </div>
	
	
	</div>
	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputAadhar">19.Aadhar No. </label>&nbsp;<span class="high-light">*</span>
       <input type="text" pattern="[0-9]{12}" class="form-control" name="aadhar" id="inputAadhar" placeholder="xxxx-xxxx-xxxx" required>
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputFatherAadhar">20. Father Aadhar No.</label>
       <input type="tel" class="form-control" id="inputFatherAadhar" name="father_aadhar" pattern="[0-9]{12}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputMotherAadhar">21. Mother Aadhar No.</label>
      <input type="text" class="form-control" id="inputMotherAadhar" name="mother_aadhar" pattern="[0-9]{12}">
    </div>
  </div>
  	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCasteNo">22.Caste Certificate No. </label>
       <input type="text" pattern="[0-9]{12}" class="form-control" name="caste_no" id="inputCasteNo" >
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputIncomeNo">23. Income Certificate No.</label>
       <input type="tel" class="form-control" id="inputIncomeNo" name="father_aadhar" pattern="[0-9]{12}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputBPL">24. BPL Card No.</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputBPL" name="bpl_no" pattern="[a-zA-Z][a-zA-Z][0-9]{5}" required placeholder="Ex:AZXXXXX">
    </div>
  </div>
	
  <div class="form-group col-md-12">
    <div class="form-check">
	  
      <p class="high-light"> I, the holder of Aadhaar, hereby give my consent to MeitY to share my Aadhaar Number to Directorate of Minorities for the Scheme of Bidaai for processing. MeitY/ NIC have informed me that my identity information will not be stored/shared .</p>
      
      <input class="form-check-input" type="checkbox" id="gridCheck" required>
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  

                         
                      </div>
                  </div>
				  
              </div>
			  <br/>
			  <div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <h5><i class="fa fa-bank"></i>Bank Details</h5>
					
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputAccountNo">1.Account No</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputAccountNo" name="account_no" placeholder="Ex: 1234XXXXXXX..." pattern="[0-9]{9,18}" required title="Please Verify the Account No. Properly">
    </div>
    <div class="form-group col-md-3">
      <label for="inputBankName">2.Bank Name</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="bank_name" id="inputBankName" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="">Dummy 1</option>
	  <option value="">Dummy 2</option>
	  <option value="">Dummy 3</option>
	  </select>
    </div>
		    <div class="form-group col-md-3">
      <label for="inputDistrict">3.District</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputDistrict" name="district" placeholder="Ex: Tumkur" required>
    </div>
	    <div class="form-group col-md-3">
      <label for="inputBranchName">4.Branch Name</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputBranchName" name="branch_name" placeholder="Ex: Market Branch" required>
    </div>
	 <div class="form-group col-md-3">
      <label for="inputIfsc">5.IFSC Code</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputIfsc" name="ifsc_code" placeholder="Ex: ABCDXXXXXXX" pattern="[a-zA-Z]{4}[0-9]{7}" required>
    </div>
  </div>



  

                         
                      </div>
                  </div>
				  
              </div>
			<br/>
			  <div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <h5><i class="fa fa-male"></i>&nbsp;Details of Would be Groom </h5>
					  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputGroomName">1.Name of the Groom</label>
      <input type="text" class="form-control" id="groom_name" placeholder="">
    </div>

  </div>
  <div class="form-group col-md-4">
    <label for="inputGroomAddress">2.Address</label>
    <input type="text" class="form-control" id="inputGroomAddress" name="groom_address" placeholder="1234 Main St">
  </div>
    <div class="form-group col-md-4">
      <label for="inputGroomMobile">3. Mobile</label>&nbsp;<span class="high-light">*</span>
       <input type="tel" class="form-control" id="inputGroomMobile" name="mobile" pattern="[6789][0-9]{9}" required>
    </div>
	  <div class="form-group col-md-4">
      <label for="inputDateOfBirthGroom">4. Date of Birth</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputDateOfBirthGroom" name="groom_date_of_birth" required>
    </div>
	    <div class="form-group col-md-4">
      <label for="inputAgeProofGroom">5. Age Proof </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="groom_age_proof[]" id="inputAgeProofGroom" placeholder="" required multiple title="Please Press and hold Ctrl Button to Select Multiple Options">
	  <option  value="Birth Certificate">Birth Certificate</option>
	  <option  value="SSLC">SSLC</option>
	  <option value="TC">TC</option>
	  <option value="Notary">Notary</option>
	  <option value="Affidavit">Affidavit</option>
	  </select>
    </div>
	 <div class="form-group col-md-4">
      <label for="inputAadharGroom">6.Aadhar No. </label>&nbsp;<span class="high-light">*</span>
      <input type="text" pattern="[0-9]{12}" class="form-control" name="groom_aadhar" id="inputAadharGroom" placeholder="xxxx-xxxx-xxxx" required>
	  
    </div>

  

                         
                      </div>
                  </div>
				  
              </div>
			  
			  <br/>
			  <div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <h5><i class="fa fa-file-word-o"></i> Document Details</h5>
					 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputMaritalStatusGroom">1.Marital Status of the Would-be Groom</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="groom_marital_status" id="inputMaritalStatusGroom" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="">Married</option>
	  <option value="">Unmarried</option>
	  <option value="">Divocered</option>
	  <option value="">Widower</option>
	  </select>
    </div>
     <div class="form-group col-md-6">
      <label for="inputMaritalStatusBride">1.Marital Status of the Would-be Bride</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="bride_marital_status" id="inputMaritalStatusBride" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="">Married</option>
	  <option value="">Unmarried</option>
	  <option value="">Divocered</option>
	  <option value="">Widower</option>
	  </select>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputDocumentStatus">Marriage Document/Invitation Card Attached ? </label><br/>
    <input type="Radio"  id="inputDocumentStatusYes" name="document_status" value="Yes"><label for="inputDocumentStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio" id="inputDocumentStatusNo" name="document_status" value="No"><label for="inputDocumentStatusYes">&nbsp;No</label>
  </div>
 <div class="form-group col-md-6">
    <label for="inputAffidavitStatus">Affidavit Attached? </label><br/>
    <input type="Radio"  id="inputAffidavitStatusYes" name="affidavit_status" value="Yes"><label for="inputAffidavitStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio"  id="inputAffidavitStatusNo" name="affidavit_status" value="No"><label for="inputAffidavitStatusNo">&nbsp;No</label>
  </div>


  

                         
                      </div>
                  </div>
				  
              </div>
			  </form>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
