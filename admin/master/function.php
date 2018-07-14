<?php
function status_description($status)
{
	
	if($status==0)
	{
		return "Rejected";
	}
	else if($status==1)
	{
		return "Pending Eligibility Check";
		
	}
		else if($status==2)
	{
		return "Pending Eligibility Application";
		
	}
		else if($status==3)
	{
		return "Pending to get Sanctioned";
		
	}
	
	
}

?>