 <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 연동회원의 포인트 사용내역을 확인합니다.
     * - https://developers.popbill.com/reference/taxinvoice/php/api/point#GetUseHistory
     */

    include 'common.php';

    // 팝빌회원 사업자번호 (하이픈 '-' 제외 10 자리)
    $CorpNum = "1234567890";

    // 시작일자, 날짜형식(yyyyMMdd)
    $SDate = "20230101";

    // 종료일자, 날짜형식(yyyyMMdd)
    $EDate = "20230131";

    // 페이지번호
    $Page = 1;

    // 페이지당 검색개수, 최대 1000건
    $PerPage = 30;

    // 정렬방향, A-오름차순, D-내림차순
    $Order = "D";

    // 팝빌 회원 아이디
    $UserID = 'testkorea';

    try	{
        $result = $TaxinvoiceService->getUseHistory($CorpNum, $SDate, $EDate, $Page, $PerPage, $Order, $UserID);
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
                <legend>포인트사용내역 목록조회</legend>
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
                                    <legend>포인트 사용내역정보[<?php echo $i+1?>]</legend>
                                    <ul>
                                        <li>itemCode (서비스 코드) : <?php echo $result->list[$i]->itemCode ?></li>
                                        <li>txType (포인트 증감 유형) : <?php echo $result->list[$i]->txType ?></li>
                                        <li>balance (증감 포인트) : <?php echo $result->list[$i]->balance ?></li>
                                        <li>txDT (포인트 증감 일시) : <?php echo $result->list[$i]->txDT ?></li>
                                        <li>userID (담당자 아이디) : <?php echo $result->list[$i]->userID ?></li>
                                        <li>userName (담당자명) : <?php echo $result->list[$i]->userName ?></li>
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
