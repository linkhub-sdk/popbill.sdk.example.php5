<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
    /**
     * 검색조건을 사용하여 수집 결과 요약정보를 조회합니다.
     * - 응답항목에 관한 정보는 "[홈택스 전자(세금)계산서 연계 API 연동매뉴얼]
     *   > 3.3.2. Summary (수집 결과 요약정보 조회)" 을 참고하시기 바랍니다.
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 수집 요청(RequestJob) 호출시 반환받은 작업아이디
    $JobID = '017030214000000001';

    // 문서형태 배열, N-일반세금계산서, M-수정세금계산서
    $Type = array (
        'N',
        'M'
    );

    // 과세형태 배열, T-과세, N-면세, Z-영세
    $TaxType = array (
        'T',
        'N',
        'Z'
    );

    // 영수/청구 배열, R-영수, C-청구, N-없음
    $PurposeType = array (
        'R',
        'C',
        'N'
    );

    // 종사업장 유무, 공백-전체조회, 0-종사업장 없는 건만 조회, 1-종사업장번호 조건에 따라 조회
    $TaxRegIDYN = "";

    // 종사업장번호 유형, 공백-전체, S-공급자, B-공급받는자, T-수탁자
    $TaxRegIDType = "";

    // 종사업장번호, 콤마(",")로 구분하여 구성 ex) "1234,0001";
    $TaxRegID = "";

    try {
        $response = $HTTaxinvoiceService->Summary($testCorpNum, $JobID, $Type, $TaxType,
            $PurposeType, $TaxRegIDYN, $TaxRegIDType, $TaxRegID);
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
				<legend>수집결과 요약정보 조회</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
						<li>Response.code : <?php echo $code ?> </li>
						<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
					?>
						  <li>count (수집 결과 건수) : <?php echo $response->count ?></li>
              <li>supplyCostTotal (공급가액 합계) : <?php echo $response->supplyCostTotal ?></li>
              <li>taxTotal (세액 합계) : <?php echo $response->taxTotal ?></li>
              <li>amountTotal (합계 금액) : <?php echo $response->amountTotal ?></li>
					<?php
        	  }
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
