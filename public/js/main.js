let percentage = document.querySelector('.percentage');
let percent = document.querySelector('.percent');

function change() {
    navigator.getBattery().then(function (battery) {
        percentage.style.width = battery.level * 100 + '%';
        percent.innerHTML = battery.level * 100 + '%';
        if (battery.level * 100 < 15) {
            document.querySelector('.alert').style.width = "100%";
            document.querySelector('.alert').style.height = "100vh";
            document.querySelector('.alert a').style.display = "block";

        }
    })
}
setInterval(change, 1000);

// navigator.getBattery().then((battery) => {

//     battery.ondischargingtimechange = (event) => { 
//        console.warn(`Discharging : `, event.target.level) 
//     };

//     battery.onchargingtimechange = (event) => { 
//        console.info(`Charging : `, event.target.level) ;
//     };
// });