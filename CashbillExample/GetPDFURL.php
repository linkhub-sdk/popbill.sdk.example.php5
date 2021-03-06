<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * PDF 다운로드 URL 링크를 반환합니다.
     * - https://docs.popbill.com/cashbill/php/api#GetPDFURL
     */

    include 'common.php';

    // 팝빌 회원 사업자 번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 문서번호
    $mgtKey = '20190101-001';

    try {
        $url = $CashbillService->GetPDFURL($testCorpNum, $mgtKey);
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
				<legend>현금영수증 PDF 다운로드 URL</legend>
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
