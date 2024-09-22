<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 삭제 가능한 상태의 현금영수증을 삭제합니다.
     * - ※ 삭제 가능한 상태: "전송실패"
     * - 현금영수증을 삭제하면 사용된 문서번호(mgtKey)를 재사용할 수 있습니다.
     * - https://developers.popbill.com/reference/cashbill/php/api/issue#Delete
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 문서번호
    $MgtKey = '20230102-PHP5-002';

    $UserID = 'testkorea';

    try {
        $result = $CashbillService->Delete($CorpNum, $MgtKey, $UserID);
        $code = $result->code;
        $message = $result->message;
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
                <legend>현금영수증 삭제</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
