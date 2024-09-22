<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 파트너가 전자명세서 관리 목적으로 할당하는 문서번호의 사용여부를 확인합니다.
     * - 이미 사용 중인 문서번호는 중복 사용이 불가하고, 전자명세서가 삭제된 경우에만 문서번호의 재사용이 가능합니다.
     * - https://developers.popbill.com/reference/statement/php/api/info#CheckMgtKeyInUse
     */

    include 'common.php';

    // 팝빌회원 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 명세서 종류코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
    $itemCode = '121';

    // 문서번호, 최대 24자리, 영문, 숫자 '-', '_'를 조합하여 사업자별로 중복되지 않도록 구성
    $MgtKey = '20230102-PHP5-001';

    try {
        $result = $StatementService->CheckMgtKeyInUse($CorpNum ,$itemCode, $MgtKey);
        $result ? $result = '사용중' : $result = '미사용중';
    }
    catch ( PopbillException $pe ) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>문서번호 사용여부 확인</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                            <li>code (응답 코드) : <?php echo $code ?></li>
                            <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                            <li>문서번호 사용여부 : <?php echo $result ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
