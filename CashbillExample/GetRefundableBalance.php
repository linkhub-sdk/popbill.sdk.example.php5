<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
/**
 * 환불 가능한 포인트를 확인합니다. (보너스 포인트는 환불가능포인트에서 제외됩니다.)
 * - https://developers.popbill.com/reference/cashbill/php/api/point#GetRefundableBalance
 */

include 'common.php';

// 팝빌 회원 사업자 번호, "-"제외 10자리
$testCorpNum = '1234567890';

// 팝빌 회원 아이디
$testUserID = 'testkorea';

try {
    $refundableBalance = $CashbillService->GetRefundableBalance($testCorpNum, $testUserID);
} catch (PopbillException $pe) {
    $code = $pe->getCode();
    $message = $pe->getMessage();
}
?>

<body>
    <div id="content">
        <p class="heading1">Response</p>
        <br />
        <fieldset class="fieldset1">
            <ul>
                <?php
                    if( isset ( $code ) ) {
                ?>
                    <li>Response.code : <?php echo $code ?> </li>
                    <li>Response.message : <?php echo $message ?></li>
                <?php
                    } else {
                ?>
                    <li>refundableBalance (환불 가능 포인트) : <?php echo $refundableBalance ?></li>
                <?php
                    }
                ?>
            </ul>
        </fieldset>
    </div>
</body>

</html>