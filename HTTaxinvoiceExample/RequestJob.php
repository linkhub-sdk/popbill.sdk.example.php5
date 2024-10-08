<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 홈택스에 신고된 전자세금계산서 매입/매출 내역 수집을 팝빌에 요청합니다. (조회기간 단위 : 최대 3개월)
     * - 주기적으로 자체 DB에 세금계산서 정보를 INSERT 하는 경우, 조회할 일자 유형(DType) 값을 "S"로 하는 것을 권장합니다.
     * - https://developers.popbill.com/reference/httaxinvoice/php/api/job#RequestJob
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 전자세금계산서 유형, SELL-매출, BUY-매입, TRUSTEE-위수탁
    $TIKeyType = HTTIKeyType::SELL;

    // 수집일자유형, W-작성일자, I-발행일자, S-전송일자
    $DType = 'S';

    // 시작일자, 형식(yyyyMMdd)
    $SDate = '20230101';

    // 종료일자, 형식(yyyyMMdd)
    $EDate = '20230131';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $jobID = $HTTaxinvoiceService->RequestJob($CorpNum, $TIKeyType, $DType, $SDate, $EDate, $UserID);
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
