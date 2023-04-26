<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 팝빌에 등록한 연동회원의 카카오톡 채널 목록을 확인합니다.
     * - https://developers.popbill.com/reference/kakaotalk/php/api/channel#ListPlusFriendID
     */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $testCorpNum = '1234567890';

    try {
        $result = $KakaoService->ListPlusFriendID($testCorpNum);
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
                <legend>카카오톡채널 목록 확인</legend>
                <ul>
                    <?php
                        if ( isset($code) ) {
                    ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                            for ($i = 0; $i < Count($result); $i++) {
                    ?>
                            <fieldset class="fieldset2">
                            <legend> 카카오톡 채널 목록 [<?php echo $i+1?>]</legend>
                            <ul>
                                <li>plusFriendID (검색용 아이디) : <?php echo $result[$i]->plusFriendID ?></li>
                                <li>plusFriendName (채널명) : <?php echo $result[$i]->plusFriendName ?></li>
                                <li>regDT (등록일시) : <?php echo $result[$i]->regDT ?></li>
                                <li>state (채널 상태) : <?php echo $result[$i]->state ?></li>
                                <li>stateDT (채널 상태 일시) : <?php echo $result[$i]->stateDT ?></li>
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
