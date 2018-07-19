<?php

session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$message="";
$district_ref_id="";
if(isset($_POST['submit_app']))
{
  $created_by=$_SESSION['login'];
	$financial_year=$_POST['financial_year'];
	$taluk=$_POST['taluk'];
	$constituency=$_POST['constituency'];
	 $village=$_POST['village'];
	$village_kannada=$_POST['village_kannada'];
	$applicant_name=$_POST['applicant_name'];
	$parent=$_POST['applicant_parent'];
	$address=$_POST['applicant_address'];
		$applicant_name_kannada=$_POST['applicant_name_kannada'];
	$parent_kannada=$_POST['applicant_parent_kannada'];
	$address_kannada=$_POST['applicant_address_kannada'];
	$religion=$_POST['religion'];
	$mobile=$_POST['mobile'];
	$annual_income=$_POST['annual_income'];
	$dob=$_POST['date_of_birth'];
	$received_date=$_POST['received_date'];
	$marriage_place=$_POST['place_of_marriage'];
	$marriage_place_kannada=$_POST['place_of_marriage_kannada'];
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
		$name_of_the_would_be_groom_kannada=$_POST['groom_name_kannada'];
	$address_of_the_would_be_groom_kannada=$_POST['groom_address_kannada'];
	$groom_mobile=$_POST['groom_mobile'];
	$groom_dob=$_POST['groom_date_of_birth'];
	$groom_age_proof=implode(",",$_POST['groom_age_proof']);
	$groom_aadhar_no=$_POST['groom_aadhar'];
	$marital_status_of_the_would_be_groom=$_POST['groom_marital_status'];
	$marital_status_of_the_would_be_bride=$_POST['bride_marital_status'];
	$marriage_document=$_POST['document_status'];
	$affidavit_attached=$_POST['affidavit_status'];
	 $path = "images/";
    $path = $path . basename($applicant_photo);
    move_uploaded_file($_FILES['applicant_photo']['tmp_name'], $path);
    

$date1=date_create($received_date);
$date2=date_create($marriage_date);
$diff=date_diff($date1,$date2);
$diff_days= $diff->format("%a");
if($diff_days>=7)
{
  $status=1;
  
}
else
{
  $status=0;
  
}

	
  $sql_query=
	"INSERT INTO application_table(app_id,financial_year, taluk, constituency,village,village_kannada,applicant_name,applicant_name_kannada, parent,parent_kannada, address,address_kannada, religion, mobile, annual_income, dob, received_date, marriage_place,marriage_place_kannada, marriage_date, age_proof, domicile_state, physically_handicap, applicant_photo, aadhar_no, father_aadhar, mother_aadhar, caste_certificate_no, income_certificate_no, bpl_card_no, account_no, bank, district, branch, ifsc_code, name_of_the_would_be_groom,name_of_the_would_be_groom_kannada, address_of_the_would_be_groom,address_of_the_would_be_groom_kannada, groom_mobile, groom_dob, groom_age_proof, groom_aadhar_no, marital_status_of_the_would_be_groom, marital_status_of_the_would_be_bride, marriage_document, affidavit_attached,verify_document,created_by,status) VALUES (null,'$financial_year','$taluk','$constituency','$village','$village_kannada','$applicant_name','$applicant_name_kannada','$parent','$parent_kannada','$address','$address_kannada','$religion','$mobile','$annual_income','$dob','$received_date','$marriage_place','$marriage_place_kannada','$marriage_date','$age_proof','$domicile_state','$physically_handicap','$path','$aadhar_no','$father_aadhar','$mother_aadhar','$caste_certificate_no','$income_certificate_no','$bpl_card_no','$account_no','$bank','$district','$branch','$ifsc_code','$name_of_the_would_be_groom','$name_of_the_would_be_groom_kannada','$address_of_the_would_be_groom','$address_of_the_would_be_groom_kannada','$groom_mobile','$groom_dob','$groom_age_proof','$groom_aadhar_no','$marital_status_of_the_would_be_groom','$marital_status_of_the_would_be_bride','$marriage_document','$affidavit_attached','','$created_by','$status')";
	$sql_exec=mysqli_query($con,$sql_query);
	if($sql_exec)
	{
    if($status==0)
    {
      $message="Sorry! the Application got Rejected!";
    }
    else
    {
       $message="Details have been Saved Successfully!";
    }
   
		
	}
	else
	{
		$message="Awwwww! There is some error occured . Please try again!"." ".mysqli_error($con);
	}
  

}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
   <link href="assets/js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
