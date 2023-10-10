<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * "임시저장" 상태의 명세서에 1개의 파일을 첨부합니다. (최대 5개)
     * - https://developers.popbill.com/reference/statement/php/api/etc#AttachFile
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, "-" 제외 10자리
    $CorpNum = '1234567890';

    // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode= '121';

    // 문서번호
    $MgtKey = '20230102-PHP5-001';

    // 첨부파일 경로, 해당 파일에 읽기 권한이 설정되어 있어야 합니다.
    $FilePath = './uploadtest.pdf';

    // 팝빌회원 아이디
    $UserID = "testkorea";

    // 첨부파일명
    $DisplayName = "DisplayName.pdf";

    try {
        $result = $StatementService->AttachFile($CorpNum, $itemCode, $MgtKey, $FilePath, $UserID, $DisplayName);
        $code = $result->code;
        $message = $result->message;
    }
    catch( PopbillException $pe ) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>전자명세서 첨부파일 등록</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
        </div>
    </body>
</html>
