function myFunction(input, checkbox ) {
    var bool = document.getElementById(checkbox).checked;
    if (bool) {
        document.getElementById(imput).required = true;
        document.getElementById(imput).disabled = false;
    }
    else {
        document.getElementById(imput).value = '';
        document.getElementById(imput).required = false;
        document.getElementById(imput).disabled = true;
    }
}