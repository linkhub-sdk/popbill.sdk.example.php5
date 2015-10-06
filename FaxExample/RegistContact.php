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
	$ContactInfo->id = 'testkorea001';			# 담당자 아이디
	$ContactInfo->pwd = 'testkorea001_!@#';		# 담당자 비밀번호
	$ContactInfo->personName = '담당자_수정';	# 담당자명
	$ContactInfo->tel = '070-7510-3710';		# 연락처
	$ContactInfo->hp = '010-1234-1234';			# 휴대폰 번호
	$ContactInfo->email = 'test@test.com';		# 이메일 주소
	$ContactInfo->fax = '02-6442-9700';			# 팩스 번호
	$ContactInfo->searchAllAllowYN = true;		# 전체조회여부, false-개인조회 true-회사조회
	$ContactInfo->mgrYN = false;				# 관리자 권한 여부 

	try {
		$result = $FaxService->RegistContact($testCorpNum, $ContactInfo, $testUserID);
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
				<legend>담당자 추가</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>