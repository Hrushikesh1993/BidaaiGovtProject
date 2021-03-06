<?php
require_once 'swift/lib/swift_required.php';
$table_name=strtolower($_SESSION['district_code'])."_application_table";
date_default_timezone_set("Asia/Kolkata");
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
		return "Pending to get Sanctioned";
		
	}
		else if($status==3)
	{
		return "Pending at Fund Released";
		
	}
			else if($status==4)
	{
		return "Fund Released";
		
	}
	
	
	
}
function status_full_description($status)
{
	
	if($status==0)
	{
		return "Application has been rejected as it has been submitted less than 7 days of the marriage date . "."<br>"."
ಮದುವೆ ದಿನಾಂಕದ 7 ದಿನಗಳೊಳಗೆ ಸಲ್ಲಿಸಿದ ಕಾರಣ ಅಪ್ಲಿಕೇಶನ್ ಅನ್ನು ತಿರಸ್ಕರಿಸಲಾಗಿದೆ";
	}
	else if($status==1)
	{
		return "Kindly submit marriage certificate,photograph and other documents early."."<br>"."ಮದುವೆಯ ಪ್ರಮಾಣಪತ್ರ, ಛಾಯಾಚಿತ್ರ ಮತ್ತು ಇತರ ದಾಖಲೆಗಳನ್ನು ಮೊದಲೇ ದಯವಿಟ್ಟು ಸಲ್ಲಿಸಿ.";
		
	}
		else if($status==2)
	{
		return "Eligible application is pending to get sanctioned"."<br>"."
ಮಂಜೂರು ಮಾಡಲು ಅರ್ಹ ಅರ್ಜಿ ಬಾಕಿ ಉಳಿದಿದೆ";
		
	}
		else if($status==3)
	{
		return "Eligible application is pending to get funded"."<br>"."ಹಣವನ್ನು ಪಡೆಯಲು ಅರ್ಹ ಅರ್ಜಿ ಬಾಕಿ ಉಳಿದಿದೆ";
		
	}
			else if($status==4)
	{
		return " Application successfully approved and funded."."<br>"."
ಅಪ್ಲಿಕೇಶನ್ ಯಶಸ್ವಿಯಾಗಿ ಅಂಗೀಕರಿಸಿದೆ ಮತ್ತು ಹಣವನ್ನು ನೀಡಲಾಗಿದೆ";
		
	}
	
	
	
}
function get_count($cnt)
{
	global $con;
	$sql="";
	
	if(1==$cnt)
	{
		$sql= "SELECT count(app_id) as id from $table_name where created_by='".$_SESSION['login']."'";
	}
	if($cnt==2)
	{
		$sql= "SELECT count(app_id) as id from $table_name where  status=1 and created_by='".$_SESSION['login']."'";
	}
	if($cnt==3)
	{
		$sql= "SELECT count(app_id) as id from $table_name where status=2 and created_by='".$_SESSION['login']."'";
	}
	if($cnt==4)
	{
		$sql= "SELECT count(app_id) as id from $table_name where status=3 and created_by='".$_SESSION['login']."'";
	}
	if($cnt==5)
	{
		$sql= "SELECT count(app_id) as id from $table_name where status=4 and created_by='".$_SESSION['login']."'";
	}
		if($cnt==6)
	{
		$sql= "SELECT count(app_id) as id from $table_name where status=0 and created_by='".$_SESSION['login']."'";
	}
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	return $row['id'];
	
}
function admin_get_count($cnt)
{
	global $con;
	$sql="";
	
	if(1==$cnt)
	{
		$sql= "SELECT count(app_id) as id from $table_name";
	}
	if($cnt==2)
	{
		$sql= "SELECT count(app_id) as id from $table_name where (status=1 or status=2)";
	}
	if($cnt==3)
	{
		$sql= "SELECT count(app_id) as id from $table_name where status=3";
	}
	if($cnt==4)
	{
		$sql= "SELECT count(app_id) as id from $table_name where status=0";
	}
	if($cnt==5)
	{
		$sql= "SELECT count(app_id) as id from $table_name where status=4";
	}
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($res);
	return $row['id'];
	
}
function convert_date($dt)
{
	$originalDate = $dt ;
$newDate = date("Y-m-d", strtotime($originalDate));
return $newDate;
}
function convert_date_dmy($dt)
{
	$originalDate = $dt ;
$newDate = date("d-m-Y", strtotime($originalDate));
return $newDate;
}
function send_mail_forget($user_email,$id)
{

 $user_email;
 $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('bidaai2018@gmail.com')
  ->setPassword('bidaai@123');
$body="
<html>
  <head>
    <meta name='viewport' content='width=device-width' />
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }
      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }
      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */
      .body {
        background-color: #f6f6f6;
        width: 100%; }
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }
      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }
      .wrapper {
        box-sizing: border-box;
        padding: 20px; }
      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }
      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }
      a {
        color: #3498db;
        text-decoration: underline; }
      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }
      .btn-primary table td {
        background-color: #3498db; }
      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }
      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }
      .first {
        margin-top: 0; }
      .align-center {
        text-align: center; }
      .align-right {
        text-align: right; }
      .align-left {
        text-align: left; }
      .clear {
        clear: both; }
      .mt0 {
        margin-top: 0; }
      .mb0 {
        margin-bottom: 0; }
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }
      .powered-by a {
        text-decoration: none; }
      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }
      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}
      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }
    </style>
  </head>
  <body class=''>
    <table border='0' cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>

            <!-- START CENTERED WHITE CONTAINER -->
            <span class='preheader'>This is a auto generated mail from bidaaigokdom.in.</span>
            <table class='main'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper'>
                  <table border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td>
                        <p>Hi there,</p>
                        <p>Please Reset your password</p>
                        <table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                          <tbody>
                            <tr>
                              <td align='left'>
                                <table border='0' cellpadding='0' cellspacing='0'>
                                  <tbody>
                                    <tr>
                                      <td> <a href='http://bidaaigokdom.in/reset.php?id=$id' target='_blank'>Reset</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Good luck! Hope it works.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class='footer'>
              <table border='0' cellpadding='0' cellspacing='0'>

                <tr>
                  <td class='content-block powered-by'>
                    Powered by <a href=''>Dreampixmedia</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>";
$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Reset Password')
  ->setFrom(array('bidaai2018@gmail.com' => 'Bidaai Admin'))
  ->setTo(array($user_email))
  ->addPart($body,'text/html');
if (!$mailer->send($message, $failures))
    {
			return $failures;
    }
  

}



?>