<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /*
    * 수집 요청(RequestJob API) 함수를 통해 반환 받은 작업 아이디의 상태를 확인합니다.
    * - 거래 내역 조회(Search API) 함수 또는 거래 요약 정보 조회(Summary API) 함수를 사용하기 전에
    *   수집 작업의 진행 상태, 수집 작업의 성공 여부를 확인해야 합니다.
    * - 작업 상태(jobState) = 3(완료)이고 수집 결과 코드(errorCode) = 1(수집성공)이면
    *   거래 내역 조회(Search) 또는 거래 요약 정보 조회(Summary) 를 해야합니다.
    * - 작업 상태(jobState)가 3(완료)이지만 수집 결과 코드(errorCode)가 1(수집성공)이 아닌 경우에는
    *   오류메시지(errorReason)로 수집 실패에 대한 원인을 파악할 수 있습니다.
    * - https://developers.popbill.com/reference/easyfinbank/php/api/job#GetJobState
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 수집 요청시 반환받은 작업아이디
    $jobID = '022032415000000002';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $EasyFinBankService->GetJobState($CorpNum, $jobID, $UserID);
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
                <legend>수집 상태 확인</legend>
                <ul>
                    <?php
                        if ( isset ( $code ) ) {
                    ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                        <li>jobID (작업아이디) : <?php echo $result->jobID ?></li>
                        <li>jobState (수집상태) : <?php echo $result->jobState ?></li>
                        <li>startDate (시작일자) : <?php echo $result->startDate ?></li>
                        <li>endDate (종료일자) : <?php echo $result->endDate ?></li>
                        <li>errorCode (오류코드) : <?php echo $result->errorCode ?></li>
                        <li>errorReason (오류메시지) : <?php echo $result->errorReason ?></li>
                        <li>jobStartDT (작업 시작일시) : <?php echo $result->jobStartDT ?></li>
                        <li>jobEndDT (작업 종료일시) : <?php echo $result->jobEndDT ?></li>
                        <li>regDT (수집 요청일시) : <?php echo $result->regDT ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
