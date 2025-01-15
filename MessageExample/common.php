<?php
/**
 * 팝빌 문자 API Java SDK PHP Example
 * PHP 연동 튜토리얼 안내 : https://developers.popbill.com/guide/sms/php/getting-started/tutorial?fwn=php
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
 * 3) 문자를 전송하기 위해 발신번호 사전등록을 합니다. (등록방법은 사이트/API 두가지 방식이 있습니다.)
 *     - 팝빌 사이트 로그인 > [문자/팩스] > [문자] > [발신번호 사전등록] 메뉴에서 등록
 *     - getSenderNumberMgtURL API를 통해 반환된 URL을 이용하여 발신번호 등록
 */

  require_once '../Popbill/PopbillMessaging.php';

  // 링크아이디
  $LinkID = 'TESTER';

  // 비밀키
  $SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

  // 통신방식 기본은 CURL , curl 사용에 문제가 있을경우 STREAM 사용가능.
  // STREAM 사용시에는 allow_url_fopen = on 으로 설정해야함.
  define('LINKHUB_COMM_MODE','CURL');

  $MessagingService = new MessagingService($LinkID, $SecretKey);

  // 연동환경 설정, true-테스트, false-운영(Production), (기본값:false)
  $MessagingService->IsTest(true);

  // 인증토큰 IP 검증 설정, true-사용, false-미사용, (기본값:true)
  $MessagingService->IPRestrictOnOff(true);

  // 통신 IP 고정, true-사용, false-미사용, (기본값:false)
  $MessagingService->UseStaticIP(false);

  // 로컬시스템 시간 사용여부, true-사용, false-미사용, (기본값:true)
  $MessagingService->UseLocalTimeYN(true);
?>
