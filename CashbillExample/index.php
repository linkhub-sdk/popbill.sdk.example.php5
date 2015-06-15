<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
	<body>
		<div id="content">
			
			<p class="heading1">팝빌 현금영수증 SDK PHP 5.X Example.</p>

			<br/>

			<fieldset class="fieldset1">
				<legend>팝빌 기본 API</legend>

				<fieldset class="fieldset2">
					<legend>회원정보</legend>
					<ul>
						<li><a href="CheckIsMember.php">checkIsMember</a> - 연동회원 가입 여부 확인</li>
						<li><a href="JoinMember.php">joinMember</a> - 연동회원 가입 요청</li>
						<li><a href="GetBalance.php">getBalance</a> - 연동회원 잔여포인트 확인</li>
						<li><a href="GetPartnerBalance.php">getPartnerBalance</a> - 파트너 잔여포인트 확인</li>
						<li><a href="GetPopbillURL.php">getPopbillURL</a> - 팝빌 SSO URL 요청</li>
					</ul>
				</fieldset>

			</fieldset>
			
			<br />
			
			<fieldset class="fieldset1">
				<legend>현금영수증 관련 API</legend>
				
				<fieldset class="fieldset2">
					<legend>등록/수정/발행/삭제</legend>
					<ul>
						<li><a href="CheckMgtKeyInUse.php">checkMgtKeyInUse</a> - 문서관리번호 사용여부 확인</li>
						<li><a href="Register.php">register</a> - 현금영수증 임시저장</li>
						<li><a href="Update.php">update</a> - 현금영수증 수정</li>
						<li><a href="Issue.php">issue</a> - 현금영수증 발행</li>
						<li><a href="CancelIssue.php">cancelIssue</a> - 현금영수증 발행취소</li>
						<li><a href="Delete.php">delete</a> - 현금영수증 삭제</li>
					</ul>
				</fieldset>
				
				<fieldset class="fieldset2">
					<legend>정보 확인</legend>
					<ul>
						<li><a href="GetInfo.php">getInfo</a> - 현금영수증 상태확인</li>
						<li><a href="GetInfos.php">getInfos</a> - 현금영수증 상태 대량 확인</li>
						<li><a href="GetLogs.php">getLogs</a> - 현금영수증 이력 확인</li>
						<li><a href="GetDetailInfo.php">getDetailInfo</a> - 현금영수증 상세정보 확인</li>
					</ul>
				</fieldset>
				
				<fieldset class="fieldset2">
					<legend>부가기능</legend>
					<ul>
						<li><a href="SendEmail.php">sendEmail</a> - 알림메일 재전송</li>
						<li><a href="SendSMS.php">sendSMS</a> - 알림문자 재전송</li>
						<li><a href="SendFAX.php">sendFAX</a> - 현금영수증 팩스 전송</li>
					</ul>
				</fieldset>
				
				<fieldset class="fieldset2">
					<legend>팝빌 현금영수증 SSO URL 기능</legend>
					<ul>
						<li><a href="GetURL.php">getURL</a> - 현금영수증 관련 SSO URL 확인</li>
						<li><a href="GetPopUpURL.php">getPopUpURL</a> - 해당 현금영수증의 팝빌 화면을 표시하는 URL 확인</li>
						<li><a href="GetPrintURL.php">getPrintURL</a> - 해당 현금영수증의 팝빌 인쇄 화면을 표시하는 URL 확인</li>
						<li><a href="GetEPrintURL.php">getEPrintURL</a> - 해당 현금영수증의 팝빌 인쇄 화면을 표시하는 URL 확인(공급받는자용)</li>
						<li><a href="GetMassPrintURL.php">getMassPrintURL</a> - 다량(최대100건)의 현금영수증 인쇄 화면을 표시하는 URL 확인 </li>
						<li><a href="GetMailURL.php">getMailURL</a> - 해당 현금영수증의 전송메일상의 "보기" 버튼에 해당하는 URL 확인 </li>
					</ul>
				</fieldset>
				<fieldset class="fieldset2">
					<legend>기타</legend>
					<ul>
						<li><a href="GetUnitCost.php">getUnitCost</a> - 현금영수증 발행단가 확인</li>
					</ul>
				</fieldset>

			</fieldset>
		 </div>
	</body>
</html>