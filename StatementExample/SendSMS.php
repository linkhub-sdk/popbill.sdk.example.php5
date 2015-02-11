<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';				# 팝빌 회원 사업자번호, '-' 제외 10자리
	$testUserID = 'testkorea';					# 팝빌 회원 아이디
	$itemCode = '121';							# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150206-01';					# 문서관리번호
	$sender = '07075103710';					# 발신번호
	$receiver = '01043245117';					# 수신번호
	$contents = '메세지 전송 내용입니다. 메세지의 길이가 90Byte를 초과하는 길이가 조정되어 전송되오니 참고하여 테스트하시기 바랍니다';

	try {
		$result = $StatementService->SendSMS($testCorpNum,$itemCode,$mgtKey,$sender,$receiver,$contents,$testUserID);
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
				<legend>알림문자 재전송</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>