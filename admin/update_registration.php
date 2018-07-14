<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
check_login();
$show="";

if(isset($_POST['searchButton']))
{
  $search_text=$_POST['search'];
  $_SESSION['search']=$search_text;
  $result=mysqli_query($con,"SELECT * from application_table where app_id='$search_text'");
  $result_array=mysqli_fetch_array($result);
  $show=1;
  $status="";
  
}
if(isset($_POST['updateApp']))
{
  $financial_year=$_POST['financial_year'];
  $taluk=$_POST['taluk'];
  $constituency=$_POST['constituency'];
  $village=$_POST['village'];
  $applicant_name=$_POST['applicant_name'];
  $parent=$_POST['applicant_parent'];
  $address=$_POST['applicant_address'];
  $religion=$_POST['religion'];
  $mobile=$_POST['mobile'];
  $annual_income=$_POST['annual_income'];
  $dob=$_POST['date_of_birth'];
  $received_date=$_POST['received_date'];
  $marriage_place=$_POST['place_of_marriage'];
  $marriage_date=$_POST['date_of_marriage'];
   $age_proof=implode(",",$_POST['age_proof']);
  $domicile_state=$_POST['domicile_state'];
  $physically_handicap=$_POST['physical_handicap'];
  $applicant_photo=$_FILES['applicant_photo']['name'];
  $aadhar_no=$_POST['aadhar'];
  $father_aadhar=$_POST['father_aadhar'];
  $mother_aadhar=$_POST['mother_aadhar'];
  $caste_certificate_no=$_POST['caste_no'];
  $income_certificate_no=$_POST['income_certificate_no'];
  $bpl_card_no=$_POST['bpl_no'];
  $account_no=$_POST['account_no'];
  $bank=$_POST['bank_name'];
  $district=$_POST['district'];
  $branch=$_POST['branch_name'];
  $ifsc_code=$_POST['ifsc_code'];
  $name_of_the_would_be_groom=$_POST['groom_name'];
  $address_of_the_would_be_groom=$_POST['groom_address'];
  $groom_mobile=$_POST['groom_mobile'];
  $groom_dob=$_POST['groom_date_of_birth'];
  $groom_age_proof=implode(",",$_POST['groom_age_proof']);
  $groom_aadhar_no=$_POST['groom_aadhar'];
  $marital_status_of_the_would_be_groom=$_POST['groom_marital_status'];
  $marital_status_of_the_would_be_bride=$_POST['bride_marital_status'];
  $marriage_document=$_POST['document_status'];
  $affidavit_attached=$_POST['affidavit_status'];
  $verify_status=$_POST['verify_status'];
  	 $path = "images/";
    $path = $path . basename($applicant_photo);
    move_uploaded_file($_FILES['applicant_photo']['tmp_name'], $path);
  if($verify_status=='Yes')
  {
	  $status=3;
  }
  else
  {
	  $status=2;
  }
	  

 $sql_query=
  " UPDATE application_table SET financial_year='$financial_year', taluk='$taluk', constituency='$constituency', village='$village', applicant_name='$applicant_name', parent='$parent', address='$address', religion='$religion', mobile='$mobile', annual_income='$annual_income', dob='$dob', received_date='$received_date', marriage_place='$marriage_place', marriage_date='$marriage_date', age_proof='$age_proof', domicile_state='$domicile_state', physically_handicap='$physically_handicap', applicant_photo='$path', aadhar_no='$aadhar_no', father_aadhar='$father_aadhar', mother_aadhar='$mother_aadhar', caste_certificate_no='$caste_certificate_no', income_certificate_no='$income_certificate_no', bpl_card_no='$bpl_card_no', account_no='$account_no', bank='$bank', district='$district', branch='$branch', ifsc_code='$ifsc_code', name_of_the_would_be_groom='$name_of_the_would_be_groom', address_of_the_would_be_groom='$address_of_the_would_be_groom', groom_mobile='$groom_mobile', groom_dob='$groom_dob', groom_age_proof='$groom_age_proof', groom_aadhar_no='$groom_aadhar_no', marital_status_of_the_would_be_groom='$marital_status_of_the_would_be_groom', marital_status_of_the_would_be_bride='$marital_status_of_the_would_be_bride', marriage_document='$marriage_document', affidavit_attached='$affidavit_attached',verify_document='$verify_status',status='$status' where app_id=".$_SESSION['search']."";
  $sql_exec=mysqli_query($con,$sql_query);
  if($sql_exec)
  {
    if($status==3)
    {
      $message="Hurrey! The Application is completed!";
    }
    else
    {
       $message="The Application is still pending!"; 
    } 
	//$message="Details have been Updated Successfully!";
   
    
  }
  else
  {
    $message="Awwwww! There is some error occured . Please try again!"." ".mysqli_error($con);
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
	    <script>
     function previewFile(){
	   var fileTypes = ['jpg', 'jpeg', 'png'];
       var preview = document.querySelector('#inputPhotoUpload'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
	   var extension = document.querySelector('input[type=file]').files[0].name.split('.').pop().toLowerCase(),
	   isSuccess = fileTypes.indexOf(extension) > -1; 
       var reader  = new FileReader();

      if(isSuccess)
	  {
		   reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
	  }
	  else{
		  document.getElementById('inputPhoto').value="";
		  document.getElementById('errorText').innerHTML="Please Upload Image file!";
		  
	  }
  }


  
    </script>
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
              
              	  <p class="centered"><a href="admin-home.php"><img src="assets/img/ui-sam.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo strtoupper($_SESSION['login']);?></h5>
              	  	<li class="mt">
                      <a href="application_registration.php">
                          <i class="fa fa-pencil"></i>
                          <span>Application Registration</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="update_registration.php">
                          <i class="fa fa-pencil-square-o"></i>
                          <span>Update Registration</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="application_process.php">
                          <i class="fa fa-clock-o"></i>
                          <span>Application Processing</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a href="reports.php">
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


              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Update Registration</h3>
            <form action="" method="POST"><div class="col-md-12"><div class="form-group col-md-6"> <input type="text" class="form-control" placeholder="Search.." name="search"></div>
                  <div class="form-group col-md-6"><button type="submit" name="searchButton" class="btn btn-primary"><i class="fa fa-search"></i></button></div></div></form>
            
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="col-md-12">
          <p class="high-light text-center"><?php echo $message;?></p>
        </div>
				<div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <h5><i class="fa fa-female"></i> Applicant Details</h5>
					
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputFinancialYear">1. Financial Year</label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="financial_year" id="inputFinancialYear" placeholder="" required>
	  <option  value="<?php echo $result_array['financial_year'] ;?>" selected><?php echo $result_array['financial_year'] ;?></option>
	  <option  value="2018-2019">2018-2019</option>
	  <option value="2017-2018">2017-2018</option>
	  <option value="2016-2017">2016-2017</option>
	  </select>
    </div>
	   
	    <div class="form-group col-md-3">
      <label for="inputTaluk">2. Taluk </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="taluk" id="inputTaluk" placeholder="" required>
	  <option  value="<?php echo $result_array['taluk']; ?>" selected><?php echo $result_array['taluk']; ?></option>
	  <option  value="Dummy 1">Dummy 1</option>
	  <option value="Dummy 2">Dummy 2</option>
	  <option value="Dummy 3">Dummy 3</option>
	  </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputConstituency">3. Constituency </label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="constituency" id="inputConstituency" placeholder="" required>
	  <option  value="<?php echo $result_array['constituency']; ?>" selected><?php echo $result_array['constituency']; ?></option>
	  <option  value="Dummy 1">Dummy 1</option>
	  <option value="Dummy 2">Dummy 2</option>
	  <option value="Dummy 3">Dummy 3</option>
	  </select>
    </div>
  </div>
  <div class="form-group col-md-3">
    <label for="inputVillage">4. Village </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputVillage" name="village" placeholder="" required value="<?php echo $result_array['village']; ?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputName">5. Name of the Applicant </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputName" name="applicant_name" placeholder="" required value="<?php echo $result_array['applicant_name'] ;?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputParent">6. Name of the Father/Mother/Guardian</label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputParent" name="applicant_parent" placeholder="" required value="<?php echo $result_array['parent'] ;?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">7. Address </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputAddress" name="applicant_address" placeholder="" required value="<?php echo $result_array['address']; ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputReligon">8.Religion</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="religion" id="inputReligon" placeholder="" required>
	  <option  value="<?php echo $result_array['religion']; ?>" selected><?php echo $result_array['religion']; ?></option>
	  <option  value="Dummy 1">Dummy 1</option>
	  <option value="Dummy 2">Dummy 2</option>
	  <option value="Dummy 3">Dummy 3</option>
	  </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputMobile">9. Mobile</label>&nbsp;<span class="high-light">*</span>
       <input type="tel" class="form-control" id="inputMobile" name="mobile" pattern="[6789][0-9]{9}" required value="<?php echo $result_array['mobile'] ;?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputAnnualIncome">10. Annual Income</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputAnnualIncome" name="annual_income" required maxlength="6" value="<?php echo $result_array['annual_income'];  ?>">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputDateOfBirth">11. Date of Birth</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputDateOfBirth" name="date_of_birth" required value="<?php echo $result_array['dob']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputReceivedDate">12. Received Date</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputReceivedDate" name="received_date" required value="<?php echo $result_array['received_date']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputDateOfMarriage">13. Date of Marriage </label>&nbsp;<span class="high-light">*</span>
      <input type="Date" class="form-control" id="inputDateOfMarriage" name="date_of_marriage" required value="<?php echo $result_array['marriage_date']; ?>">
    </div>
	 <div class="form-group col-md-3">
      <label for="inputPlaceOfMarriage">14. Place of Marriage </label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputPlaceOfMarriage" name="place_of_marriage" required value="<?php echo $result_array['marriage_place'] ;?>">
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
      <select class="form-control" name="domicile_state" id="inputDomicile" placeholder="" required >
     <option value="<?php echo $result_array['domicile_state']; ?>"><?php echo $result_array['domicile_state']; ?></option>   
	  <option  value="Karnataka">Karnataka</option>
	  <option  value="Non-Karnataka">Non-Karnataka</option>
	
	  </select>
    </div>
	
	</div>
	
	  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPhysicalHandicap">17.Physically Handicaped </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="physical_handicap" id="inputPhysicalHandicap" placeholder="" required>
	   <option  value="<?php echo $result_array['physically_handicap']; ?>"><?php echo $result_array['physically_handicap']; ?></option>
	  <option  value="Applicant">Applicant</option>
	  <option  value="Mother">Mother</option>
	  <option value="Brother">Brother</option>
	  <option value="Sister">Sister</option>
	  <option value="Child/Children">Child/Children</option>
	  <option value="None">None</option>
	  </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPhoto">18. Applicant Photo </label>&nbsp;<span class="high-light">*</span>
      <input class="form-control" type="file" id="inputPhoto" name="applicant_photo"onchange="previewFile()">
	  <p id="errorText" class="high-light"></p>
    </div>
	<div class="form-group col-md-4">
      <img src="<?php echo $result_array['applicant_photo']; ?>" id="inputPhotoUpload" height="100" width="100" alt="Applicant Photo">
    </div>
	
	
	</div>
	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputAadhar">19.Aadhar No. </label>&nbsp;<span class="high-light">*</span>
       <input type="text" pattern="[0-9]{12}" class="form-control" name="aadhar" id="inputAadhar" placeholder="xxxx-xxxx-xxxx" required value="<?php echo $result_array['aadhar_no']; ?>">
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputFatherAadhar">20. Father Aadhar No.</label>
       <input type="tel" class="form-control" id="inputFatherAadhar" name="father_aadhar" pattern="[0-9]{12}" value="<?php echo $result_array['father_aadhar']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputMotherAadhar">21. Mother Aadhar No.</label>
      <input type="text" class="form-control" id="inputMotherAadhar" name="mother_aadhar" pattern="[0-9]{12}" value="<?php echo $result_array['mother_aadhar']; ?>">
    </div>
  </div>
  	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCasteNo">22.Caste Certificate No. </label>
       <input type="text" pattern="[0-9]{12}" class="form-control" name="caste_no" id="inputCasteNo" value="<?php echo $result_array['caste_certificate_no']; ?>" >
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputIncomeNo">23. Income Certificate No.</label>
       <input type="tel" class="form-control" id="inputIncomeNo" name="father_aadhar" pattern="[0-9]{12}" value="<?php echo $result_array['income_certificate_no']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputBPL">24. BPL Card No.</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputBPL" name="bpl_no" pattern="[a-zA-Z][a-zA-Z][0-9]{5}" required placeholder="Ex:AZXXXXX" value="<?php echo $result_array['bpl_card_no']; ?>">
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
      <input type="text" class="form-control" id="inputAccountNo" name="account_no" placeholder="Ex: 1234XXXXXXX..." pattern="[0-9]{9,18}" required title="Please Verify the Account No. Properly" value="<?php echo $result_array['account_no']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputBankName">2.Bank Name</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="bank_name" id="inputBankName" required >
	  <option  value="<?php echo $result_array['bank']; ?>" selected><?php echo $result_array['bank']; ?></option>
	  <option  value="">Dummy 1</option>
	  <option value="">Dummy 2</option>
	  <option value="">Dummy 3</option>
	  </select>
    </div>
		    <div class="form-group col-md-3">
      <label for="inputDistrict">3.District</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputDistrict" name="district" placeholder="Ex: Tumkur" required value="<?php echo $result_array['district']; ?>">
    </div>
	    <div class="form-group col-md-3">
      <label for="inputBranchName">4.Branch Name</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputBranchName" name="branch_name" placeholder="Ex: Market Branch" required value="<?php echo $result_array['branch']; ?>">
    </div>
	 <div class="form-group col-md-3">
      <label for="inputIfsc">5.IFSC Code</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputIfsc" name="ifsc_code" placeholder="Ex: ABCDXXXXXXX" pattern="[a-zA-Z]{4}[0-9]{7}" required value="<?php echo $result_array['ifsc_code']; ?>">
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
      <input type="text" class="form-control" id="groom_name" name="groom_name" placeholder="" value="<?php echo $result_array['name_of_the_would_be_groom']; ?>">
    </div>

  </div>
  <div class="form-group col-md-4">
    <label for="inputGroomAddress">2.Address</label>
    <input type="text" class="form-control" id="inputGroomAddress" name="groom_address" placeholder="1234 Main St" value="<?php echo $result_array['address_of_the_would_be_groom']; ?>">
  </div>
    <div class="form-group col-md-4">
      <label for="inputGroomMobile">3. Mobile</label>&nbsp;<span class="high-light">*</span>
       <input type="tel" class="form-control" id="inputGroomMobile" name="groom_mobile" pattern="[6789][0-9]{9}" required value="<?php echo $result_array['groom_mobile']; ?>">
    </div>
	  <div class="form-group col-md-4">
      <label for="inputDateOfBirthGroom">4. Date of Birth</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputDateOfBirthGroom" name="groom_date_of_birth" required value="<?php echo $result_array['groom_dob']; ?>">
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
      <input type="text" pattern="[0-9]{12}" class="form-control" name="groom_aadhar" id="inputAadharGroom" placeholder="xxxx-xxxx-xxxx" required value="<?php echo $result_array['groom_aadhar_no']; ?>">
	  
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
	  <option  value="<?php echo $result_array['marital_status_of_the_would_be_groom']; ?>" selected><?php echo $result_array['marital_status_of_the_would_be_groom']; ?></option>
	  <option  value="Married">Married</option>
	  <option value="Unmarried">Unmarried</option>
	  <option value="Divocered">Divocered</option>
	  <option value="Widower">Widower</option>
	  </select>
    </div>
     <div class="form-group col-md-6">
      <label for="inputMaritalStatusBride">1.Marital Status of the Would-be Bride</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="bride_marital_status" id="inputMaritalStatusBride" placeholder="" required>
	  <option  value="<?php echo $result_array['marital_status_of_the_would_be_bride']; ?>" selected><?php echo $result_array['marital_status_of_the_would_be_bride']; ?></option>
	  <option  value="Married">Married</option>
	  <option value="Unmarried">Unmarried</option>
	  <option value="Divocered">Divocered</option>
	  <option value="Widow">Widow</option>
	  </select>
    </div>
  </div>
  <div class="form-group col-md-6">
    
	<?php 
	if('Yes'==$result_array['marriage_document'])
		
	{
		?>
		<label for="inputDocumentStatus">Marriage Document/Invitation Card Attached ? </label><br/>
    <input type="Radio"  id="inputDocumentStatusYes" name="document_status" value="Yes" checked><label for="inputDocumentStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio" id="inputDocumentStatusNo" name="document_status" value="No"><label for="inputDocumentStatusYes">&nbsp;No</label>
<?php
	}
	else{
	?>
			<label for="inputDocumentStatus">Marriage Document/Invitation Card Attached ? </label><br/>
    <input type="Radio"  id="inputDocumentStatusYes" name="document_status" value="Yes" ><label for="inputDocumentStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio" id="inputDocumentStatusNo" name="document_status" value="No" checked><label for="inputDocumentStatusYes">&nbsp;No</label>
	<?php
	}
	?>
	
  </div>
 <div class="form-group col-md-6">
 <?php 
	if('Yes'==$result_array['affidavit_attached'])
		
	{
		?>
    <label for="inputAffidavitStatus">Affidavit Attached? </label><br/>
    <input type="Radio"  id="inputAffidavitStatusYes" name="affidavit_status" value="Yes" checked><label for="inputAffidavitStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio"  id="inputAffidavitStatusNo" name="affidavit_status" value="No"><label for="inputAffidavitStatusNo">&nbsp;No</label>
	<?php
	}else{
		?>
		    <label for="inputAffidavitStatus">Affidavit Attached? </label><br/>
    <input type="Radio"  id="inputAffidavitStatusYes" name="affidavit_status" value="Yes" ><label for="inputAffidavitStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio"  id="inputAffidavitStatusNo" name="affidavit_status" value="No" checked><label for="inputAffidavitStatusNo">&nbsp;No</label>

	<?php
	}
	?>
  </div>
  
  

                         
                      </div>
                  </div>
				  
              </div><br/>
			  <?php
			  if($show==1)
			  {
				?>  
				<div class="row">
				
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel col-md-12">
					  <h5><i class="fa fa-file-word-o"></i>After Marriage Verification</h5>
					 
	<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputDocumentStatus">&nbsp;Are Marriage Photo and Necessary Document have submitted? </label><br/>
    <input type="Radio"  id="inputVerifyStatusYes" name="verify_status" value="Yes"><label for="inputDocumentStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio" id="inputVerifyStatusNo" name="verify_status" value="No"><label for="inputDocumentStatusYes">&nbsp;No</label>
  </div>
  </div>

                         </div>
                  </div>
				  
              </div>
				
			  
			  <?php
			  }
				  ?>
			  
			  <br/>
			  <div class="form-row">
			  <div class="form-group col-md-5">&nbsp;</div>
			  <div class="form-group col-md-5"><button type="submit" name="updateApp" class="btn btn-primary">Update</button>
			  </div>
			  <div class="form-group col-md-2">&nbsp;</div>
			  
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