<script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
	

	<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
google.load("elements", "1", {packages: "transliteration"});
</script> 




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
	    <script>


      // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {

        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.KANNADA],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        // Create an instance on TransliterationControl with the required
        // options.
	
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
		var ids = [ "inputVillageKannada", "inputNameKannada","inputParentKannada","inputAddressKannada","inputPlaceOfMarriageKannada","inputGroomNameKannada","inputGroomAddressKannada" ];
        control.makeTransliteratable(ids);
		
		
		var keyVal = 32; // Space key
    $("#inputVillage").on('keydown', function(event) {
        if(event.keyCode === 32) {
            var engText = $("#inputVillage").val() + " ";
            var engTextArray = engText.split(" ");
            $("#inputVillageKannada").val($("#inputVillageKannada").val() + engTextArray[engTextArray.length-2]);

            document.getElementById("inputVillageKannada").focus();
            $("#inputVillageKannada").trigger ( {
                type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
            } );
        }
    });
	    $("#inputName").on('keydown', function(event) {
        if(event.keyCode === 32) {
            var engText = $("#inputName").val() + " ";
            var engTextArray = engText.split(" ");
            $("#inputNameKannada").val($("#inputNameKannada").val() + engTextArray[engTextArray.length-2]);

            document.getElementById("inputNameKannada").focus();
            $("#inputNameKannada").trigger ( {
                type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
            } );
        }
    });
	 $("#inputParent").on('keydown', function(event) {
        if(event.keyCode === 32) {
            var engText = $("#inputParent").val() + " ";
            var engTextArray = engText.split(" ");
            $("#inputParentKannada").val($("#inputParentKannada").val() + engTextArray[engTextArray.length-2]);

            document.getElementById("inputParentKannada").focus();
            $("#inputParentKannada").trigger ( {
                type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
            } );
        }
    });
		 $("#inputAddress").on('keydown', function(event) {
        if(event.keyCode === 32) {
            var engText = $("#inputAddress").val() + " ";
            var engTextArray = engText.split(" ");
            $("#inputAddressKannada").val($("#inputAddressKannada").val() + engTextArray[engTextArray.length-2]);

            document.getElementById("inputAddressKannada").focus();
            $("#inputAddressKannada").trigger ( {
                type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
            } );
        }
    });
			 $("#inputPlaceOfMarriage").on('keydown', function(event) {
        if(event.keyCode === 32) {
            var engText = $("#inputPlaceOfMarriage").val() + " ";
            var engTextArray = engText.split(" ");
            $("#inputPlaceOfMarriageKannada").val($("#inputPlaceOfMarriageKannada").val() + engTextArray[engTextArray.length-2]);

            document.getElementById("inputPlaceOfMarriageKannada").focus();
            $("#inputPlaceOfMarriageKannada").trigger ( {
                type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
            } );
        }
    });
	$("#inputGroomName").on('keydown', function(event) {
        if(event.keyCode === 32) {
            var engText = $("#inputGroomName").val() + " ";
            var engTextArray = engText.split(" ");
            $("#inputGroomNameKannada").val($("#inputGroomNameKannada").val() + engTextArray[engTextArray.length-2]);

            document.getElementById("inputGroomNameKannada").focus();
            $("#inputGroomNameKannada").trigger ( {
                type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
            } );
        }
    });
  $("#inputGroomAddress").on('keydown', function(event) {
        if(event.keyCode === 32) {
            var engText = $("#inputGroomAddress").val() + " ";
            var engTextArray = engText.split(" ");
            $("#inputGroomAddressKannada").val($("#inputGroomAddressKannada").val() + engTextArray[engTextArray.length-2]);

            document.getElementById("inputGroomAddressKannada").focus();
            $("#inputGroomAddressKannada").trigger ( {
                type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
            } );
        }
    });

    $("#inputVillageKannada").bind ("keyup",  function (event) {
        setTimeout(function(){ $("#inputVillage").val($("#inputVillage").val() + " "); document.getElementById("inputVillage").focus()},0);
    });
    $("#inputNameKannada").bind ("keyup",  function (event) {
        setTimeout(function(){ $("#inputName").val($("#inputName").val() + " "); document.getElementById("inputName").focus()},0);
    });
	$("#inputParentKannada").bind ("keyup",  function (event) {
        setTimeout(function(){ $("#inputParent").val($("#inputParent").val() + " "); document.getElementById("inputParent").focus()},0);
    });
		$("#inputAddressKannada").bind ("keyup",  function (event) {
        setTimeout(function(){ $("#inputAddress").val($("#inputAddress").val() + " "); document.getElementById("inputAddress").focus()},0);
    });
			$("#inputPlaceOfMarriageKannada").bind ("keyup",  function (event) {
        setTimeout(function(){ $("#inputPlaceOfMarriage").val($("#inputPlaceOfMarriage").val() + " "); document.getElementById("inputPlaceOfMarriage").focus()},0);
    });
  		$("#inputGroomNameKannada").bind ("keyup",  function (event) {
        setTimeout(function(){ $("#inputGroomName").val($("#inputGroomName").val() + " "); document.getElementById("inputGroomName").focus()},0);
    });
		$("#inputGroomAddressKannada").bind ("keyup",  function (event) {
        setTimeout(function(){ $("#inputGroomAddress").val($("#inputGroomAddress").val() + " "); document.getElementById("inputGroomAddress").focus()},0);
    });

      }
      google.setOnLoadCallback(onLoad);
