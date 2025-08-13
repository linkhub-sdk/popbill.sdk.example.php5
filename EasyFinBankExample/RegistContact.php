<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 연동회원 사업자번호에 담당자(팝빌 로그인 계정)를 추가합니다.
     * - https://developers.popbill.com/reference/easyfinbank/php/common-api/member#RegistContact
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 담당자 정보 객체 생성
    $ContactInfo = new ContactInfo();

    // 아이디
    $ContactInfo->id = 'testkorea001';

    // 비밀번호
    $ContactInfo->Password = 'asdf1234!@#$';

    // 담당자 성명
    $ContactInfo->personName = '담당자_수정';

    // 담당자 휴대폰
    $ContactInfo->tel = '';

    // 담당자 메일
    $ContactInfo->email = '';

    // 권한, 1 - 개인권한 / 2 - 읽기권한  / 3 - 회사권한
    $ContactInfo->searchRole = 3;

    try {
        $result = $EasyFinBankService->RegistContact($CorpNum, $ContactInfo);
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
                <legend>담당자 추가</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
