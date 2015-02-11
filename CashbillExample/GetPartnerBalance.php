<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호

	try {
		$remainPoint = $CashbillService->GetPartnerBalance($testCorpNum);
	}
	catch(PopbillException $pe) {
		$code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>파트너 잔여 포인트 확인</legend>
				<ul>
					<?
						if(isset($remainPoint)) { 
					?>
						<li>remainPoint : <? echo $remainPoint ?></li>
					<?
						} else {
					?>
						<li>Response.code : <? echo $code ?> </li>
						<li>Response.message : <? echo $message ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
