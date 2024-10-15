<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 수집 상태 확인(GetJobState API) 함수를 통해 상태 정보가 확인된 작업아이디를 활용하여 수집된 전자세금계산서 매입/매출 내역의 요약 정보를 조회합니다.
     * - 요약 정보 : 전자세금계산서 수집 건수, 공급가액 합계, 세액 합계, 합계 금액
     * - https://developers.popbill.com/reference/httaxinvoice/php/api/search#Summary
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 수집요청(requestJob API) 함수 호출 시 반환받은 작업아이디
    $JobID = '021102217000000002';

    // 문서형태 배열 ("N" 와 "M" 중 선택, 다중 선택 가능)
    // └ N = 일반 , M = 수정
    // - 미입력 시 전체조회
    $Type = array (
        'N',
        'M'
    );

    // 과세형태 배열 ("T" , "N" , "Z" 중 선택, 다중 선택 가능)
    // └ T = 과세, N = 면세, Z = 영세
    // - 미입력 시 전체조회
    $TaxType = array (
        'T',
        'N',
        'Z'
    );

    // 결제대금 수취여부 ("R" , "C", "N" 중 선택, 다중 선택 가능)
    // └ R = 영수, C = 청구, N = 없음
    // - 미입력 시 전체조회
    $PurposeType = array (
        'R',
        'C',
        'N'
    );

    // 종사업장번호 유무 (null , "0" , "1" 중 택 1)
    // - null = 전체 , 0 = 없음, 1 = 있음
    $TaxRegIDYN = null;

    // 종사업장번호의 주체 ("S" , "B" , "T" 중 택 1)
    // └ S = 공급자 , B = 공급받는자 , T = 수탁자
    // - 미입력시 전체조회
    $TaxRegIDType = null;

    // 종사업장번호
    // 다수기재시 콤마(",")로 구분하여 구성 ex ) "0001,0002"
    // - 미입력시 전체조회
    $TaxRegID = null;

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 거래처 상호 / 사업자번호 (사업자) / 주민등록번호 (개인) / "9999999999999" (외국인) 중 검색하고자 하는 정보 입력
    // - 사업자번호 / 주민등록번호는 하이픈('-')을 제외한 숫자만 입력
    // - 미입력시 전체조회
    $SearchString = null;

    try {
        $response = $HTTaxinvoiceService->Summary($CorpNum, $JobID, $Type, $TaxType,
            $PurposeType, $TaxRegIDYN, $TaxRegIDType, $TaxRegID, $UserID, $SearchString);
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
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
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
