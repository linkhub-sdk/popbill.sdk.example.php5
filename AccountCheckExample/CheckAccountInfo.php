<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
    /**
     * 1건의 예금주성명을 조회합니다.
     * - https://developers.popbill.com/reference/accountcheck/java/api/check#CheckAccountInfo
     */

    include 'common.php';

    //팝빌회원 사업자번호
    $MemberCorpNum = "1234567890";

    // 기관코드
    $BankCode = "";

    // 계좌번호
    $AccountNumber = "";

    try {
        $result = $AccountCheckService->CheckAccountInfo($MemberCorpNum, $BankCode, $AccountNumber);
    } catch (PopbillException $pe) {
        $code = $pe->getCode();
        $message = $pe->getMessage();
    }
?>
<body>
<div id="content">
    <p class="heading1">Response</p>
    <br/>
    <?php
    if (isset($code)) {
        ?>

        <fieldset class="fieldset2">
            <ul>
                <li>Response.code : <?php echo $code ?> </li>
                <li>Response.message : <?php echo $message ?></li>
            </ul>
        </fieldset>
        <?php
    } else {
        ?>
          <fieldset class="fieldset2">
              <legend>예금주실명 조회 결과</legend>
              <ul>
                  <li>bankCode (기관코드) : <?php echo $result->bankCode ?></li>
                  <li>accountNumber (계좌번호) : <?php echo $result->accountNumber ?></li>
                  <li>accountName (예금주 성명) : <?php echo $result->accountName ?></li>
                  <li>checkDate (확인일시) : <?php echo $result->checkDate ?></li>
                  <li>result (응답코드) : <?php echo $result->result ?></li>
                  <li>resultMessage (응답메시지) : <?php echo $result->resultMessage ?></li>
              </ul>
          </fieldset>
        <?php
      }
    ?>
</div>
</body>
</html>
