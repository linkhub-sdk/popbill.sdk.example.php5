<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 계좌조회 서비스를 이용할 계좌를 팝빌에 등록합니다.
     * - https://developers.popbill.com/reference/easyfinbank/php/api/manage#RegistBankAccount
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 계좌정보 클래스 생성
    $BankAccountInfo = new EasyFinBankAccountForm();

    // 기관코드
    $BankAccountInfo->BankCode = '';

    // 계좌번호 하이픈('-') 제외
    $BankAccountInfo->AccountNumber = '';

    // 계좌비밀번호
    $BankAccountInfo->AccountPWD = '';

    // 계좌유형, "법인" 또는 "개인" 입력
    $BankAccountInfo->AccountType = '';

    // 예금주 식별정보 (‘-‘ 제외)
    // 계좌유형이 “법인”인 경우 : 사업자번호(10자리)
    // 계좌유형이 “개인”인 경우 : 예금주 생년월일 (6자리-YYMMDD)
    $BankAccountInfo->IdentityNumber = '';

    // 계좌 별칭
    $BankAccountInfo->AccountName = '';

    // 인터넷뱅킹 아이디 (국민은행 필수)
    $BankAccountInfo->BankID = '';

    // 조회전용 계정 아이디 (대구은행, 신협, 신한은행 필수)
    $BankAccountInfo->FastID = '';

    // 조회전용 계정 비밀번호 (대구은행, 신협, 신한은행 필수
    $BankAccountInfo->FastPWD = '';

    // 정액제 이용할 개월수, 1~12 입력가능
    // - 미입력시 기본값 1개월 처리
    // - 파트너 과금방식의 경우 입력값에 관계없이 1개월 처리
    $BankAccountInfo->UsePeriod = '';

    // 메모
    $BankAccountInfo->Memo = '';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $EasyFinBankService->RegistBankAccount($CorpNum, $BankAccountInfo, $UserID);
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
                <legend>계좌 등록</legend>
                <ul>
                    <li>code (응답 코드) : <?php echo $code ?></li>
                    <li>message (응답 메시지) : <?php echo $message ?></li>
                </ul>
            </fieldset>
         </div>
    </body>
</html>
