<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  *[발행완료] 상태의 세금계산서를 [발행취소] 처리합니다.
  * - [발행취소]는 국세청 전송전에만 가능합니다.
  * - 발행취소된 세금계산서는 국세청에 전송되지 않습니다.
  * - 발행취소 세금계산서에 기재된 문서관리번호를 재사용 하기 위해서는
  *   삭제(Delete API)를 호출하여 [삭제] 처리 하셔야 합니다.
  */

	include 'common.php';

  // 팝빌 회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TURSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // 문서관리번호
	$mgtKey = '20160113-01';

  // 메모
	$memo = '발행 메모입니다';

  // 지연발행 강제여부
	$forceIssue = false;

  // 발행 안내메일 제목, 미기재시 기본제목으로 전송
	$EmailSubject = null;

	try {
		$result = $TaxinvoiceService->Issue($testCorpNum, $mgtKeyType, $mgtKey, $memo, $EmailSubject, $forceIssue, $testUserID);
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
				<legend>발행 테스트</legend>
				<ul>
					<li>Response.code : <?= $code ?></li>
					<li>Response.message : <?= $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
