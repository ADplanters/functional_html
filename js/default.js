// bPopup 인스턴스 저장용 객체
var popupInstances = {};
var downloadTimer = null;
var isDownloading = false;

/**
 * 팝업 열기
 */
function openPopup(div_id) {
    // layer_1을 열 때만 다운로드 이미지 1단계로 초기화
    if (div_id === "layer_1") {
        downimg_change(1);
    }

    // layer_2를 열 때는 열려있던 layer_1을 먼저 닫음
    if (div_id === "layer_2") {
        if (popupInstances["layer_1"]) {
            try { popupInstances["layer_1"].close(); } catch(e) {}
        }
        $("#layer_1").hide();
    }

    // bPopup 플러그인이 로드되어 있는 경우
    if ($.fn.bPopup) {
        // 이미 열려있는 동일 팝업이 있다면 먼저 닫기
        if (popupInstances[div_id]) {
            try { popupInstances[div_id].close(); } catch(e) {}
        }

        popupInstances[div_id] = $("#" + div_id).bPopup({
            modalClose: true,
            closeClass: "btn",
            onClose: function() {
                if (div_id === "layer_1") {
                    $("#down_chk").val("0");
                    isDownloading = false;
                    clearTimeout(downloadTimer);
                }
            }
        });
    } else {
        // bPopup 라이브러리가 없을 때 기본 jQuery 대체
        $("#" + div_id).fadeIn(200);
    }
}

/**
 * 팝업 닫기
 */
function closePopup() {
    // bPopup 인스턴스가 있으면 정상 종료
    if (popupInstances["layer_1"]) {
        try { popupInstances["layer_1"].close(); } catch(e) {}
    }
    if (popupInstances["layer_2"]) {
        try { popupInstances["layer_2"].close(); } catch(e) {}
    }

    // 일반 hide 처리 및 상태 초기화
    $("#layer_1, #layer_2").hide();
    $("#down_chk").val("0");
    isDownloading = false;
    clearTimeout(downloadTimer);
}

/**
 * 1번 레이어 열기 및 다운로드 시뮬레이션 시작
 */
function layer_1_open(div_id) { 
    var down_chk = $("#down_chk").val();
    if (down_chk == "0" || !down_chk) {
        openPopup(div_id);
        $("#down_chk").val("1");

        clearTimeout(downloadTimer);
        downloadTimer = setTimeout(function() {
            down_loading(1);
        }, 500);
    }
}

/**
 * 단계별 다운로드 상태(속도, 퍼센트, 이미지) 변경
 */
function downimg_change(num) {
    if (num < 1 || num > 8) return;

    var file_speed  = ["", "11.2MB", "11.5MB", "12.2MB", "12.6MB", "12.6MB", "13.1MB", "13.0MB", "13.8MB"];
    var file_cnt    = ["", "0/2", "1/2", "1/2", "1/2", "2/2", "2/2", "2/2", "2/2"];
    var file01_down = ["", "1.3MB", "2.3MB", "4.1MB", "5.4MB", "6.2MB", "6.2MB", "6.2MB", "6.2MB"];
    var file02_down = ["", "1.3MB", "1.8MB", "2.1MB", "2.9MB", "3.23MB", "4.3MB", "4.9MB", "5MB"];

    $("#down_bar").attr("src", "images/down_bar_" + num + ".jpg");
    $("#file_speed").html(file_speed[num]);
    $("#file_cnt").html(file_cnt[num]);
    $("#file01_down").html(file01_down[num]);
    $("#file02_down").html(file02_down[num]);
}

/**
 * 다운로드 진행 타이머 함수 (1 ~ 8단계 진행 후 layer_2 호출)
 */
function down_loading(counter) {
    isDownloading = true;

    if (counter < 8) {
        clearTimeout(downloadTimer);
        downloadTimer = setTimeout(function() {
            if (!isDownloading) return;
            counter++;
            downimg_change(counter);
            down_loading(counter);
        }, 300);
    } else if (counter === 8) {
        clearTimeout(downloadTimer);
        downloadTimer = setTimeout(function() {
            if (!isDownloading) return;
            isDownloading = false;
            openPopup('layer_2');
        }, 1000);
    }
}

/**
 * 상단 동전 배경 떨어지는 애니메이션
 */
function money_move() {
    var easingType = ($.easing && $.easing.easeOutBounce) ? "easeOutBounce" : "swing";
    $('.money_bg').animate(
        { 'top': '0px', 'left': '0px' },
        2000,
        easingType
    );
}