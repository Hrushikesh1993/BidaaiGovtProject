<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("function.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
check_login();
$show="";
$status="";
$message="";

if(isset($_POST['searchButton']))
{
  $search_text_unparse=$_POST['search'];
  $search_text=(int)substr($_POST['search'], -5);
  $_SESSION['search']=$search_text_unparse;
  $_SESSION['search_id']=$search_text;
  $result_array="";
  $result=mysqli_query($con,"SELECT * from application_table where app_id=$search_text and (status=1 or status=2) and created_by='".$_SESSION['login']."'");
  $rowcount=mysqli_num_rows($result);
  if($rowcount==1)
  {
	    $result_array=mysqli_fetch_array($result);
  $show=1;
  }
  else
  {
	  $message="Oooops!!! No Records Found...!!!";
  }
  
}
if(isset($_POST['updateApp']))
{
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
  $dob=convert_date($_POST['date_of_birth']);
  $received_date=convert_date($_POST['received_date']);
  $marriage_place=$_POST['place_of_marriage'];
$marriage_place_kannada=$_POST['place_of_marriage_kannada'];
  $marriage_date=convert_date($_POST['date_of_marriage']);
   $age_proof=$_POST['age_proof'];
  $domicile_state=$_POST['domicile_state'];
  $domicile_proof=$_POST['domicile_proof'];
  $physically_handicap=$_POST['physical_handicap'];
$path="";
	$applicant_photo=$applicant_photo=$_FILES['applicant_photo']['name'];
	if(empty($applicant_photo))
	{ 
		 $path=$_POST['hidden_applicant_photo'];
	}
	else
	{
		$applicant_photo=$_FILES['applicant_photo']['name'];
		  	 $path = "images/";
    $path = $path . basename($applicant_photo);
    move_uploaded_file($_FILES['applicant_photo']['tmp_name'], $path);
	}
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
$groom_dob=convert_date($_POST['groom_date_of_birth']);
  $groom_age_proof=$_POST['groom_age_proof'];
  $groom_aadhar_no=$_POST['groom_aadhar'];
  $marital_status_of_the_would_be_groom=$_POST['groom_marital_status'];
  $marital_status_of_the_would_be_bride=$_POST['bride_marital_status'];
  $marriage_document=$_POST['document_status'];
  $affidavit_attached=$_POST['affidavit_status'];
  $verify_status="";
  if($marriage_document=='Yes' && $affidavit_attached=='Yes')
  {
	  $status=2;
  }
  else
  {
	  $status=1; 
  }
	  

  $sql_query=
  " UPDATE application_table SET financial_year='$financial_year', taluk='$taluk', constituency='$constituency', village='$village',village_kannada='$village_kannada', applicant_name='$applicant_name',applicant_name_kannada='$applicant_name_kannada', parent='$parent', address='$address', parent_kannada='$parent_kannada', address_kannada='$address_kannada', religion='$religion', mobile='$mobile', annual_income='$annual_income', dob='$dob', received_date='$received_date', marriage_place='$marriage_place',marriage_place_kannada='$marriage_place_kannada', marriage_date='$marriage_date', age_proof='$age_proof', domicile_state='$domicile_state',domicile_proof='$domicile_proof', physically_handicap='$physically_handicap', applicant_photo='$path', aadhar_no='$aadhar_no', father_aadhar='$father_aadhar', mother_aadhar='$mother_aadhar', caste_certificate_no='$caste_certificate_no', income_certificate_no='$income_certificate_no', bpl_card_no='$bpl_card_no', account_no='$account_no', bank='$bank', district='$district', branch='$branch', ifsc_code='$ifsc_code', name_of_the_would_be_groom='$name_of_the_would_be_groom', address_of_the_would_be_groom='$address_of_the_would_be_groom',name_of_the_would_be_groom_kannada='$name_of_the_would_be_groom_kannada', address_of_the_would_be_groom_kannada='$address_of_the_would_be_groom_kannada', groom_mobile='$groom_mobile', groom_dob='$groom_dob', groom_age_proof='$groom_age_proof', groom_aadhar_no='$groom_aadhar_no', marital_status_of_the_would_be_groom='$marital_status_of_the_would_be_groom', marital_status_of_the_would_be_bride='$marital_status_of_the_would_be_bride', marriage_document='$marriage_document', affidavit_attached='$affidavit_attached',verify_document='$verify_status',status='$status' where app_id='".$_SESSION['search_id']."'";

  $sql_exec=mysqli_query($con,$sql_query);
  if($sql_exec)
  {
    $message="Details of Application Id:".$_SESSION['search']. " Updated Successfully!";
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

    <title><?php echo strtoupper($_SESSION['login']);?>| Application Update</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
 <link href="assets/js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
 <link href="assets/js/autocomplete/content/styles.css" rel="stylesheet" />
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
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
            <a href="admin-home.php" class="logo"><b>Bidaai Scheme</b></a>
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
            <form action="" method="POST"><div class="col-md-12"><div class="form-group col-md-6"> <input type="text" class="form-control" placeholder="Search.." name="search" id="inputSearch" onfocus="fetchId()"></div>
                  <div class="form-group col-md-6"><button type="submit" name="searchButton" class="btn btn-primary"><i class="fa fa-search"></i></button></div></div></form>
            <div class="col-md-12">
          <p class="high-light text-center"><?php echo $message;?></p>
        </div>
			<?php if($show==1){ ?><form action="" method="POST" enctype="multipart/form-data">
			
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
		<?php
			$talukQuery=mysqli_query($con,"SELECT * FROM taluk_details WHERE district_fn_id=(SELECT district_details.district_id from district_details WHERE district_details.district_name='".$_SESSION['login']."' )");
		?>
      <label for="inputTaluk">2. Taluk </label>&nbsp;<span class="high-light">*</span>
            <select class="form-control" name="taluk" id="inputTaluk" placeholder="" required>
	  <option  value="<?php echo $result_array['taluk']; ?>" selected><?php echo $result_array['taluk']; ?></option>
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
	  <option  value="<?php echo $result_array['constituency']; ?>" selected><?php echo $result_array['constituency']; ?></option>
	
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
    <input type="text" class="form-control" id="inputVillage" name="village" placeholder="" required value="<?php echo $result_array['village']; ?>" pattern="[a-zA-Z\s]+">
	<input type="text" class="form-control" id="inputVillageKannada" name="village_kannada" value="<?php echo $result_array['village_kannada']; ?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputName">5. Name of the Applicant </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputName" name="applicant_name" placeholder="" required value="<?php echo $result_array['applicant_name'] ;?>" pattern="[a-zA-Z\s]+">
	<input type="text" class="form-control" id="inputNameKannada" name="applicant_name_kannada" value="<?php echo $result_array['applicant_name_kannada'] ;?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputParent">6. Name of the Father/Mother/Guardian</label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputParent" name="applicant_parent" placeholder="" required value="<?php echo $result_array['parent'] ;?>" pattern="[a-zA-Z\s]+">
	<input type="text" class="form-control" id="inputParentKannada" name="applicant_parent_kannada" value="<?php echo $result_array['parent_kannada'] ;?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">7. Address </label>&nbsp;<span class="high-light">*</span>
    <input type="text" class="form-control" id="inputAddress" name="applicant_address" placeholder="" required value="<?php echo $result_array['address']; ?>">
	<input type="text" class="form-control" id="inputAddressKannada" name="applicant_address_kannada" value="<?php echo $result_array['address_kannada']; ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputReligon">8.Religion</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="religion" id="inputReligon" placeholder="" required>
	  <option  value="<?php echo $result_array['religion']; ?>" selected><?php echo $result_array['religion']; ?></option>
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
       <input type="tel" class="form-control" id="inputMobile" name="mobile" pattern="[6789][0-9]{9}" required value="<?php echo $result_array['mobile'] ;?>" maxlength="10">
    </div>
    <div class="form-group col-md-4">
      <label for="inputAnnualIncome">10. Annual Income</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputAnnualIncome" name="annual_income" required maxlength="6" value="<?php echo $result_array['annual_income'];  ?>"maxlength="6">
    </div>
  </div>
<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputDateOfBirth">11. Date of Birth</label>&nbsp;<span class="high-light">*</span>
       <div id="inputDateOfBirth" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" readonly  name="date_of_birth" required  value="<?php echo convert_date_dmy($result_array['dob']); ?>"/>
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div> 
		
    </div>
    <div class="form-group col-md-3">
      <label for="inputReceivedDate">12. Received Date</label>&nbsp;<span class="high-light">*</span>
      
	   <div id="inputReceivedDate" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" readonly required name="received_date" value="<?php echo convert_date_dmy($result_array['received_date']); ?>"/>
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div> 
    </div>
    <div class="form-group col-md-3">
      <label for="inputDateOfMarriage">13. Date of Marriage </label>&nbsp;<span class="high-light">*</span>
 <div id="inputDateOfMarriage" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" readonly required name="date_of_marriage" value="<?php echo convert_date_dmy($result_array['marriage_date']); ?>" />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
    </div>
	 <div class="form-group col-md-3">
      <label for="inputPlaceOfMarriage">14. Place of Marriage </label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputPlaceOfMarriage" name="place_of_marriage" required value="<?php echo $result_array['marriage_place'] ;?>">
	<input type="text" class="form-control" id="inputPlaceOfMarriageKannada" name="place_of_marriage_kannada"value="<?php echo $result_array['marriage_place_kannada'] ;?>">
    </div>
  </div>
      
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputAgeProof">15. Age Proof </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="age_proof" id="inputAgeProof" placeholder="" required>
	   <option value="<?php echo $result_array['age_proof']; ?>"><?php echo $result_array['age_proof']; ?></option> 
	  <option  value="Birth Certificate">Birth Certificate</option>
	  <option  value="SSLC">SSLC</option>
	  <option value="TC">TC</option>
	  <option value="Notary">Notary</option>
	  <option value="Affidavit">Affidavit</option>
	  </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputDomicile">16. Domicile State </label>&nbsp;<span class="high-light">*</span>
      <select class="form-control" name="domicile_state" id="inputDomicile" placeholder="" required >
     <option value="<?php echo $result_array['domicile_state']; ?>"><?php echo $result_array['domicile_state']; ?></option>   
	  <option  value="Karnataka">Karnataka</option>
	  <option  value="Non-Karnataka">Non-Karnataka</option>
	
	  </select>
    </div>
		    <div class="form-group col-md-4">
      <label for="inputDomicileProof">17. Domicile Certificate </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="domicile_proof" id="inputDomicileProof" placeholder="" required>
	  <option value="<?php echo $result_array['domicile_proof']; ?>"><?php echo $result_array['domicile_proof']; ?></option> 
	  <option value="Aadhar Card">Aadhar Card</option>
		<option value="Ration Card">Ration Card</option>
		<option value="Voter ID">Voter ID</option>
		<option value="Driving License">Driving License</option>
		<option value="Others">Others</option>
		<option value="PAN Card">PAN Card</option>
		<option value="Passport">Passport</option>
	  </select>
	
    </div>
	
	</div>
	
	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPhysicalHandicap">18.Physically Handicaped </label>&nbsp;<span class="high-light">*</span>
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
      <label for="inputPhoto">19. Applicant Photo </label>&nbsp;<span class="high-light">*</span>
      <input class="form-control" type="file" id="inputPhoto" name="applicant_photo"onchange="previewFile()">
		
	  <p id="errorText" class="high-light"></p>
    </div>
	<div class="form-group col-md-4">
      <img src="<?php echo $result_array['applicant_photo']; ?>" id="inputPhotoUpload" height="100" width="100" alt="Applicant Photo">
	  <input type="hidden" id="inputHiddenPhoto" name="hidden_applicant_photo" value="<?php echo $result_array['applicant_photo']; ?>" >
    </div>
	
	
	</div>
	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputAadhar">20.Aadhar No. </label>&nbsp;<span class="high-light">*</span>
       <input type="text" pattern="[0-9]{12}" class="form-control" name="aadhar" id="inputAadhar" placeholder="xxxx-xxxx-xxxx" required value="<?php echo $result_array['aadhar_no']; ?>"maxlength="12">
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputFatherAadhar">21. Father Aadhar No.</label>
       <input type="text" class="form-control" id="inputFatherAadhar" name="father_aadhar" pattern="[0-9]{12}" value="<?php echo $result_array['father_aadhar']; ?>"maxlength="12"  >
    </div>
    <div class="form-group col-md-4">
      <label for="inputMotherAadhar">22. Mother Aadhar No.</label>
      <input type="text" class="form-control" id="inputMotherAadhar" name="mother_aadhar" pattern="[0-9]{12}" value="<?php echo $result_array['mother_aadhar']; ?>" maxlength="12" >
    </div>
  </div>
  	  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCasteNo">23.Caste Certificate No. </label>
       <input type="text" pattern="[a-zA-Z0-9]+"  class="form-control" name="caste_no" id="inputCasteNo" value="<?php echo $result_array['caste_certificate_no']; ?>" >
	  
    </div>
    <div class="form-group col-md-4">
      <label for="inputIncomeNo">24. Income Certificate No.</label>
       <input type="tel" class="form-control" id="inputIncomeNo" name="income_certificate_no" pattern="[a-zA-Z0-9]+" value="<?php echo $result_array['income_certificate_no']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputBPL">25. BPL Card No.</label>&nbsp;<span class="high-light">*</span>
      <input type="text" class="form-control" id="inputBPL" name="bpl_no" required  pattern="[a-zA-Z0-9]+" value="<?php echo $result_array['bpl_card_no']; ?>" maxlength="15">
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
       <input type="text" class="form-control" name="bank_name" id="inputBankName" required onfocus="fetchBank()"value="<?php echo $result_array['bank']; ?>" >
	
    </div>
		    <div class="form-group col-md-3">
	<?php 
		$disQuery=mysqli_query($con,"Select distinct(bank_district) from bank_details");
?>
  
      <label for="inputDistrict">3.District</label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" id="inputDistrict" name="district"  required>
		<option value="<?php echo $result_array['district']; ?>" selected><?php echo $result_array['district']; ?></option>
<?php
	
	while($bank_dis_row=mysqli_fetch_array($disQuery))
	{
	?>
	  <option  value="<?php echo $bank_dis_row['bank_district'] ?>"><?php echo $bank_dis_row['bank_district'] ?></option>
	<?php
	}
   ?></select>
    </div>
	    <div class="form-group col-md-3">
      <label for="inputBranchName">4.Branch Name</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputBranchName" name="branch_name" placeholder="Ex: Market Branch" required value="<?php echo $result_array['branch']; ?>"onfocus="fetchBranch()">
    </div>
	 <div class="form-group col-md-3">
      <label for="inputIfsc">5.IFSC Code</label>&nbsp;<span class="high-light">*</span>
       <input type="text" class="form-control" id="inputIfsc" name="ifsc_code" placeholder="Ex: ABCDXXXXXXX" pattern="[a-zA-Z]{4}[0-9]{7}" onfocus="fetchIfsc()" required value="<?php echo $result_array['ifsc_code']; ?>">
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
      <input type="text" class="form-control" id="inputGroomName" name="groom_name" placeholder="" value="<?php echo $result_array['name_of_the_would_be_groom']; ?>"pattern="[a-zA-Z\s]+">
	  <input type="text" class="form-control" name="groom_name_kannada" id="inputGroomNameKannada" value="<?php echo $result_array['name_of_the_would_be_groom_kannada']; ?>">
    </div>
	  <div class="form-group col-md-4">
    <label for="inputGroomAddress">2.Address</label>
    <input type="text" class="form-control" id="inputGroomAddress" name="groom_address" value="<?php echo $result_array['address_of_the_would_be_groom']; ?>">
	<input type="text" class="form-control" id="inputGroomAddressKannada" name="groom_address_kannada" value="<?php echo $result_array['address_of_the_would_be_groom_kannada']; ?>">
  </div>
    <div class="form-group col-md-4">
      <label for="inputGroomMobile">3. Mobile</label>&nbsp;<span class="high-light">*</span>
       <input type="tel" class="form-control" id="inputGroomMobile" name="groom_mobile" pattern="[6789][0-9]{9}" maxlength="10" required value="<?php echo $result_array['groom_mobile']; ?>">
    </div>
	    <div class="form-group col-md-4">
			<br><br>
    </div>

  </div>

<div class="form-row">

		  <div class="form-group col-md-4">
      <label for="inputDateOfBirthGroom">4. Date of Birth</label>&nbsp;<span class="high-light">*</span>
	    <div id="inputDateOfBirthGroom" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" readonly required name="groom_date_of_birth" value="<?php echo convert_date_dmy($result_array['groom_dob']); ?>" />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
    </div>
	    <div class="form-group col-md-4">
		
      <label for="inputAgeProofGroom">5. Age Proof </label>&nbsp;<span class="high-light">*</span>
       <select class="form-control" name="groom_age_proof" id="inputAgeProofGroom" placeholder="" required>
	    <option value="<?php echo $result_array['groom_age_proof']; ?>"><?php echo $result_array['groom_age_proof']; ?></option>  
	  <option  value="Birth Certificate">Birth Certificate</option>
	  <option  value="SSLC">SSLC</option>
	  <option value="TC">TC</option>
	  <option value="Notary">Notary</option>
	  <option value="Affidavit">Affidavit</option>
	  </select>
    </div>
	 <div class="form-group col-md-4">
      <label for="inputAadharGroom">6.Aadhar No. </label>&nbsp;<span class="high-light">*</span>
      <input type="text" pattern="[0-9]{12,12}" class="form-control" name="groom_aadhar" id="inputAadharGroom" placeholder="xxxx-xxxx-xxxx" required value="<?php echo $result_array['groom_aadhar_no']; ?>">
	  
    </div>
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
	  <option value="Divorced">Divorced</option>
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
				  
              </div>
			  
			  <br/>
			  <div class="form-row">
			  <div class="form-group col-md-5">&nbsp;</div>
			  <div class="form-group col-md-5"><button type="submit" name="updateApp" class="btn btn-primary">Update</button>
			  </div>
			  <div class="form-group col-md-2">&nbsp;</div>
			  
			  </div>
			  </form>
			<?php }?></section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
	    <script src="assets/js/autocomplete/src/jquery.autocomplete.js"></script>
	<script src="assets/js/autocomplete/scripts/jquery.mockjax.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    

<script>
function fetchId()
{
	  $.ajax({
       type: "POST",
       url: "find_id.php",
       cache: false,
       success: function(response)
       {
			
			var array = response.split(",");
			console.log(array)

$( "#inputSearch" ).autocomplete({
	lookup: array
});
         
       }
     });
}
function fetchBank()
{
	  $.ajax({
       type: "POST",
       url: "find_bank.php",
       cache: false,
       success: function(response)
       {
			
			var array = response.split(",");
			

$( "#inputBankName" ).autocomplete({
	lookup: array
});
         
       }
     });
}
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
	lookup: array
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

var today_bride = dd+'-'+mm+'-'+by;
var today_groom=dd+'-'+mm+'-'+gy;
 
$(function () {
  $("#inputDateOfBirth").datepicker({ 
        autoclose: true, 
		endDate:today_bride
  }).datepicker();
});
$(function () {
  $("#inputReceivedDate").datepicker({ 
        autoclose: true, 
		todayHighlight: true
  }).datepicker();
});
$(function () {
  $("#inputDateOfMarriage").datepicker({ 
        autoclose: true, 
		
  }).datepicker();
});
$(function () {
  $("#inputDateOfBirthGroom").datepicker({ 
        autoclose: true, 
		endDate:today_groom
  }).datepicker();
});

$(document).ready(function() {
   $('#inputAadhar, #inputFatherAadhar, #inputMotherAadhar,#inputAadharGroom').change(function (e) 
{
	var aadhar=e.target.value;
	console.log(aadhar);
	  $.ajax({
       type: "POST",
       url: "search_aadhar.php",
	   data:"aadhar="+aadhar,
       cache: false,
       success: function(response)
       {
		   console.log(response);
			if(response==0)
			{
				alert("Aadhar No. already exists in the database, Please check and verify!!!!");
				e.target.value="";
			}
			else
			{
				var ids=[];
				var search=e.target.value;
			ids=$('#inputAadhar, #inputFatherAadhar, #inputMotherAadhar,#inputAadharGroom').map(function() {
			return this.value;}).get();
			var numOf = 0;
			for(var i=0;i<ids.length;i++){
			if(ids[i] === search)
				numOf++;
										}
			if(numOf>1)
			{
			alert("Found to be multiple entries of Aadhar No.!!!!");
			e.target.value="";
			}
			}
         
       }
     });
});
});
$(document).ready(function() {
   $('#inputCasteNo, #inputIncomeNo, #inputBPL').change(function (e) 
{
	var doc=e.target.value;
	console.log(doc);
	  $.ajax({
       type: "POST",
       url: "search_doc.php",
	   data:"doc="+doc,
       cache: false,
       success: function(response)
       {
		   console.log(response);
			if(response==0)
			{
				alert("Please check and verify the certificate!!!!");
				e.target.value="";
			}
			else
			{
				var ids=[];
				var search=e.target.value;
			ids=$('#inputCasteNo, #inputIncomeNo, #inputBPL').map(function() {
			return this.value;}).get();
			var numOf = 0;
			for(var i=0;i<ids.length;i++){
			if(ids[i] === search)
				numOf++;
										}
			if(numOf>1)
			{
			alert("Found to be multiple entries!!!!");
			e.target.value="";
			}
			}
         
       }
     });
});
});


</script>

  </body>
</html>
