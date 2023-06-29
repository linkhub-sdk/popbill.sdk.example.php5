<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
  /*
  * 계좌 거래내역을 확인하기 위해 팝빌에 수집요청을 합니다. (조회기간 단위 : 최대 1개월)
  * - 조회일로부터 최대 3개월 이전 내역까지 조회할 수 있습니다.
  * - 반환 받은 작업아이디는 함수 호출 시점부터 1시간 동안 유효합니다.
  * - https://developers.popbill.com/reference/easyfinbank/php/api/job#RequestJob
  */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 기관코드
    $BankCode = '';

    // 계좌번호
    $AccountNumber = '';

    // 시작일자, 형식(yyyyMMdd)
    $SDate = '20230101';

    // 종료일자, 형식(yyyyMMdd)
    $EDate = '20230131';

    try {
        $jobID = $EasyFinBankService->RequestJob($CorpNum, $BankCode, $AccountNumber, $SDate, $EDate);
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
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                        <li>jobID (작업아이디) : <?php echo $jobID ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
