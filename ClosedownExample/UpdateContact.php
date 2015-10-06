<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';				# 팝빌회원 사업자번호, '-' 제외 10자리
	$testUserID = 'testkorea';					# 팝빌회원 아이디

	$ContactInfo = new ContactInfo();

	$ContactInfo->personName = '담당자_수정';
	$ContactInfo->tel = '070-7510-3710';
	$ContactInfo->hp = '010-1234-4321';
	$ContactInfo->email = 'test@test.com';
	$ContactInfo->fax = '02-6442-9700';
	$ContactInfo->searchAllAllowYN = true;
	$ContactInfo->mgrYN = false;

	try {
		$result = $ClosedownService->UpdateContact($testCorpNum, $ContactInfo, $testUserID);
		$code = $result->code;
		$message = $result->message;
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
				<legend>담당자 정보 수정</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>