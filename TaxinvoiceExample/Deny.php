<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * [승인대기] 상태의 세금계산서를 [공급받는자]가 [거부]합니다.
     * - [거부]처리된 세금계산서를 삭제(Delete API)하면 등록된 문서관리번호를 재사용할 수 있습니
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $mgtKeyType = ENumMgtKeyType::SELL;

    // 세금계산서 문서관리번호
    $mgtKey = '20190101-001';

    // 메모
    $memo = '발행예정 거부메모입니다';

    try {
        $result = $TaxinvoiceService->Deny($testCorpNum, $mgtKeyType, $mgtKey, $memo);
        $code = $result->code;
        $message = $result->message;
    } catch(PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>발행예정 거부</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
