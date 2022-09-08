<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relogio Digital com Efeitos Glowing</title>
    <link rel="stylesheet" href="<?php echo site_url('manager_assets/css/relogio.css') ?>">
</head>

<body>
    <div class="wrapper">
        <div class="display">
            <div id="time">

            </div>
            <div id="text">
                C.A.O.S
            </div>
        </div>
        <span></span>
        <span></span>


    </div>
    <script>
        setInterval(() => {
            const time = document.querySelector(".display #time");
            let date = new Date();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();
            let day_night = "AM";
            if (hours > 12) {
                day_night = "PM";
                hours = hours - 12;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (hours < 10) {
                hours = "0" + hours;
            }
            time.textContent = hours + ":" + minutes + ":" + seconds + " " + day_night;
        });
    </script>

</body>

</html>