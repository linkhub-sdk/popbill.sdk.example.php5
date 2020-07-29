<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /*
  * 계좌 거래내역 수집을 요청한다.
  * - 검색기간은 현재일 기준 90일 이내로만 요청할 수 있다.
  * - https://docs.popbill.com/easyfinbank/php/api#RequestJob
  */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 은행코드
    $BankCode = '0039';

    // 계좌번호
    $AccountNumber = '2070064402404';

    // 시작일자, 형식(yyyyMMdd)
    $SDate = '20200701';

    // 종료일자, 형식(yyyyMMdd)
    $EDate = '20200729';

    try {
        $jobID = $EasyFinBankService->RequestJob($testCorpNum, $BankCode, $AccountNumber, $SDate, $EDate);
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
				<legend>수집 요청</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
						<li>Response.code : <?php echo $code ?> </li>
						<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
					?>
						<li>jobID(작업아이디) : <?php echo $jobID ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
