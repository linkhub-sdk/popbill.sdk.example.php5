<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
    * 사용자를 연동회원으로 가입처리합니다.
    * - https://developers.popbill.com/reference/accountcheck/php/api/member#JoinMember
    */

    include 'common.php';

    $JoinInfo = new JoinForm();

    // 링크아이디
    $JoinInfo->LinkID = $LinkID;

    // 사업자번호, "-"제외 10자리
    $JoinInfo->CorpNum = '1234567890';

    // 대표자 성명, 최대 100자
    $JoinInfo->CEOName = '대표자 성명';

    // 회사명, 최대 200자
    $JoinInfo->CorpName = '회사명';

    // 사업장 주소, 최대 300자
    $JoinInfo->Addr = '주소';

    // 업태, 최대 100자
    $JoinInfo->BizType = '업태';

    // 종목, 최대 100자
    $JoinInfo->BizClass = '종목';

    // 담당자 성명, 최대 100자
    $JoinInfo->ContactName = '담당자 성명';

    // 담당자 이메일, 최대 100자
    $JoinInfo->ContactEmail = '';

    // 담당자 연락처, 최대 20자
    $JoinInfo->ContactTEL = '';

    // 아이디, 6자 이상 20자미만
    $JoinInfo->ID = 'userid_phpdd';

    // 비밀번호 (8자 이상 20자 이하) 영문, 숫자 ,특수문자 조합
    $JoinInfo->Password = 'qwe123!@#';

    try	{
        $result = $AccountCheckService->JoinMember($JoinInfo);
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
                <legend>연동회원 가입</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
