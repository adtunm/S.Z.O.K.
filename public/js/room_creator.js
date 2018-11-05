var roomContentContener;
var row;
var seat;
var seatTable;
// import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';
var test;


function dataVerification() {
    //
    // const routes = require('../../public/js/fos_js_routes.json');
    // Routing.setRoutingData(routes);


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var result = this.responseText;
            if(result){
                dataPull();
            }else{
                document.getElementById("demo").innerHTML = "222222222!";
            }
        }
        else{
            document.getElementById("demo").innerHTML = "1111111111!";
        }
    };

    // var url = Routing.generate('workers_app/room_creator_page/room_number_verification', {roomNumber: 2});

    // var url = "{{ path('workers_app/room_creator_page/room_number_verification', {'roomNumber': '2'}) }}";
    xmlhttp.open("GET", "../dataVerification.php?roomNumber=2" , true);
    xmlhttp.send();
}



function createRoom() {
    row = document.getElementById("inputRowNumber").value;
    seat = document.getElementById("inputSeatNumber").value;
    roomContentContener = document.getElementById("roomContent");
    var rowValue;
    var seatValue;
    seatTable = [];

    var text = "<form method=\"post\" class=\"form-horizontal\">";
    for (var i = 0; i < row; i++) {
        seatTable[i] = [];
        text += "<div class=\" mb-2\">";
        rowValue = i + 1;
        text += "<button class=\"btn btn-link mr-1\" style=\"width: 50px\" id=\"buttonRow" + rowValue + "\" name=\"" + rowValue + "\" onClick=\"changeTypeOfRow(this)\" type=\"button\">" + rowValue + "</button>";
        for (j = 0; j < seat; j++) {
            seatTable[i][j] = 1;
            seatValue = j + 1;
            text += "<button class=\"seat seat_normal mr-1\" id=\"" + rowValue + "_" + seatValue + "\" name=\"" + rowValue + "\"  onClick=\"changeTypeOfSeat(this)\" type=\"button\">" + seatValue + "</button>";
        }
        seatTable[i][seat] = 1;
        text += "</div>";
    }
    text += "</form>";
    roomContentContener.innerHTML = text;
}

function changeTypeOfSeat(button) {
    var seat_number = button.textContent;
    var row_number = button.name - 1;
    var seat_type = seatTable[row_number][seat_number];
    if (seat_type == 1) {
        seatTable[row_number][seat_number] = 0;
        button.classList.remove("seat_normal");
        button.classList.add("seat_inactive");
    }
    else {
        seatTable[row_number][seat_number] = 1;
        button.classList.remove("seat_inactive");
        button.classList.add("seat_normal");
    }
}

function createButton(rowType, seatType, rowValue, seatValue) {
    var text = "";


    if (seatType == 0) {
        text = "<button class=\"seat seat_inactive mr-1\" id=\"" + rowValue + "_" + seatValue + "\" name=\"" + rowValue + "\"  onClick=\"changeTypeOfSeat(this)\" type=\"button\">" + seatValue + "</button>";
    }
    else {
        if (rowType == 0) {
            text = "<button class=\"seat seat_buying_only mr-1\" id=\"" + rowValue + "_" + seatValue + "\" name=\"" + rowValue + "\"  onClick=\"changeTypeOfSeat(this)\" type=\"button\">" + seatValue + "</button>";
        }
        else {
            text = "<button class=\"seat seat_normal mr-1\" id=\"" + rowValue + "_" + seatValue + "\" name=\"" + rowValue + "\"  onClick=\"changeTypeOfSeat(this)\" type=\"button\">" + seatValue + "</button>";

        }
    }

    return text;
}

function createView() {
    var rowValue;
    var seatValue;
    var text_2;


    var text = "<form method=\"post\" class=\"form-horizontal\">";
    for (var i = 0; i < row; i++) {
        text += "<div class=\" mb-2\">";
        rowValue = i + 1;
        text += "<button class=\"btn btn-link mr-1\" style=\"width: 50px\" id=\"buttonRow" + rowValue + "\" name=\"" + rowValue + "\" onClick=\"changeTypeOfRow(this)\" type=\"button\">" + rowValue + "</button>";
        for (var j = 1; j < seat; j++) {
            seatValue = j + 1;
            text_2 = createButton(seatTable[i][0], seatTable[i][j], rowValue, seatValue);
            text += text_2;


        }
        text += "</div>";
    }
    text += "</form>";

    roomContentContener.innerHTML = text;
}

function changeTypeOfRow(button) {

    var row_number = button.textContent - 1;
    var row_type = seatTable[row_number][0];

    if (row_type == 1) {
        seatTable[row_number][0] = 0;
    }
    else {
        seatTable[row_number][0] = 1;
    }
    createView();
}



