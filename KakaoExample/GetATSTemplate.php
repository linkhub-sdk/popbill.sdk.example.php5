<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
    * 승인된 알림톡 템플릿 정보를 확인합니다.
    * - https://developers.popbill.com/reference/kakaotalk/php/api/template#GetATSTemplate
    */

    include 'common.php';

    // 팝빌회원 사업자번호, '-'제외 10자리
    $CorpNum = '1234567890';

    // 템플릿 코드
    $templateCode = '021020000177';

    try {
        $templateInfo = $KakaoService->GetATSTemplate($CorpNum, $templateCode);
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
            <legend>알림톡 템플릿 정보 확인</legend>
            <ul>
                <?php
                    if ( isset($code) ) {
                ?>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                <?php
                    } else {
                ?>
                        <li>templateCode (템플릿 코드) : <?php echo $templateInfo->templateCode ?></li>
                        <li>templateName (템플릿 제목) : <?php echo $templateInfo->templateName ?></li>
                        <li>template (템플릿 내용) : <?php echo $templateInfo->template ?></li>
                        <li>plusFriendID (검색용 아이디) : <?php echo $templateInfo->plusFriendID ?></li>
                        <li>ads (광고메시지 내용) : <?php echo $templateInfo->ads ?></li>
                        <li>appendix (부가메시지 내용) : <?php echo $templateInfo->appendix ?></li>
                        <li>secureYN (보안템플릿 여부) : <?php echo $templateInfo->secureYN ?></li>
                        <li>state (템플릿 상태) : <?php echo $templateInfo->state ?></li>
                        <li>stateDT (템플릿 상태 일시) : <?php echo $templateInfo->stateDT ?></li>
                        <?php
                        if (isset($templateInfo->btns)) {
                            for ($j = 0; $j < Count($templateInfo->btns); $j++) {
                        ?>
                                <fieldset class="fieldset1">
                                    <legend> 버튼정보 [<?php echo $j + 1 ?>]</legend>
                                    <ul>
                                        <li>t (버튼유형) : <?php echo $templateInfo->btns[$j]->t ?></li>
                                        <li>n (버튼명) : <?php echo $templateInfo->btns[$j]->n ?></li>
                                        <li>u1 (버튼링크1) : <?php echo (isset($templateInfo->btns[$j]->u1)) ? $templateInfo->btns[$j]->u1 : ''; ?></li>
                                        <li>u2 (버튼링크2) : <?php echo (isset($templateInfo->btns[$j]->u2)) ? $templateInfo->btns[$j]->u2 : ''; ?></li>
                                    </ul>
                                </fieldset>
                <?php
                            }
                        }
                    }
                ?>
            </ul>
        </fieldset>
     </div>
</body>

</html>
