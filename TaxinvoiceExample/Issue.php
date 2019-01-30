<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * [임시저장] 또는 [발행대기] 상태의 세금계산서를 [공급자]가 [발행]합니다.
     * - 세금계산서 항목별 정보는 "[전자세금계산서 API 연동매뉴얼] > 4.1. (세금)계산서구성"을 참조하시기 바랍니다.
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $mgtKeyType = ENumMgtKeyType::SELL;

    // 문서관리번호
    $mgtKey = '20190101-001';

    // 메모
    $memo = '발행 메모입니다';

    // 지연발행 강제여부
    // 지연발행 세금계산서를 발행하는 경우, 가산세가 부과될 수 있습니다.
    // 지연발행 세금계산서를 신고해야 하는 경우 $forceIssue 값을 true 선언하여 발행(Issue API)을 호출할 수 있습니다.
    $forceIssue = false;

    // 발행 안내메일 제목, 미기재시 기본제목으로 전송
    $EmailSubject = null;

    try {
        $result = $TaxinvoiceService->Issue($testCorpNum, $mgtKeyType, $mgtKey, $memo, $EmailSubject, $forceIssue);
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
				<legend>세금계산서 발행</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
