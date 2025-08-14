<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 하나의 전자명세서에 첨부된 다른 전자명세서를 해제합니다.
     * - https://developers.popbill.com/reference/statement/php/api/etc#DetachStatement
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 전자명세서 문서 유형 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode = '121';

    // 문서번호
    $MgtKey = '20230102-PHP5-001';

    // 첨부해제할 전자명세서 문서 유형 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $subItemCode = '121';

    // 첨부해제할 명세서 문서번호
    $subMgtKey = '20230102-PHP5-002';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $StatementService->DetachStatement($CorpNum, $itemCode, $MgtKey, $subItemCode, $subMgtKey, $UserID);
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
                <legend>다른 전자명세서 첨부해제</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
