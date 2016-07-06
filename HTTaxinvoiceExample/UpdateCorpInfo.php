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

	$CorpInfo = new CorpInfo();

	$CorpInfo->ceoname = '대표자명';		 # 대표자명
	$CorpInfo->corpName = '이노포스트';	 # 상호
	$CorpInfo->addr = '서울시 영등포구';		# 주소
	$CorpInfo->bizType = '업태';				# 업태
	$CorpInfo->bizClass = '업종';				# 업종

	try {
		$result = $HTTaxinvoiceService->UpdateCorpInfo ( $testCorpNum, $CorpInfo, $testUserID ) ;
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
				<legend>회사정보 수정</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
