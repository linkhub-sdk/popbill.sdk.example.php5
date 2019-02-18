<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 문자전송요청시 할당한 전송요청번호(requestNum)로 전송상태를 확인합니다
     * - 응답항목에 대한 자세한 사항은 "[문자 API 연동매뉴얼] > 3.3.2. GetMessagesRN (전송내역 확인 - 요청번호 할당)을 참조하시기 바랍니다.
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 예약문자전송 요청시 할당한 전송요청번호
    $requestNum = '20190101-001';

    try {
        $result = $MessagingService->CancelReserveRN($testCorpNum ,$requestNum);
        $code = $result->code;
        $message = $result->message;
    }
    catch (PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>문자 예약전송 취소 </legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
