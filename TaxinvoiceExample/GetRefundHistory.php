 <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 연동회원의 포인트 환불신청내역을 확인합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/point#GetRefundHistory
     */

    include 'common.php';

    // 팝빌회원 사업자번호 (하이픈 '-' 제외 10 자리)
    $CorpNum = "1234567890";

    // 페이지번호
    $Page = 1;

    // 페이지당 검색개수, 최대 1000건
    $PerPage = 30;

    // 팝빌 회원 아이디
    $UserID = 'testkorea';

    try	{
        $result = $TaxinvoiceService->getRefundHistory($CorpNum, $Page, $PerPage, $UserID);
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
                <legend>환불 신청내역 목록조회</legend>
                <ul>
                   <?php
                        if( isset ( $code ) ) {
                    ?>
                            <li>code (응답 코드) : <?php echo $code ?></li>
                            <li>message (응답 메시지) : <?php echo $message ?></li>
                    <?php
                        } else {
                    ?>
                            <li>code (응답코드) : <?php echo $result->code ?> </li>
                            <li>total (총 검색결과 건수) : <?php echo $result->total ?> </li>
                            <li>pageNum (페이지 번호) : <?php echo $result->pageNum ?> </li>
                            <li>perPage (페이지당 목록개수) : <?php echo $result->perPage ?> </li>
                            <li>pageCount (페이지 개수) : <?php echo $result->pageCount ?> </li>
                    <?php
                            for ($i = 0; $i < Count($result->list); $i++) {
                    ?>
                                <fieldset class="fieldset2">
                                    <legend>환불신청 내역정보[<?php echo $i+1?>]</legend>
                                    <ul>
                                        <li>reqDT (신청일자) : <?php echo $result->list[$i]->reqDT ?></li>
                                        <li>requestPoint (환불 신청포인트) : <?php echo $result->list[$i]->requestPoint ?></li>
                                        <li>accountBank (환불계좌 은행명) : <?php echo $result->list[$i]->accountBank ?></li>
                                        <li>accountNum (환불계좌번호) : <?php echo $result->list[$i]->accountNum ?></li>
                                        <li>accountName (환불계좌 예금주명) : <?php echo $result->list[$i]->accountName ?></li>
                                        <li>state (상태) : <?php echo $result->list[$i]->state ?></li>
                                        <li>reason (환불사유) : <?php echo $result->list[$i]->reason ?></li>
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
