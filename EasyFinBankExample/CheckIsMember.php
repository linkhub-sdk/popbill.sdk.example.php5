<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 사업자번호를 조회하여 연동회원 가입여부를 확인합니다.
     * - https://developers.popbill.com/reference/easyfinbank/php/api/member#CheckIsMember
     */

    include 'common.php';

    // 사업자번호, "-"제외 10자리
    $testCorpNum = '1234567890';

    try	{
        $result = $EasyFinBankService->CheckIsMember( $testCorpNum, $LinkID );
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
                <legend>연동회원 가입여부 확인</legend>
                <ul>
                    <li>Response.code : <?php echo $code ?></li>
                    <li>Response.message : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
