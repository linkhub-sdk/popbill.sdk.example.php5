<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /*
    * 수집 상태 확인(GetJobState API) 함수를 상태 정보가 확인된 작업아이디를 활용하여 계좌 거래내역의 요약 정보를 조회합니다.
    * - 요약 정보는 입·출 금액 합계, 입·출 거래 건수를 가리킵니다.
    * - https://developers.popbill.com/reference/easyfinbank/php/api/search#Summary
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    // 수집 요청(RequestJob) 호출시 반환받은 작업아이디
    $JobID = '022032417000000014';

    // 거래유형 배열, I-입금, O-출금
    $TradeType = array (
        'I',
        'O'
    );

    // 조회 검색어, 입금/출금액, 메모, 적요 like 검색
    $SearchString = "";

    try {
        $response = $EasyFinBankService->Summary($testCorpNum, $JobID,
          $TradeType, $SearchString);
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
                        <li>cntAccIn (입금 거래 건수) : <?php echo $response->cntAccIn ?></li>
                        <li>cntAccOut (출금거래 건수) : <?php echo $response->cntAccOut ?></li>
                        <li>totalAccIn (입금액 합계) : <?php echo $response->totalAccIn ?></li>
                        <li>totalAccOut (출금액 합계) : <?php echo $response->totalAccOut ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
