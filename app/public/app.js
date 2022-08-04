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

let link = new  URL(window.location.href);
let dateFromUrl = link.searchParams.get('date');
if (dateFromUrl!==null){
    dateArray = dateFromUrl.split('-');
    document.getElementById("dissappear").innerText = "Schedule for " + '\n' + toMonthName(dateArray[1]-1) +" "+dateArray[2]+" "+ dateArray[0];
}

let newDate;
daysEls.forEach(day => {
    day.addEventListener("click",function (){
        let date = day.dataset.date;
        document.getElementById("dissappear").innerText = "Schedule for " + '\n' + date + " " + currentYear;
        let x = document.getElementById("dissappear").innerText.slice(13, 27);
        x = x.split(" ");
        newDate = x[2] + "-" + moment(x[0],"MMMM").format("MM") + "-" + moment(x[1],"D").format("DD");
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

        let startingDayOfNextMonth = moment().year(currentYear).month(toMonthName(currentMonth)).startOf("month").day()
        let numberOfDaysInNextMonth = moment().year(currentYear).month(currentMonth).daysInMonth();

        if (counter >= startingDayOfNextMonth && dayCode <= numberOfDaysInNextMonth) {
            cell.classList.add("day");
            cell.innerHTML = dayCode;
            cell.setAttribute("data-date", toMonthName(currentMonth) + " " + dayCode);
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
    const date = new Date();
    date.setMonth(monthNumber);

    return date.toLocaleString([], {
        month: 'long',
    });
}

const arrowR = document.getElementById("arrowR");
const arrowL = document.getElementById("arrowL");


let currentYear = moment().year();
let currentMonth = moment().month();
let emptyDaysElement = document.querySelectorAll('.day')

document.getElementById("month").innerHTML = toMonthName(currentMonth) + " " + currentYear;


function nextmonth() {

    if (currentMonth > 10) {
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

    if (currentMonth < 1) {
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


