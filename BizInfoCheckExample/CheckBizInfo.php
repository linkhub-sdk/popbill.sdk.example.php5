<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../Example.css" media="screen" />
        <title>팝빌 SDK PHP 5.X Example.</title>
    </head>
<?php
    /**
     * 사업자번호 1건에 대한 기업정보를 확인합니다.
     * - https://developers.popbill.com/reference/bizinfocheck/php/api/check#CheckBizInfo
     */

    include 'common.php';

    if ( isset($_GET['CorpNum']) && $_GET['CorpNum'] != '' ) {

        // 팝빌회원 사업자번호
        $MemberCorpNum = "1234567890";

        // 조회할 사업자번호
        $CheckCorpNum = $_GET['CorpNum'];

        $UserID = "testkorea";

        try {
            $result = $BizInfoCheckService->checkBizInfo($MemberCorpNum, $CheckCorpNum, $UserID);
        }
        catch (PopbillException $pe) {
            $code = $pe->getCode();
            $message = $pe->getMessage();
        }
    }
?>
    <body>
        <div id="content">
            <p class="heading1">Response</p>
            <br/>
            <fieldset class="fieldset1">
                <legend>기업정보조회 - 단건</legend>
                    <div class ="fieldset4">
                    <form method= "GET" id="corpnum_form" action="CheckBizInfo.php">
                        <input class= "txtCorpNum left" type="text" placeholder="사업자번호 기재" id="CorpNum" name="CorpNum" value ='<?php echo (isset($result->corpNum) ? $result->corpNum : "") ?>' tabindex=1/>
                        <p class="find_btn find_btn01 hand" onclick="search()" tabindex=2>조회</p>
                    </form>
                    </div>
            </fieldset>
            <?php
                if(isset($result)) {
            ?>
                <fieldset class="fieldset2">
                    <legend>기업정보조회 - 단건</legend>
                    <ul>
                        <li>사업자번호 (corpNum) : <?php echo $result->corpNum?></li>
                        <li>법인등록번호 (companyRegNum) : <?php echo $result->companyRegNum?></li>
                        <li>기업정보조회일시 (checkDT) : <?php echo $result->checkDT?></li>
                        <li>상호 (corpName) : <?php echo $result->corpName?></li>
                        <li>대표자명 (CEOName) : <?php echo $result->ceoname?></li>

                        <li>기업형태코드 (corpCode) : <?php echo $result->corpCode?></li>
                        <li>기업규모코드 (corpScaleCode) : <?php echo $result->corpScaleCode?></li>
                        <li>개인/법인코드 (personCorpCode) : <?php echo $result->personCorpCode?></li>
                        <li>본점/지점코드 (headOfficeCode) : <?php echo $result->headOfficeCode?></li>
                        <li>산업코드 (industryCode) : <?php echo $result->industryCode?></li>
                        <li>설립일자 (establishDate) : <?php echo $result->establishDate?></li>
                        <li>설립코드 (establishCode) : <?php echo $result->establishCode?></li>

                        <li>사업장코드 (workPlaceCode) : <?php echo $result->workPlaceCode?></li>
                        <li>주소유형코드 (addrCode) : <?php echo $result->addrCode?></li>
                        <li>우편번호 (zipCode) : <?php echo $result->zipCode?></li>
                        <li>주소 (addr) : <?php echo $result->addr?></li>
                        <li>상세주소 (addrDetail) : <?php echo $result->addrDetail?></li>
                        <li>영문주소 (enAddr) : <?php echo $result->enAddr?></li>
                        <li>업종 (bizClass) : <?php echo $result->bizClass?></li>
                        <li>업태 (bizType) : <?php echo $result->bizType?></li>
                        <li>상태코드 (result) : <?php echo $result->result?></li>
                        <li>상태메시지 (resultMessage) : <?php echo $result->resultMessage?></li>
                        <li>휴폐업상태 (closeDownState) : <?php echo $result->closeDownState?></li>
                        <li>휴폐업일자 (closeDownStateDate) : <?php echo $result->closeDownStateDate?></li>
                        <li>과세유형 (closeDownTaxType) : <?php echo $result->closeDownTaxType?></li>
                        <li>과세유형 전환일자 (closeDownTaxTypeDate) : <?php echo $result->closeDownTaxTypeDate?></li>
                    </ul>
                </fieldset>

            <?php
                } if(isset($code)) {
            ?>

                <fieldset class="fieldset2">
                    <legend>기업정보조회 - 단건</legend>
                    <ul>
                        <li>code (응답 코드) : <?php echo $code ?></li>
                        <li>message (응답 메시지) : <?php echo $message ?></li>
                    </ul>
                </fieldset>
            <?php
                }
            ?>

         </div>

          <script type ="text/javascript">
         window.onload=function(){
             document.getElementById('CorpNum').focus();
         }

         function search(){
            document.getElementById('corpnum_form').submit();
         }

         </script>
    </body>
</html>
