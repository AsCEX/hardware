
function clock(){
    var time = new Date()
    var hr = time.getHours()
    var min = time.getMinutes()
    var sec = time.getSeconds()
    var ampm = " PM "
    if (hr < 12){
        ampm = " AM "
    }
    if (hr > 12){
        hr -= 12
    }
    if (hr < 10){
        if(hr == 0)
            hr = 12;
        hr = " " + hr
    }
    if (min < 10){
        min = "0" + min
    }
    if (sec < 10){
        sec = "0" + sec
    }



    var date = new Date()
    var year = date.getYear()
    if(year < 1000){
        year += 1900
    }
    var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")


    //document.clockForm.clockButton.value = hr + ":" + min + ":" + sec + ampm
    var strDate = monthArray[date.getMonth()] + " " + date.getDate() + ", " + year;
    document.getElementById('system-clock').innerHTML = strDate + " " + hr + ":" + min + ":" + sec + ampm
    setTimeout("clock()", 1000)
}