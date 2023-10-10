const updateTime = () => {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var secunds = currentTime.getSeconds();

    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    secunds = (secunds < 10 ? "0" : "") + secunds;

    var timeString = hours + ":" + minutes + ":" + secunds;

    document.getElementById("time").innerHTML = timeString;
}

setInterval(updateTime, 1000);
