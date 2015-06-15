<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';	#팝빌회원 사업자번호, "-"제외 10자리
	$mgtKey = '20150206-01';		#문서관리번호, 1~24자리, 영문,숫자 조합으로 구성

	try {
		$result = $CashbillService->CheckMgtKeyInUse($testCorpNum, $mgtKey);
		$result ? $result = '사용중' : $result = '미사용중';
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
				<legend>연동관리번호 사용여부 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
						<li>Response.code : <? echo $code ?> </li>
						<li>Response.message : <? echo $message ?></li>

					<?
						} else {
					?>
						<li>연동관리번호 사용여부 : <? echo $result ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>