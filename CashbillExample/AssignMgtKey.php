<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example</title>
    </head>
<?php
    /**
     * 팝빌 사이트를 통해 발행하여 문서번호가 할당되지 않은 현금영수증에 문서번호를 할당합니다.
     * - https://developers.popbill.com/reference/cashbill/php/api/etc#AssignMgtKey
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 현금영수증 팝빌번호, 문서 목록조회(Search API) 함수의 반환항목 중 ItemKey 참조
    $itemKey = '022032909262700001';

    // 할당할 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
    $MgtKey = '20230102-PHP5-001';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $CashbillService->AssignMgtKey($CorpNum, $itemKey, $MgtKey, $UserID);
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
            <legend>문서번호 할당</legend>
            <ul>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
            </ul>
        </fieldset>
    </div>
    </body>
</html>
