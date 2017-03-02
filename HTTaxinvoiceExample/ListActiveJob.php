<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 수집 요청건들에 대한 상태 목록을 확인합니다.
  * - 수집 요청 작업아이디(JobID)의 유효시간은 1시간 입니다.
  * - 응답항목에 관한 정보는 "[홈택스 전자(세금)계산서 연계 API 연동매뉴얼]
  *   > 3.2.3. ListActiveJob (수집 상태 목록 확인)" 을 참고하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

	try {
		$result = $HTTaxinvoiceService->ListActiveJob($testCorpNum);
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
				<legend>수집 상태 목록 확인</legend>
				<ul>
					<?
						if ( isset($code)) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
              for ( $i = 0; $i < Count ( $result ) ; $i++) {
          ?>
              <fieldset class="fieldset2">
              <legend>수집 상태 [ <?= $i+1 ?> / <?= Count($result) ?> ]</legend>
              <ul>
                <li>jobID (작업아이디) : <?= $result[$i]->jobID ?></li>
                <li>jobState (수집상태) : <?= $result[$i]->jobState ?></li>
                <li>queryType (수집유형) : <?= $result[$i]->queryType ?></li>
                <li>queryDateType (일자유형) : <?= $result[$i]->queryDateType ?></li>
                <li>queryStDate (시작일자) : <?= $result[$i]->queryStDate ?></li>
                <li>queryEnDate (종료일자) : <?= $result[$i]->queryEnDate ?></li>
                <li>errorCode (오류코드) : <?= $result[$i]->errorCode ?></li>
                <li>errorReason (오류메시지) : <?= $result[$i]->errorReason ?></li>
                <li>jobStartDT (작업 시작일시) : <?= $result[$i]->jobStartDT ?></li>
                <li>jobEndDT (작업 종료일시) : <?= $result[$i]->jobEndDT ?></li>
                <li>collectCount (수집개수) : <?= $result[$i]->collectCount ?></li>
                <li>regDT (수집 요청일시) : <?= $result[$i]->regDT ?></li>
              </ul>
              </fieldset>
              <?
              }
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
