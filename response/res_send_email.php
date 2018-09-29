<?php
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once ('../autoload.php');

if(empty($_POST['name']) or empty($_POST['company']) or empty($_POST['email']) or empty($_POST['message'])){
    AlertMsgAndRedirectTo(ROOT . 'contact.html', ' 잘못된 접근입니다.');
    exit;
}

$name=getDataByPost('name');
$company=getDataByPost('company');
$email=getDataByPost('email');
$website=getDataByPost('website');
$message=getDataByPost('message');

use JCORP\Email\EmailService as EmailService;

$html = "<h2>아래과 같은 내용으로 문의가 접수되었습니다.</h2>";
$html .= "<p><b>이름</b>: $name</p>";
$html .= "<p><b>회사</b>: $company</p>";
$html .= "<p><b>이메일</b>: $email</p>";
$html .= "<p><b>웹사이트</b>: $website</p>";
$html .= "<div style='white-space: pre-line;'>$message</div>";

// 이메일 전송
$emailInc = new EmailService();
$emailInc->setEmailinfo("dawoony919@gmail.com");
$emailInc->setHTMLEmail(
    "[JCORP 알림] 홈페이지를 통해서 아래와 같은 정보가 수집되었습니다.",
    $html
);
$result=$emailInc->sendEmail();

AlertMsgAndRedirectTo(ROOT . 'contact.html', '정상적으로 문의가 접수되었습니다. 감사합니다.');


exit;
?>