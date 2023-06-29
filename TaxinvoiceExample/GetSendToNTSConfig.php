<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
    * 연동회원의 국세청 전송 옵션 설정 상태를 확인합니다.
    * - 팝빌 국세청 전송 정책 [https://developers.popbill.com/guide/taxinvoice/php/introduction/policy-of-send-to-nts]
    * - 국세청 전송 옵션 설정은 팝빌 사이트 [전자세금계산서] > [환경설정] > [세금계산서 관리] 메뉴에서 설정할 수 있으며, API로 설정은 불가능 합니다.
    * - https://developers.popbill.com/reference/taxinvoice/php/api/etc#GetSendToNTSConfig
    */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    try {
        $result = $TaxinvoiceService->GetSendToNTSConfig($CorpNum);
    }
    catch(PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>국세청 즉시전송 설정여부</legend>
                <ul>
              <?php
              if (isset($result)) {
              ?>
                  <li>국세청 즉시전송 설정여부 : <?php echo $result ? 'true' : 'false'  ?></li>
              <?php

              } else {
                  ?>
                  <li>code (응답 코드) : <?php echo $code ?></li>
                  <li>message (응답 메시지) : <?php echo $message ?></li>
                  <?php
              }
              ?>
          </ul>
            </fieldset>
         </div>
    </body>
</html>
