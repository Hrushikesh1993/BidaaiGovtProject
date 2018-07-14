<?php
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

  $sql_query=
  " UPDATE application_table SET financial_year='$financial_year', taluk='$taluk', constituency='$constituency', village='$village', applicant_name='$applicant_name', parent='$parent', address='$address', religion='$religion', mobile='$mobile', annual_income'$annual_income', dob='$dob', received_date='$received_date', marriage_place='$marriage_place', marriage_date='$marriage_date', age_proof='$age_proof', domicile_state='$domicile_state', physically_handicap='$physically_handicap', applicant_photo='$applicant_photo', aadhar_no='$aadhar_no', father_aadhar='$father_aadhar', mother_aadhar='$mother_aadhar', caste_certificate_no='$caste_certificate_no', income_certificate_no='$income_certificate_no', bpl_card_no='$bpl_card_no', account_no='$account_no', bank='$bank', district='$district', branch='$branch', ifsc_code='$ifsc_code', name_of_the_would_be_groom='$name_of_the_would_be_groom', address_of_the_would_be_groom='$address_of_the_would_be_groom', groom_mobile='$groom_mobile', groom_dob='$groom_dob', groom_age_proof='$groom_age_proof', groom_aadhar_no='$groom_aadhar_no', marital_status_of_the_would_be_groom='$marital_status_of_the_would_be_groom', marital_status_of_the_would_be_bride='$marital_status_of_the_would_be_bride', marriage_document='$marriage_document', affidavit_attached='$affidavit_attached' where app_id='$search_text'";
  $sql_exec=mysqli_query($con,$sql_query);
  if($sql_exec)
  {
    if($status==0)
    {
     echo $message="Sorry! the Application didn't get Updated!";
    }
    else
    {
     echo  $message="Details have been Updated Successfully!";
    }
   
    
  }
  else
  {
    $message="Awwwww! There is some error occured . Please try again!"." ".mysqli_error($con);
  }
  

}
?>