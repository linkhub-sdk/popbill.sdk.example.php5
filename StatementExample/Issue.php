<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * "임시저장" 상태의 전자명세서를 발행하여, "발행완료" 상태로 처리합니다.
     * - 팝빌 사이트 [전자명세서] > [환경설정] > [전자명세서 관리] 메뉴의 발행시 자동승인 옵션 설정을 통해
     *   전자명세서를 "발행완료" 상태가 아닌 "승인대기" 상태로 발행 처리 할 수 있습니다.
     * - 전자명세서 발행 함수 호출시 수신자에게 발행 안내 메일이 발송됩니다.
     * - https://developers.popbill.com/reference/statement/php/api/issue#Issue
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    // 전자명세서 문서 유형 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode = '121';

    // 전자명세서 문서번호
    $MgtKey = '20230102-PHP5-002';

    // 메모
    $memo = '전자명세서 발행 메모';

    // 발행안내메일 제목
    // 공백처리시 기본양식으로 전송
    $emailSubject = '';

    try	{
        $result = $StatementService->Issue($CorpNum, $itemCode, $MgtKey, $memo, $UserID, $emailSubject);
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
                <legend>전자명세서 발행</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
