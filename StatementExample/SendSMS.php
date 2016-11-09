<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 알림문자를 전송합니다. (단문/SMS- 한글 최대 45자)
  * - 알림문자 전송시 포인트가 차감됩니다. (전송실패시 환불처리)
  * - 전송내역 확인은 "팝빌 로그인" > [문자 팩스] > [전송내역] 탭에서
  *   전송결과를 확인할 수 있습니다.
  */

	include 'common.php';

  // 팝빌 회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$itemCode = '121';

  // 문서관리번호
	$mgtKey = '20161109-03';

  // 발신번호
	$sender = '07043042991';

  // 수신번호
	$receiver = '01043245117';

  // 메시지 내용, 90byte 초과시 길이가 조정되어 전송됨
	$contents = '메세지 전송 내용입니다. 메세지의 길이가 90Byte를 초과하는 길이가 조정되어 전송되오니 참고하여 테스트하시기 바랍니다';

	try {
		$result = $StatementService->SendSMS($testCorpNum, $itemCode, $mgtKey, $sender,
                              $receiver, $contents, $testUserID);
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
				<legend>알림문자 전송</legend>
				<ul>
					<li>Response.code : <?= $code ?></li>
					<li>Response.message : <?= $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
