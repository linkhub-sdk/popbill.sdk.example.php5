<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 연동회원 사업자번호에 등록된 담당자(팝빌 로그인 계정) 목록을 확인합니다.
     * - https://developers.popbill.com/reference/easyfinbank/php/api/member#ListContact
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    try {
        $result = $EasyFinBankService->ListContact($CorpNum);
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
                <legend>담당자 목록 확인</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                            for ( $i = 0; $i < Count ( $result ); $i++) {
                    ?>
                            <fieldset class="fieldset2">
                            <legend> 담당자 정보 [<?php echo $i+1?>]</legend>
                            <ul>
                                <li>id (아이디) : <?php echo $result[$i]->id ; ?></li>
                                <li>personName (담당자 성명) : <?php echo $result[$i]->personName ; ?></li>
                                <li>tel (담당자 연락처) : <?php echo $result[$i]->tel ; ?></li>
                                <li>email (담당자 이메일) : <?php echo $result[$i]->email ; ?></li>
                                <li>regDT (등록일시) : <?php echo $result[$i]->regDT ; ?></li>
                                <li>searchRole (담당자 권한) : <?php echo $result[$i]->searchRole ; ?></li>
                                <li>mgrYN (관리자 여부) : <?php echo $result[$i]->mgrYN ; ?></li>
                                <li>state (상태) : <?php echo $result[$i]->state ; ?></li>
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
