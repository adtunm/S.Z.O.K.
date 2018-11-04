var roomContentContener;
var row;
var seat;
var seatTable;

var test;

function f() {
    $.ajax({
        url: "saveToDatabase.php",
        type: "post", //typ połączenia
        dataType: 'json', //typ danych jakich oczekujemy w odpowiedzi
        data: { //dane do wysyłki
            name: 'Marcin',
            country: 'Polska'
        }
    });
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