/* 
function calculateAge(birthday) {
	// birthday is a date
	var parts = birthday.match(/(\d+)/g);
  // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
	var bday= new Date(parts[0], parts[1]-1, parts[2]);
    var ageDifMs = Date.now() - bday.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    document.getElementById('displayAge').innerHTML=Math.abs(ageDate.getUTCFullYear() - 1970);
} */


 
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
          	<h3><i class="fa fa-angle-right"></i> Application Registration</h3>

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
	  <option  value="" selected>Choose..</option>
	  <option  value="2018-2019">2018-2019</option>
	  <option value="2017-2018">2017-2018</option>
	  <option value="2016-2017">2016-2017</option>
	  </select>
    </div>
	   
	    <div class="form-group col-md-3">
		<?php
			$talukQuery=mysqli_query($con,"SELECT * FROM taluk_details WHERE district_fn_id=(SELECT district_details.district_id from district_details WHERE district_details.district_name='".$_SESSION['login']."' )");
		?>
      <label for="inputTaluk">2. Taluk </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="taluk" id="inputTaluk" placeholder="" required">
			<option>Choose..</option>
			<?php
				while($taluk_row=mysqli_fetch_array($talukQuery))
				{	
				     $district_ref_id=$taluk_row['district_fn_id'];
			?>
					<option value="<?php echo $taluk_row['taluk_name'];?>"><?php echo $taluk_row['taluk_name'];?></option>

			<?php
					
				}
					
	           
				
				?>
	  </select>
	

    </div>
    <div class="form-group col-md-3">
		<?php
				
			$constituencyQuery=mysqli_query($con,"SELECT * FROM constituency_details WHERE constituency_district_id='".$district_ref_id."'");
		?>
      <label for="inputConstituency">3. Constituency </label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="constituency" id="inputConstituency" placeholder="" required>
	  <option  value="" selected>Choose..</option>

	<?php
				while($constituency_row=mysqli_fetch_array($constituencyQuery))
				{	
				     
			?>
					<option value="<?php echo $constituency_row['constituency_name'];?>"><?php echo $constituency_row['constituency_name'];?></option>

			<?php
					
				}
					
	           
				
				?>
	  </select>
    </div>
  </div>
  <div class="form-group col-md-3">
    <label for="inputVillage">4. Village </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputVillage" name="village" placeholder="" required pattern="[a-zA-Z\s]+">
	<input type="text" class="form-control" id="inputVillageKannada" name="village_kannada">
	
	
  </div>
  <div class="form-group col-md-4">
    <label for="inputName">5. Name of the Applicant </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputName" name="applicant_name" placeholder="" required pattern="[a-zA-Z\s]+">
	<input type="text" class="form-control" id="inputNameKannada" name="applicant_name_kannada">
  </div>
  <div class="form-group col-md-4">
    <label for="inputParent">6. Name of the Father/Mother/Guardian</label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputParent" name="applicant_parent" placeholder="" required pattern="[a-zA-Z\s]+">
	<input type="text" class="form-control" id="inputParentKannada" name="applicant_parent_kannada">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">7. Address </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputAddress" name="applicant_address" placeholder="" required>
<input type="text" class="form-control" id="inputAddressKannada" name="applicant_address_kannada">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputReligon">8.Religion</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="religion" id="inputReligon" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="Muslim">Muslim</option>
	  <option value="Christian">Christian</option>
	  <option value="Sikh">Sikh</option>
