function fetchTaluk(taluk)
{
	var bank_name =document.getElementBy("inputBankName").value;
	var district_name =document.getElementBy("inputDistrict").value;
		 $.ajax({
       type: "POST",
       url: "find_branch.php",
       data: 'bank_name='+bank_name,'district_name='+district_name,
       cache: false,
       success: function(response)
       {
         alert("Record successfully updated");
       }
     });
}