<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 수집 상태 확인(GetJobState API) 함수를 통해 상태 정보가 확인된 작업아이디를 활용하여 수집된 현금영수증 매입/매출 내역의 요약 정보를 조회합니다.
     * - 요약 정보 : 현금영수증 수집 건수, 공급가액 합계, 세액 합계, 봉사료 합계, 합계 금액
     * - https://docs.popbill.com/htcashbill/php/api#Summary
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 수집요청(requestJob API) 함수 호출 시 발급받은 작업아이디
    $JobID = '';

    // 문서형태 배열 ("N" 와 "C" 중 선택, 다중 선택 가능)
    // └ N = 일반 현금영수증 , C = 취소현금영수증
    // └ 미입력시 전체조회
    $TradeType = array (
        'N',
        'C'
    );

    // 거래구분 배열 ("P" 와 "C" 중 선택, 다중 선택 가능)
    // └ P = 소득공제용 , C = 지출증빙용
    // └ 미입력시 전체조회
    $TradeUsage = array (
        'P',
        'C'
    );

    try {
        $response = $HTCashbillService->Summary($testCorpNum, $JobID, $TradeType, $TradeUsage);
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
                <legend>수집 결과 요약정보 조회</legend>
                <ul>
                    <?php
                        if ( isset ( $code ) ) {
                    ?>
                        <li>Response.code : <?php echo $code ?> </li>
                        <li>Response.message : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                            <li>count (수집 결과 건수) : <?php echo $response->count ?></li>
                            <li>supplyCostTotal (공급가액 합계) : <?php echo $response->supplyCostTotal ?></li>
                            <li>taxTotal (세액 합계) : <?php echo $response->taxTotal ?></li>
                            <li>serviceFeeTotal (봉사료 합계) : <?php echo $response->serviceFeeTotal ?></li>
                            <li>amountTotal (합계 금액) : <?php echo $response->amountTotal ?></li>
                    <?php
              }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
