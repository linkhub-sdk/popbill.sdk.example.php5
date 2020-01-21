<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 대량의 세금계산서 인쇄팝업 URL을 반환합니다. (최대 100건)
     * - 보안정책으로 인해 반환된 URL의 유효시간은 30초입니다.
     * - https://docs.popbill.com/taxinvoice/php/api#GetMassPrintURL
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $mgtKeyType = ENumMgtKeyType::SELL;

    // 문서번호 배열 최대 100건
    $MgtKeyList = array(
        '20190101-001',
        '20190101-002',
    );

    try {
        $url = $TaxinvoiceService->GetMassPrintURL($testCorpNum, $mgtKeyType, $MgtKeyList);
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
				<legend>세금계산서 인쇄화면 URL - 대량</legend>
				<ul>
					<?php
						if ( isset($url) ) {
					?>
						<li>url : <?php echo $url ?></li>
					<?php
						} else {
					?>
						<li>Response.code : <?php echo $code ?> </li>
						<li>Response.message : <?php echo $message ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
