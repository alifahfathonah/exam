function getJawaban() {
    var JawabanValue = document.getElementById('Jawaban').value;
    console.log(JawabanValue);
}

function forceKeyPressUppercase(e) {
    var charInput = e.keyCode;
    if ((charInput >= 97) && (charInput <= 122)) { // lowercase
        if (!e.ctrlKey && !e.metaKey && !e.altKey) { // no modifier key
            var newChar = charInput - 32;
            var start = e.target.selectionStart;
            var end = e.target.selectionEnd;
            e.target.value = e.target.value.substring(0, start) + String.fromCharCode(newChar) + e.target.value.substring(end);
            e.target.setSelectionRange(start + 1, start + 1);
            e.preventDefault();
        }
    }
}
document.getElementById("tokenUjian").addEventListener("keypress", forceKeyPressUppercase, false);

function getkey(e) {
    if (window.event)
        return window.event.keyCode;
    else if (e)
        return e.which;
    else
        return null;
}

function angkadanhuruf(e, goods, field) {
    var angka, karakterangka;
    angka = getkey(e);
    if (angka == null) return true;

    karakterangka = String.fromCharCode(angka);
    karakterangka = karakterangka.toLowerCase();
    goods = goods.toLowerCase();

    // check goodkeys
    if (goods.indexOf(karakterangka) != -1)
        return true;
    // control angka
    if (angka == null || angka == 0 || angka == 8 || angka == 9 || angka == 27)
        return true;

    if (angka == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
                break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
    };
    // else return false
    return false;
}
