<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 홈택스수집 인증을 위해 팝빌에 현금영수증 자료조회 부서사용자 계정을 등록합니다.
     * - https://developers.popbill.com/reference/htcashbill/php/api/cert#RegistDeptUser
     */

    include 'common.php';

    // 사업자번호, "-"제외 10자리
    $CorpNum = '1234567890';

    // 홈택스에서 생성한 현금영수증 부서사용자 아이디
    $deptUserID = 'userid_test';

    // 홈택스에서 생성한 현금영수증 부서사용자 비밀번호
    $deptUserPWD = 'passwd_test';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try	{
        $result = $HTCashbillService->RegistDeptUser($CorpNum, $deptUserID, $deptUserPWD, $UserID);
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
                <legend>부서사용자 계정등록</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
