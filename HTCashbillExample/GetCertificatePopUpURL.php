<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	  # 팝빌 회원 사업자 번호, "-"제외 10자리
	$testUserID = 'testkorea';		# 팝빌 회원 아이디

	try {
		$url = $HTCashbillService->GetCertificatePopUpURL ( $testCorpNum, $testUserID ) ;
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
				<legend>공인인증서 등록 URL</legend>
				<ul>
					<?
						if ( isset ( $url ) ) {
					?>
							<li>url : <?= $url ?></li>
					<?
						} else {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>