<option value="Buddh">Buddh</option>
	<option value="Jain">Jain</option>
	<option value="Parsi">Parsi</option>
	  </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputMobile">9. Mobile</label>&nbsp;<span class="high-light">*</span>
       <input type="tel" class="form-control" id="inputMobile" name="mobile" pattern="[6789][0-9]{9}" required maxlength="10">
    </div>
    <div class="form-group col-md-4">
      <label for="inputAnnualIncome">10. Annual Income</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputAnnualIncome" name="annual_income" required maxlength="6">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputDateOfBirth">11. Date of Birth</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputDateOfBirth" name="date_of_birth" required max="2000-07-31"> 
		
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
	<input type="text" class="form-control" id="inputPlaceOfMarriageKannada" name="place_of_marriage_kannada">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAgeProof">15. Age Proof </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="age_proof[]" id="inputAgeProof" placeholder="" required multiple title="Please Press and hold Ctrl Button to Select Multiple Options" >
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
    <div class="form-group col-md-4">
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
    <div class="form-group col-md-4">
      <label for="inputPhoto">18. Applicant Photo </label>&nbsp;<span class="high-light">*</span>
      <input class="form-control" type="file" id="inputPhoto" name="applicant_photo" onchange="previewFile()">
	
	  <p id="errorText" class="high-light"></p>
    </div>
    <div class="form-group col-md-4">
      <img src="" id="inputPhotoUpload" height="100" width="100" alt="Applicant Photo">
    </div>

	
	
	</div>
	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputAadhar">19.Aadhar No. </label>&nbsp;<span class="high-light">*</span>
       <input type="text" pattern="[0-9]{12}" class="form-control" name="aadhar" id="inputAadhar" placeholder="xxxx-xxxx-xxxx" required maxlength="12">
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputFatherAadhar">20. Father Aadhar No.</label>
       <input type="tel" class="form-control" id="inputFatherAadhar" name="father_aadhar" pattern="[0-9]{12}" maxlength="12">
    </div>
    <div class="form-group col-md-4">
      <label for="inputMotherAadhar">21. Mother Aadhar No.</label>
      <input type="text" class="form-control" id="inputMotherAadhar" name="mother_aadhar" pattern="[0-9]{12}" maxlength="12">
    </div>
  </div>
  	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCasteNo">22.Caste Certificate No. </label>
       <input type="text" pattern="[a-zA-Z][a-zA-Z][0-9]{5,15}" class="form-control" name="caste_no" id="inputCasteNo" maxlength="17">
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputIncomeNo">23. Income Certificate No.</label>
       <input type="text" class="form-control" id="inputIncomeNo" name="income_certificate_no" maxlength="17" pattern="[a-zA-Z][a-zA-Z][0-9]{5,15}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputBPL">24. BPL Card No.</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputBPL" name="bpl_no" required  maxlength="15" pattern="[a-zA-Z][a-zA-Z][0-9]{5,13}">
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
	<?php 
		$bankQuery=mysqli_query($con,"Select distinct(bank_name) from bank_details");
?>
      <label for="inputBankName">2.Bank Name</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="bank_name" id="inputBankName" required>
	  <option  value="" selected>Choose..</option>
	<?php
	
	while($bank_row=mysqli_fetch_array($bankQuery))
	{
	?>
	  <option  value="<?php echo $bank_row['bank_name'] ?>"><?php echo $bank_row['bank_name'] ?></option>
	<?php
	}
   ?>
	  </select>
    </div>
		    <div class="form-group col-md-3">
	<?php 
		$disQuery=mysqli_query($con,"Select distinct(bank_district) from bank_details");
?>
      <label for="inputDistrict">3.District</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" id="inputDistrict" name="district" required>
