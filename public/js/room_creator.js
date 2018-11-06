var roomContentContener = document.getElementById("roomContent");
var row;
var seat;
var seatTable;
var rowTable;
const ROW_BUYING_ONLY = 2;
const ROW_NORMAL = 1;
const SEAT_NORMAL = 1;
const SEAT_INACTIVE = 0;

window.onload = function () {
    createRoom();
}

function createTables() {
    row = document.getElementById("inputRowNumber").value;
    seat = document.getElementById("inputSeatNumber").value;
    seatTable = [];
    rowTable = [];
    for (var i = 0; i < row; i++) {
        rowTable[i] = 1;
        seatTable[i] = [];
        for (var j = 0; j < seat; j++) {
            seatTable[i][j] = 1;
        }
    }
}

function createRoom() {
    createTables();
    createView();
}


// function createRoom() {
//     row = document.getElementById("inputRowNumber").value;
//     seat = document.getElementById("inputSeatNumber").value;
//     roomContentContener = document.getElementById("roomContent");
//     var rowValue;
//     var seatValue;
//     seatTable = [];
//
//     var text = "<form method=\"post\" class=\"form-horizontal\">";
//     for (var i = 0; i < row; i++) {
//         seatTable[i] = [];
//         text += "<div class=\" mb-2\">";
//         rowValue = i + 1;
//         text += "<button class=\"btn btn-link mr-1\" style=\"width: 50px\" id=\"buttonRow" + rowValue + "\" name=\"" + rowValue + "\" onClick=\"changeTypeOfRow(this)\" type=\"button\">" + rowValue + "</button>";
//         for (var j = 0; j < seat; j++) {
//             seatTable[i][j] = 1;
//             seatValue = j + 1;
//             text += "<button class=\"seat seat_normal mr-1\" id=\"" + rowValue + "_" + seatValue + "\" name=\"" + rowValue + "\"  onClick=\"changeTypeOfSeat(this)\" type=\"button\">" + seatValue + "</button>";
//         }
//         seatTable[i][seat] = 1;
//         text += "</div>";
//     }
//     text += "</form>";
//     roomContentContener.innerHTML = text;
//
//     var seatTableString = '';
//     for (var i = 0; i < row; i++) {
//         for (var j = 0; j < seat; j++) {
//             seatTableString += seatTable[i][j];
//         }
//     }
//     // document.getElementById("demo").innerHTML = myData;
// }

function setData(){

    seatTableString = '';
    rowTableString = '';
    for (var i = 0; i < row; i++) {
        rowTableString += rowTable[i];
        for (var j = 0; j < seat; j++) {
            seatTableString += seatTable[i][j];
        }
    }
    document.getElementById("roomNumber").value = document.getElementById("inputRoomNumber").value;
    document.getElementById("rowCount").value = row;
    document.getElementById("seatCount").value = seat;
    document.getElementById("rowCode").value = rowTableString;
    document.getElementById("seatCode").value = seatTableString;
    //document.getElementById("demo").innerHTML = seatTableString;
}


function changeTypeOfSeat(button) {
    var seat_number = button.textContent-1;
    var row_number = button.name - 1;
    var seat_type = seatTable[row_number][seat_number];
    var row_type = rowTable[row_number];
    if (seat_type === SEAT_NORMAL) {
        seatTable[row_number][seat_number] = SEAT_INACTIVE;
        if(row_type === ROW_NORMAL){
            button.classList.remove("seat_normal");
            button.classList.add("seat_inactive");
        }
        else{
            button.classList.remove("seat_buying_only");
            button.classList.add("seat_inactive");
        }
    }
    else {
        seatTable[row_number][seat_number] = SEAT_NORMAL;
        if(row_type === ROW_NORMAL){
            button.classList.remove("seat_inactive");
            button.classList.add("seat_normal");
        }
        else{
            button.classList.remove("seat_inactive");
            button.classList.add("seat_buying_only");
        }
    }
}

function createButton(rowType, seatType, rowValue, seatValue) {
    var text = "";

    if (seatType === SEAT_INACTIVE) {
        text = "<button class=\"seat seat_inactive mr-1\" id=\"" + rowValue + "_" + seatValue + "\" name=\"" + rowValue + "\"  onClick=\"changeTypeOfSeat(this)\" type=\"button\">" + seatValue + "</button>";
    }
    else {
        if (rowType === ROW_BUYING_ONLY) {
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
        for (var j = 0; j < seat; j++) {
            seatValue = j + 1;
            text_2 = createButton(rowTable[i], seatTable[i][j], rowValue, seatValue);
            text += text_2;
        }
        text += "</div>";
    }
    text += "</form>";
    roomContentContener.innerHTML = text;
}

function changeTypeOfRow(button) {
    var row_number = button.textContent - 1;
    var row_type = rowTable[row_number];

    if (row_type === ROW_NORMAL) {
        rowTable[row_number] = ROW_BUYING_ONLY;
    }
    else {
        rowTable[row_number] = ROW_NORMAL;
    }
    createView();
}



