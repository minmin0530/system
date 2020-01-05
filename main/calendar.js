var month = 0;
var year = 0;
var today = 0;


function send() {

    var prm = new URLSearchParams();
    prm.append("name","world");

    var req = new Request('./main/Reserv.php',{
        method : "POST",
        body : prm
    });

    fetch(req).then(function(response){
        if (response.ok) {
            console.log(response.url); //レスポンスのURL
            console.log(response.status); //レスポンスのHTTPステータスコード
        }
    });


}
    

function back() {
    const date = new Date();
    year = date.getFullYear();
    month = (date.getMonth() + 1);
    today = date.getDate();
    showCalendar(year, month);
};


function input(day) {
    const article = document.getElementsByTagName("article")[0];
    article.style.width = "90%";
    article.style.height = "1000px";
    article.style.background = "#eeeeee";

    const date = "<br><input type='text' id='date' readonly value='"+ year + "/" + month + "/" + day+"'></input>";
    const name = "<br><input type='name' id='name' placeholder='名前'></input>";
    const mail = "<br><input type='mail' id='email' placeholder='メール'></input>";
    const tel  = "<br><input type='tel'  id='tel'  placeholder='電話番号'></input>";
    const send = "<button onclick='send();'>送信</button>";

    article.innerHTML = "<div><span id='yearmonth'>" + year + "/" + month + "/" + day + "</span>" +
     date + name + mail + tel + send + "</div>";
};

function createCalendar(year, month) {
    const startDate = new Date(year, month - 1, 1) // 月の最初の日を取得
    const endDate = new Date(year, month,  0) // 月の最後の日を取得
    const endDayCount = endDate.getDate() // 月の末日
    const startDay = startDate.getDay() // 月の最初の日の曜日を取得

    const week = ["日", "月", "火", "水", "木", "金", "土"];
    let day = 1;
    let table = "<table>";
    for (let y = 0; y < 7; ++y) {
        let line = "<tr>";
        for (let x = 0; x < 7; ++x) {
            if (y == 0) {
                line += "<th>" + week[x] + "</th>";
            } else {
                if (y == 1 && x < startDay) {
                    line += "<td></td>";
                } else if (day > endDayCount) {
                    line += "<td></td>";
                } else {
                    if (x == 0) {
                        line += "<td class='sun' onclick='input("+day+")'>" + day + "</td>";

                    } else if (x == 6) {
                        line += "<td class='sat' onclick='input("+day+")'>" + day + "</td>";

                    } else {
                        line += "<td onclick='input("+day+")'>" + day + "</td>";
                    }
                    ++day;
                }
            }
        }
        line += "</tr>";
        table += line;
    }
    table += "</table>";
    return table;
}

function showCalendar(year, month) {
    const article = document.getElementsByTagName("article")[0];
    article.style.background = "#ffffff";
    article.innerHTML = "<div>" +
    "<button onclick='prev();'>前の月</button>" +
    "<button onclick='next();'>次の月</button>" +
    "<span id='yearmonth'>" + year + "年" + month + "月</span>" +
    createCalendar(year, month) + "</div>";
}

function prev() {
    --month;
    if(month < 1){
        month = 12;
        --year;
    }
    showCalendar(year, month);
};
function next() {
    ++month;
    if (month > 12) {
        month = 1;
        ++year;
    }
    showCalendar(year, month);
};
window.onload = function() {
    const date = new Date();
    year = date.getFullYear();
    month = (date.getMonth() + 1);
    today = date.getDate();
    showCalendar(year, month);
};