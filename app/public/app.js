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

const daysEls = document.querySelectorAll(".day");
daysEls.forEach(day => {
    day.addEventListener("click", event => {
        let date = event.target.dataset.date;

        document.getElementById("dissappear").innerText = "Schedule for " + '\n' + date + " " + currentYear;
        //const dsp = document.getElementById("dissappear").innerHTML = "";
    });

})


function thisMonth()
{
    let dayCode = 1;
    let counter = 0;
    emptyDaysElement.forEach(cell => {
        cell.removeAttribute("data-date");
        cell.innerHTML = "";

        let startingDayOfNextMonth = moment().year(currentYear).month(toMonthName(currentMonth)).startOf("month").day()
        let numberOfDaysInNextMonth = moment().year(currentYear).month(currentMonth).daysInMonth();

        if(counter >= startingDayOfNextMonth && dayCode <= numberOfDaysInNextMonth)
        {
            cell.classList.add("day");
            cell.innerHTML = dayCode;
             cell.setAttribute("data-date", toMonthName(currentMonth )+" "+dayCode);
            dayCode++;
        } else {
            //cell.classList.add("hidden");
        }
        counter++;
    })
    initialized=1;
}



let initialized=0;


function toMonthName(monthNumber) {
    const date = new Date();
    date.setMonth(monthNumber );

    return date.toLocaleString([], {
        month: 'long',
    });
}

const arrowR = document.getElementById("arrowR");
const arrowL = document.getElementById("arrowL");


let currentYear=moment().year();
let currentMonth=moment().month();
let emptyDaysElement=document.querySelectorAll('.day')

document.getElementById("month").innerHTML = toMonthName(currentMonth)+" "+currentYear;


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

        if(counter >= startingDayOfNextMonth && dayCode <= numberOfDaysInNextMonth)
        {
            cell.classList.add("day");
            cell.innerHTML = dayCode;
            cell.setAttribute("data-date", toMonthName(currentMonth )+" "+dayCode);
            dayCode++;
        } else {
            cell.classList.add("hidden");
        }
        counter++;
    })

}



function previousmonth() {

    if (currentMonth <1) {
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

        if(counter >= startingDayOfNextMonth && dayCode <= numberOfDaysInNextMonth)
        {
            cell.classList.add("day");
            cell.innerHTML = dayCode;
            cell.setAttribute("data-date", toMonthName(currentMonth )+" "+dayCode);
            dayCode++;
        } else {
            cell.classList.add("hidden");
        }
        counter++;
    })
}


arrowR.addEventListener("click", nextmonth);

arrowL.addEventListener("click", previousmonth);


//console.log(moment().format('YYYY-MM-DD'));

