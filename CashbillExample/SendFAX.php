<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 현금영수증을 팩스전송합니다.
  * - 팩스 전송 요청시 포인트가 차감됩니다. (전송실패시 환불처리)
  * - 전송내역 확인은 "팝빌 로그인" > [문자 팩스] > [팩스] > [전송내역]
  *   메뉴에서 전송결과를 확인할 수 있습니다.
  */

	include 'common.php';

  // 팝빌 회원 사업자번호, "-" 제외 10자리
	$testCorpNum = '1234567890';

  // 문서관리번호
	$mgtKey = '20161107-02';

  // 발신번호
	$sender = '07075103710';

  // 수신팩스번호
	$receiver = '070111222';

	try {
		$result = $CashbillService->SendFAX($testCorpNum, $mgtKey, $sender, $receiver);
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
				<legend>현금영수증 팩스전송</legend>
				<ul>
					<li>Response.code : <?= $code ?></li>
					<li>Response.message : <?= $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
