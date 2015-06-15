<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';		# 팝빌 회원 사업자 번호, "-"제외 10자리
	$testUserID = 'testkorea';			# 팝빌 회원 아이디
	$TOGO = 'WRITE';					# [TBOX] 임시문서함, [SBOX] 매출문서함, [PBOX] 매입문서함, [WRITE] 매출문서작성

	try {
		$url = $TaxinvoiceService->GetURL($testCorpNum, $testUserID, $TOGO);
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
				<legend>세금계산서 URL 확인</legend>
				<ul>
					<?
						if(isset($url)) { 
					?>
							<li>url : <? echo $url ?></li>
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