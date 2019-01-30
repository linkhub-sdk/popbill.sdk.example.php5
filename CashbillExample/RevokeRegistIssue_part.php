<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 1건의 (부분)취소현금영수증을 [즉시발행]합니다.
     * - 발행일 기준 오후 5시 이전에 발행된 현금영수증은 다음날 오후 2시에 국세청 전송결과를 확인할 수 있습니다.
     * - 현금영수증 국세청 전송 정책에 대한 정보는 "[현금영수증 API 연동매뉴얼] > 1.3. 국세청 전송정책"을 참조하시기 바랍니다.
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $testCorpNum = '1234567890';

    // 팝빌회원 아이디
    $testUserID = 'testkorea';

    // 문서관리번호, 사업자별로 중복없이 1~24자리 영문, 숫자, '-', '_' 조합으로 구성
    $mgtKey = '20190101-001';

    // 원본현금영수증 승인번호, 문서정보 확인(GetInfo API)을 통해 확인가능.
    $orgConfirmNum = '820116333';

    // 원본현금영수증 거래일자, 문서정보 확인(GetInfo API)을 통해 확인가능.
    $orgTradeDate = '20181231';

    // 안내문자 전송여부
    $smssendYN = false;

    // 메모
    $memo = '부분취소현금영수증 발행메모';

    // 부분취소여부, true-부분취소, false-전체취소
    $isPartCancel = true;

    // 취소사유, 1-거래취소, 2-오류발급취소, 3-기타
    $cancelType = 1;

    // [취소] 공급가액
    $supplyCost = '4000';

    // [취소] 세액
    $tax = '400';

    // [취소] 봉사료
    $serviceFee = '0';

    // [취소] 합계금액
    $totalAmount = '4400';

    try {
        $result = $CashbillService->RevokeRegistIssue($testCorpNum, $mgtKey, $orgConfirmNum, $orgTradeDate,
            $smssendYN, $memo, $testUserID, $isPartCancel, $cancelType, $supplyCost, $tax, $serviceFee, $totalAmount);

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
				<legend>(부분)취소현금영수증 즉시발행</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
