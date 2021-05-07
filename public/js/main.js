let percentage = document.querySelector('.percentage');
let percent = document.querySelector('.percent');

function change() {
    navigator.getBattery().then(function (battery) {
        percentage.style.width = battery.level * 100 + '%';
        percent.innerHTML = battery.level * 100 + '%';
        if (battery.level * 100 < 20) {
            document.querySelector('.alert').style.width = "100%";
            document.querySelector('.alert').style.height = "100vh";
            document.querySelector('.alert a').style.display = "block";

        }
    })
}
setInterval(change, 5000);