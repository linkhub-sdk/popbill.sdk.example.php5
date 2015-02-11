<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌 회원 사업자번호, "-" 제외 10자리
	$testUserID = 'testkorea';		# 팝빌 회원 아이디
	$itemCode= '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150206-01';		# 문서관리번호
	$filepath = 'uploadtest.jpg';	# 첨부파일 경로, 해당 파일에 읽기 권한이 설정되어 있어야 합니다.

	try {
		#전자명세서 1건당 최대 5개 파일 첨부가능.
		$result = $StatementService->AttachFile($testCorpNum, $itemCode, $mgtKey, $filepath, $testUserID);
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
				<legend>전자명세서 첨부파일 등록</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>