<option  value="" selected>Choose..</option>
<?php
	
	while($bank_dis_row=mysqli_fetch_array($disQuery))
	{
	?>
	  <option  value="<?php echo $bank_dis_row['bank_district'] ?>"><?php echo $bank_dis_row['bank_district'] ?></option>
	<?php
	}
   ?>
	</select>
    </div>
	    <div class="form-group col-md-3">
      <label for="inputBranchName">4.Branch Name</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputBranchName" name="branch_name" placeholder="Ex: Market Branch" required onfocus="fetchBranch()">
    </div>
	 <div class="form-group col-md-3">
      <label for="inputIfsc">5.IFSC Code</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputIfsc" name="ifsc_code" placeholder="Ex: ABCDXXXXXXX" pattern="[a-zA-Z]{4}[0-9]{7}" required onfocus="fetchIfsc()" readonly>
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
      <input type="text" class="form-control" name="groom_name" id="inputGroomName" pattern="[a-zA-Z\s]+">
	<input type="text" class="form-control" name="groom_name_kannada" id="inputGroomNameKannada" placeholder="">
    </div>

  </div>
  <div class="form-group col-md-4">
    <label for="inputGroomAddress">2.Address</label>
    <input type="text" class="form-control" id="inputGroomAddress" name="groom_address" placeholder="">
	<input type="text" class="form-control" id="inputGroomAddressKannada" name="groom_address_kannada" placeholder="">
  </div>
    <div class="form-group col-md-4">
      <label for="inputGroomMobile">3. Mobile</label>&nbsp;<span class="high-light">*</span>
       <input type="tel" class="form-control" id="inputGroomMobile" name="groom_mobile" pattern="[6789][0-9]{9}" required maxlength="10">
    </div>
	  <div class="form-group col-md-4">
      <label for="inputDateOfBirthGroom">4. Date of Birth</label>&nbsp;<span class="high-light">*</span>
       <input type="Date" class="form-control" id="inputDateOfBirthGroom" name="groom_date_of_birth" required max="1997-07-31">
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
      <input type="text" pattern="[0-9]{12,12}" class="form-control" name="groom_aadhar" id="inputAadharGroom" placeholder="xxxx-xxxx-xxxx" required maxlength="12">
	  
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
	  <option  value="Married">Married</option>
	  <option value="Unmarried">Unmarried</option>
	  <option value="Divocered">Divocered</option>
	  <option value="Widower">Widower</option>
	  </select>
    </div>
     <div class="form-group col-md-6">
      <label for="inputMaritalStatusBride">1.Marital Status of the Would-be Bride</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="bride_marital_status" id="inputMaritalStatusBride" placeholder="" required>
	  <option  value="" selected>Choose..</option>
	  <option  value="Married">Married</option>
	  <option value="Unmarried">Unmarried</option>
	  <option value="Divocered">Divocered</option>
	  <option value="Widow">Widow</option>
	  </select>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputDocumentStatus">Marriage Document/Invitation Card Attached ? </label><br/>
    <input type="Radio"  id="inputDocumentStatusYes" name="document_status" value="Yes" required><label for="inputDocumentStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio" id="inputDocumentStatusNo" name="document_status" value="No" required><label for="inputDocumentStatusYes">&nbsp;No</label>
  </div>
 <div class="form-group col-md-6">
    <label for="inputAffidavitStatus">Affidavit Attached? </label><br/>
    <input type="Radio"  id="inputAffidavitStatusYes" name="affidavit_status" value="Yes" required><label for="inputAffidavitStatusYes">&nbsp;Yes</label>&nbsp;
	<input type="Radio"  id="inputAffidavitStatusNo" name="affidavit_status" value="No" required><label for="inputAffidavitStatusNo">&nbsp;No</label>
  </div>


  

                         
                      </div>
                  </div>
				  
              </div>
			  <br/>
			  <div class="form-row">
			  <div class="form-group col-md-5">&nbsp;</div>
			  <div class="form-group col-md-5"><button type="submit" name="submit_app" class="btn btn-primary">Save</button>
			  <button type="reset" class="btn btn-primary">Reset</button></div>
			  <div class="form-group col-md-2">&nbsp;</div>
			  
			  </div>
        <div class="col-md-12">
          <p class="high-light text-center"><?php echo $message;?></p>
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

  <script src="assets/js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script>
function fetchBranch()
{
	var bank_name=document.getElementById("inputBankName").value;
	var district_name =document.getElementById("inputDistrict").value;
		 $.ajax({
       type: "POST",
       url: "find_branch.php",
       data: 'bank_name='+bank_name+'&district_name='+district_name,
       cache: false,
       success: function(response)
       {
			
			var array = response.split(",");

$( "#inputBranchName" ).autocomplete({
	source: array
});
         
       }
     });
}
function fetchIfsc()
{
	var bank_name=document.getElementById("inputBankName").value;
	var district_name =document.getElementById("inputDistrict").value;
	var branchName =document.getElementById("inputBranchName").value;
		 $.ajax({
       type: "POST",
       url: "find_ifsc.php",
       data: 'bank_name='+bank_name+'&district_name='+district_name+'&branchName='+branchName,
       cache: false,
       success: function(response)
       {
		   document.getElementById("inputIfsc").value=response;
       }
     });
}


</script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
by=yyyy-18;
gy=yyyy-21;
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

var today_bride = by+'-'+mm+'-'+dd;
var today_groom=gy+'-'+mm+'-'+dd;

</script>
	


  </body>
</html>
