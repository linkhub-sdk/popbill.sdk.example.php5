<?php
/**
  * 팝빌 홈택스 현금영수증 API PHP SDK Example
  * PHP 연동 튜토리얼 안내 : https://developers.popbill.com/guide/htcashbill/php/getting-started/tutorial?fwn=php
  *
  * 업데이트 일자 : 2025-01-15
  * 연동 기술지원 연락처 : 1600-9854
  * 연동 기술지원 이메일 : code@linkhubcorp.com
  *         
  * <테스트 연동개발 준비사항>
  * 1) API Key 변경 (연동신청 시 메일로 전달된 정보)
  *     - LinkID : 링크허브에서 발급한 링크아이디
  *     - SecretKey : 링크허브에서 발급한 비밀키
  * 2) SDK 환경설정 옵션 설정
  *     - IsTest : 연동환경 설정, true-테스트, false-운영(Production), (기본값:true)
  *     - IPRestrictOnOff : 인증토큰 IP 검증 설정, true-사용, false-미사용, (기본값:true)
  *     - UseStaticIP : 통신 IP 고정, true-사용, false-미사용, (기본값:false)
  *     - UseLocalTimeYN : 로컬시스템 시간 사용여부, true-사용, false-미사용, (기본값:true)
  * 3) 홈택스 로그인 인증정보를 등록합니다. (부서사용자등록 / 공동인증서 등록)
  *     - 팝빌로그인 > [홈택스수집] > [환경설정] > [인증 관리] 메뉴
  *     - 홈택스수집 인증 관리 팝업 URL(GetCertificatePopUpURL API) 반환된 URL을 이용하여
  *       홈택스 인증 처리를 합니다.
  */

  require_once '../Popbill/PopbillHTCashbill.php';

  // 링크아이디
  $LinkID = 'TESTER';

  // 비밀키
  $SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

  // 통신방식 기본은 CURL , curl 사용에 문제가 있을경우 STREAM 사용가능.
  // STREAM 사용시에는 allow_url_fopen = on 으로 설정해야함.
  define('LINKHUB_COMM_MODE','CURL');

  $HTCashbillService = new HTCashbillService($LinkID, $SecretKey);

  // 연동환경 설정, true-테스트, false-운영(Production), (기본값:false)
  $HTCashbillService->IsTest(true);

  // 인증토큰 IP 검증 설정, true-사용, false-미사용, (기본값:true)
  $HTCashbillService->IPRestrictOnOff(true);

  // 통신 IP 고정, true-사용, false-미사용, (기본값:false)
  $HTCashbillService->UseStaticIP(false);

  // 로컬시스템 시간 사용여부, true-사용, false-미사용, (기본값:true)
  $HTCashbillService->UseLocalTimeYN(true);
?>
