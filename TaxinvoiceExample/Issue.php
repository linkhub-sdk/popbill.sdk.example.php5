<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
  </head>
<?php
    /**
     * "임시저장" 또는 "(역)발행대기" 상태의 세금계산서를 발행(전자서명)하며, "발행완료" 상태로 처리합니다.
     * - 세금계산서 국세청 전송정책 [https://developers.popbill.com/guide/taxinvoice/php/introduction/policy-of-send-to-nts]
     * - "발행완료" 된 전자세금계산서는 국세청 전송 이전에 발행취소(CancelIssue API) 함수로 국세청 신고 대상에서 제외할 수 있습니다.
     * - 세금계산서 발행을 위해서 공급자의 인증서가 팝빌 인증서버에 사전등록 되어야 합니다.
     *   └ 위수탁발행의 경우, 수탁자의 인증서 등록이 필요합니다.
     * - 세금계산서 발행 시 공급받는자에게 발행 메일이 발송됩니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/issue#Issue
     */

    include 'common.php';

    // 팝빌 회원 사업자번호, '-' 제외 10자리
    $CorpNum = '1234567890';

    // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
    $MgtKeyType = ENumMgtKeyType::SELL;

    // 문서번호
    $MgtKey = '20230102-PHP5-002';

    // 메모
    $memo = '발행 메모입니다';

    // 지연발행 강제여부  (true / false 중 택 1)
    // └ true = 가능 , false = 불가능
    // - 미입력 시 기본값 false 처리
    // - 발행마감일이 지난 세금계산서를 발행하는 경우, 가산세가 부과될 수 있습니다.
    // - 가산세가 부과되더라도 발행을 해야하는 경우에는 forceIssue의 값을
    //   true로 선언하여 발행(Issue API)를 호출하시면 됩니다.
    $forceIssue = false;

    // 발행 안내메일 제목, 미기재시 기본제목으로 전송
    $EmailSubject = null;

    try {
        $result = $TaxinvoiceService->Issue($CorpNum, $MgtKeyType, $MgtKey, $memo, $EmailSubject, $forceIssue);
        $code = $result->code;
        $message = $result->message;
        $ntsConfirmNum = $result->ntsConfirmNum;
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
        <legend>세금계산서 발행</legend>
        <ul>
          <li>응답코드 (code) : <?php echo $code ?></li>
          <li>응답메시지 (message) : <?php echo $message ?></li>
          <?php
            if ( isset($ntsConfirmNum) ) {
          ?>
            <li>국세청승인번호 (ntsConfirmNum) : <?php echo $ntsConfirmNum ?></li>
          <?php
            }
          ?>
        </ul>
      </fieldset>
     </div>
  </body>
</html>
