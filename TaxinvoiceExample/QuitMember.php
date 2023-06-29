<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
    <title>팝빌 SDK PHP 5.X Example.</title>
</head>
<?php
/**
 * 가입된 연동회원의 탈퇴를 요청합니다.
 * 회원탈퇴 신청과 동시에 팝빌의 모든 서비스 이용이 불가하며, 관리자를 포함한 모든 담당자 계정도 일괄탈퇴 됩니다.
 * 회원탈퇴로 삭제된 데이터는 복원이 불가능합니다.
 * 관리자 계정만 사용 가능합니다.
 * - https://developers.popbill.com/reference/taxinvoice/php/api/member#QuitMember
 */

include 'common.php';

// 팝빌 회원 사업자 번호, "-"제외 10자리
$CorpNum = '1234567890';

// 탈퇴 사유
$QuitReason = "테스트용 탈퇴사유";

// 팝빌 회원 아이디
$UserID = 'testkorea';

try {
    $result = $TaxinvoiceService->QuitMember($CorpNum, $QuitReason, $UserID);
    $code = $result->code;
    $message = $result->message;
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
            <legend>회원 탈퇴</legend>
            <ul>
                <li>code (응답 코드) : <?php echo $code ?></li>
                <li>message (응답 메시지) : <?php echo $message ?></li>
            </ul>
        </fieldset>
    </div>
</body>

</html>