<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /*
    * 팝빌에 등록된 계좌정보 목록을 반환합니다.
    * - https://developers.popbill.com/reference/easyfinbank/php/api/manage#ListBankAccount
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 팝빌회원 아이디
    $UserID = 'testkorea';

    try {
        $result = $EasyFinBankService->ListBankAccount($CorpNum, $UserID);
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
            <legend>계좌 목록 확인</legend>
            <ul>
                <?php
                if ( isset($code)) {
                    ?>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                } else {
                    for ( $i = 0; $i < Count ( $result ) ; $i++) {
                        ?>
                        <fieldset class="fieldset2">
                            <legend>계좌 정보 [ <?php echo $i+1 ?> / <?php echo Count($result) ?> ]</legend>
                            <ul>
                                <li>accountNumber (계좌번호) : <?php echo $result[$i]->accountNumber ?></li>
                                <li>bankCode (기관코드) : <?php echo $result[$i]->bankCode ?></li>
                                <li>accountName (계좌 별칭) : <?php echo $result[$i]->accountName ?></li>
                                <li>accountType (계좌 유형) : <?php echo $result[$i]->accountType ?></li>
                                <li>state (계좌 상태) : <?php echo $result[$i]->state ?></li>
                                <li>regDT (등록일시) : <?php echo $result[$i]->regDT ?></li>
                                <li>contractDT (정액제 서비스 시작일시) : <?php echo $result[$i]->contractDT ?></li>
                                <li>useEndDate (정액제 서비스 종료일) : <?php echo $result[$i]->useEndDate ?></li>
                                <li>baseDate (자동연장 결제일) : <?php echo $result[$i]->baseDate ?></li>
                                <li>contractState (정액제 서비스 상태) : <?php echo $result[$i]->contractState ?></li>
                                <li>closeRequestYN (정액제 서비스 해지신청 여부) : <?php echo $result[$i]->closeRequestYN ? 'true' : 'false' ?></li>
                                <li>useRestrictYN (정액제 서비스 사용제한 여부) : <?php echo $result[$i]->useRestrictYN ? 'true' : 'false' ?></li>
                                <li>closeOnExpired (정액제 서비스 만료 시 해지 여부) : <?php echo $result[$i]->closeOnExpired ? 'true' : 'false' ?></li>
                                <li>unPaidYN (미수금 보유 여부) : <?php echo $result[$i]->unPaidYN ? 'true' : 'false' ?></li>
                                <li>memo (메모) : <?php echo $result[$i]->memo ?></li>
                            </ul>
                        </fieldset>
                        <?php
                    }
                }
                ?>
            </ul>
        </fieldset>
    </div>
    </body>
</html>
