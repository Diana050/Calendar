function openForm() {
    document.getElementById("loginForm").style.display = "block";
}

function closeForm() {
    document.getElementById("loginForm").style.display = "none";
}


function openFormS() {
    document.getElementById("signinForm").style.display = "block";
}

function closeFormS() {
    document.getElementById("signinForm").style.display = "none";
}


function openFormA() {
    document.getElementById("appointForm").style.display = "block";
}

function closeFormA() {
    document.getElementById("appointForm").style.display = "none";
}


const daysEls = document.querySelectorAll(".day");
let dateArray = [];
let link = new  URL(window.location.href);
let dateFromUrl = link.searchParams.get('date');
console.log(dateFromUrl)

if (dateFromUrl!==null){
    dateArray = dateFromUrl.split('-');
    document.getElementById("dissappear").innerText = "Schedule for " + '\n' + toMonthName(dateArray[1]) +" "+dateArray[2]+" "+ dateArray[0];
    console.log(moment().month(dateArray[1]-1).format("MMMM"));
    document.getElementById("month").innerText = `${moment().month(dateArray[1]-1).format("MMMM")} ${dateArray[0]}`;
}
else
{
    dateArray[1] = moment().month()+1;
    document.getElementById("month").innerHTML = toMonthName(moment().month()+1) + " " + moment().year();
    window.location.href += "?date="+moment().year()+"-"+dateArray[1]+"-"+moment().day();
    ///baga ziua curenta cu moment
}

let newDate;
daysEls.forEach(day => {
    day.addEventListener("click",function (){
        let date = day.dataset.date;
        document.getElementById("dissappear").innerText = "Schedule for " + '\n' + date + " " + currentYear;
        let x = document.getElementById("dissappear");
        x = x.innerText.slice(13, x.innerText.length);
        x = x.split(" ");
        newDate = x[2] + "-" + moment(x[0],"MMMM").format("MM") + "-" + moment(x[1],"D").format("DD");
        localStorage.setItem('test', x[0]);
        submitGETform(newDate);
    });
})

function submitGETform(newDate){
    document.getElementById("getDateForm").value = newDate;
    document.getElementById("getBtnForm").click();
}

function thisMonth() {
    let dayCode = 1;
    let counter = 0;
    emptyDaysElement.forEach(cell => {
        cell.removeAttribute("data-date");
        cell.innerHTML = "";

        let startingDayOfNextMonth = moment().year(currentYear).month(toMonthName(dateArray[1])).startOf("month").day()
        let numberOfDaysInNextMonth = moment().year(currentYear).month(dateArray[1]).daysInMonth();

        if (counter >= startingDayOfNextMonth && dayCode <= numberOfDaysInNextMonth) {
            cell.classList.add("day");
            cell.innerHTML = dayCode;
            cell.setAttribute("data-date", toMonthName(dateArray[1]) + " " + dayCode);
            localStorage.setItem('aaaaaaaa',currentMonth);
            dayCode++;
        } else {
            //cell.classList.add("hidden");
        }
        counter++;
    })
    initialized = 1;
}


let initialized = 0;


function toMonthName(monthNumber) {
    return moment(monthNumber, 'M').format('MMMM');
}

const arrowR = document.getElementById("arrowR");
const arrowL = document.getElementById("arrowL");


let currentYear = moment().year();
let currentMonth = moment().month()+1;
let emptyDaysElement = document.querySelectorAll('.day');



function nextmonth() {

    if (currentMonth > 11) {
        currentMonth -= 11;
        currentYear++;
        document.getElementById("month").innerHTML = toMonthName(currentMonth) + " " + currentYear;

    } else {
        currentMonth++;
        document.getElementById("month").innerHTML = toMonthName(currentMonth) + " " + currentYear;
    }
    let dayCode = 1;
    let counter = 0;
    emptyDaysElement.forEach(cell => {
        cell.removeAttribute("data-date");
        cell.classList.remove("violet");
        cell.innerHTML = "";

        let startingDayOfNextMonth = moment().year(currentYear).month(toMonthName(currentMonth)).startOf("month").day()
        let numberOfDaysInNextMonth = moment().year(parseInt(currentYear)).month(currentMonth).daysInMonth();

        if (counter >= startingDayOfNextMonth && dayCode <= numberOfDaysInNextMonth) {
            cell.classList.add("day");
            cell.innerHTML = dayCode;
            cell.setAttribute("data-date", toMonthName(currentMonth) + " " + dayCode);
            dayCode++;
        } else {
            cell.classList.add("hidden");
        }
        counter++;
    })

}


function previousmonth() {

    if (currentMonth < 2) {
        currentMonth += 11;
        currentYear--;
        document.getElementById("month").innerHTML = toMonthName(currentMonth) + " " + currentYear;

    } else {
        currentMonth--;
        document.getElementById("month").innerHTML = toMonthName(currentMonth) + " " + currentYear;
    }

    let dayCode = 1;
    let counter = 0;
    emptyDaysElement.forEach(cell => {
        cell.removeAttribute("data-date");
        cell.classList.remove("violet");
        cell.innerHTML = "";

        let startingDayOfNextMonth = moment().year(currentYear).month(toMonthName(currentMonth)).startOf("month").day()
        let numberOfDaysInNextMonth = moment().year(parseInt(currentYear)).month(currentMonth).daysInMonth();

        if (counter >= startingDayOfNextMonth && dayCode <= numberOfDaysInNextMonth) {
            cell.classList.add("day");
            cell.innerHTML = dayCode;
            cell.setAttribute("data-date", toMonthName(currentMonth) + " " + dayCode);
            dayCode++;
        } else {
            cell.classList.add("hidden");
        }
        counter++;
    })
}


arrowR.addEventListener("click", nextmonth);

arrowL.addEventListener("click", previousmonth);




//////////////////////////////////////////////////////////////////////////////////////////////////


let dateAptElement = document.getElementById("dateApt");
dateAptElement.min = moment().format("YYYY-MM-DD");
dateAptElement.value = moment().format("YYYY-MM-DD");

if (document.getElementById("userText").innerText === "Hi! Stranger") {
    document.getElementById("submitapt").style.display = "none";
}


