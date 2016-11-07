<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />

		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
	<body>
		<div id="content">

			<p class="heading1">팝빌 세금계산서 SDK PHP 5.x Example.</p>

			<br/>

			<fieldset class="fieldset1">
				<legend>팝빌 기본 API</legend>

				<fieldset class="fieldset2">
					<legend>회원사 정보</legend>
					<ul>
						<li><a href="CheckIsMember.php">checkCorpIsMember</a> - 연동회원 가입 여부 확인</li>
						<li><a href="CheckID.php">checkID</a> - 연동회원 아이디 중복 확인</li>
						<li><a href="JoinMember.php">joinMember</a> - 연동회원 가입 요청</li>
            <li><a href="GetChargeInfo.php">getChargeInfo</a> - 과금정보 확인</li>
            <li><a href="GetBalance.php">getBalance</a> - 연동회원 잔여포인트 확인</li>
						<li><a href="GetPartnerBalance.php">getPartnerBalance</a> - 파트너 잔여포인트 확인</li>
						<li><a href="GetPopbillURL.php">getPopbillURL</a> - 팝빌 SSO URL 요청(로그인, 포인트 충전, 공인인증서 등록)</li>
						<li><a href="RegistContact.php">registContact</a> - 담당자 추가</li>
						<li><a href="ListContact.php">listContact</a> - 담당자 목록 확인</li>
						<li><a href="UpdateContact.php">updateContact</a> - 담당자 정보 수정</li>
						<li><a href="GetCorpInfo.php">getCorpInfo</a> - 회사정보 확인</li>
						<li><a href="UpdateCorpInfo.php">updateCorpInfo</a> - 회사정보 수정</li>
					</ul>
				</fieldset>

			</fieldset>

			<br />

			<fieldset class="fieldset1">
				<legend>전자세금계산서 관련 API</legend>

				<fieldset class="fieldset2">
					<legend>등록/수정/확인/삭제</legend>
					<ul>
						<li><a href="CheckMgtKeyInUse.php">checkMgtKeyInUse</a> - 관리번호의 등록/사용여부 확인</li>
            <li><a href="RegistIssue.php">registIssue</a> - 세금계산서 즉시발행 처리</li>
						<li><a href="Register.php">register</a> - 세금계산서 등록</li>
						<li><a href="Update.php">update</a> - 세금계산서 수정</li>
						<li><a href="GetInfo.php">getInfo</a> - 세금계산서 상태/요약 정보 확인</li>
						<li><a href="GetInfos.php">getInfos</a> - 다량(최대 1000건)의 세금계산서 상태/요약 정보 확인</li>
						<li><a href="GetDetailInfo.php">getDetailInfo</a> - 세금계산서 상세 정보 확인</li>
						<li><a href="Delete.php">delete</a> - 세금계산서 삭제</li>
						<li><a href="GetLogs.php">getLogs</a> - 세금계산서 문서이력 확인</li>
						<li><a href="Search.php">search</a> - 세금계산서 기간조회</li>
						<li><a href="AttachFile.php">attachFile</a> - 세금계산서 첨부파일 추가</li>
						<li><a href="GetFiles.php">getFiles</a> - 세금계산서 첨부파일 목록확인</li>
						<li><a href="DeleteFile.php">deleteFile</a> - 세금계산서 첨부파일 1개 삭제</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>처리 프로세스</legend>
					<ul>
						<li><a href="Send.php">send</a> - 정발행/위수탁 세금계산서 발행예정 처리</li>
						<li><a href="CancelSend.php">cancelSend</a> - 정발행/위수탁 세금계산서 발행예정 취소 처리</li>
						<li><a href="Accept.php">accept</a> - 정발행/위수탁 세금계산서 발행예정에 대한 공급받는자의 승인 처리</li>
						<li><a href="Deny.php">deny</a> - 정발행/위수탁 세금계산서 발행예정에 대한 공급받는자의 거부 처리</li>
						<li><a href="Issue.php">issue</a> - 세금계산서 발행 처리</li>
						<li><a href="CancelIssue.php">cancelIssue</a> - 세금계산서 발행취소 처리 (국세청 전송전까지만 취소 가능)</li>
						<li><a href="Request.php">request</a> - 세금계산서 역)발행요청 처리.</li>
						<li><a href="CancelRequest.php">cancelRequest</a> - 세금계산서 역)발행요청 취소 처리.</li>
						<li><a href="Refuse.php">refuse</a> - 세금계산서 역)발행요청에 대한 공급자의 발행거부 처리.</li>
						<li><a href="SendToNTS.php">sendToNTS</a> - 발행된 세금계산서의 국세청 즉시전송 요청.</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>부가 기능</legend>
					<ul>
						<li><a href="SendEmail.php">sendEmail</a> - 처리 프로세스에 대한 이메일 재전송 요청</li>
						<li><a href="SendSMS.php">sendSMS</a> - 발행예정/발행/역)발행요청 에 대한 문자메시지 안내 재전송 요청.</li>
						<li><a href="SendFAX.php">sendFAX</a> - 세금계산서에 대한 팩스 전송 요청..</li>
						<li><a href="AttachStatement.php">attachStatement</a> - 전자명세서 첨부</li>
						<li><a href="DetachStatement.php">detachStatement</a> - 전자명세서 첨부해제</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>팝빌 세금계산서 SSO URL 기능</legend>
					<ul>
						<li><a href="GetURL.php">getURL</a> - 세금계산서 관련 SSO URL 확인</li>
						<li><a href="GetPopUpURL.php">getPopUpURL</a> - 해당 세금계산서의 팝빌 화면을 표시하는 URL 확인</li>
						<li><a href="GetPrintURL.php">getPrintURL</a> - 해당 세금계산서의 팝빌 인쇄 화면을 표시하는 URL 확인</li>
						<li><a href="GetMassPrintURL.php">getMassPrintURL</a> - 다량(최대100건)의 세금계산서 인쇄 화면을 표시하는 URL 확인</li>
						<li><a href="GetEPrintURL.php">getEPrintURL</a> - 해당 세금계산서의 공급받는자용 팝빌 인쇄 화면을 표시하는 URL 확인</li>
						<li><a href="GetMailURL.php">getMailURL</a> - 해당 세금계산서의 전송메일상의 "보기" 버튼에 해당하는 URL 확인</li>
					</ul>
				</fieldset>

				<fieldset class="fieldset2">
					<legend>기타</legend>
					<ul>
						<li><a href="GetUnitCost.php">getUnitCost</a> - 세금계산서 발행 단가 확인</li>
						<li><a href="GetCertificateExpireDate.php">getCertificateExpireDate</a> - 연동회원이 등록한 공인인증서의 만료일시 확인</li>
						<li><a href="GetEmailPublicKeys.php">getEmailPublicKeys</a> - Email 유통을 위한 대용량 연계사업자 이메일 목록 확인</li>
					</ul>
				</fieldset>
			</fieldset>
		 </div>
	</body>
</html>
