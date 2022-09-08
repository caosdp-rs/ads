<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronometro</title>
    <link rel="stylesheet" href="<?php echo site_url('manager_assets/css/relogio.css') ?>">
</head>

<body>
    <div class="wrapper">
        <div class="display">
            <div id="timeRelogio">
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="display">
            <div id="time">
            </div>
        </div>
        <span></span>
        <span></span>

    </div>
    <div id="botoes">
        <input class="boton" type="button" id="start" value="&#9658;" onclick="start();">
        <input class="boton" type="button" id="pause" value="&#8718;" onclick="pause();">
        <input class="boton" type="button" id="reset" value="&#8635;" onclick="reset();">
    </div>

    <script>
         setInterval(() => {
            const timeRelogio = document.querySelector(".display #timeRelogio");
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
            timeRelogio.textContent = hours + ":" + minutes + ":" + seconds + " " + day_night;
        });
        let hour = 0;
        let minute = 0;
        let second = 0;
        let millisecond = 0;
        let cron;
        function start() {
            pause();
            cron = setInterval(() => {
                timer();
            }, 10);
        }

        function pause() {
            clearInterval(cron);
        }

        function reset() {
            const time = document.querySelector(".display #time");
            hour = 0;
            minute = 0;
            second = 0;
            millisecond = 0;
            document.getElementById('hour').innerText = '00';
            document.getElementById('minute').innerText = '00';
            document.getElementById('second').innerText = '00';
            document.getElementById('millisecond').innerText = '000';
            time.textContent = returnData('00') + ":" + returnData('00') + ":" + returnData('00');
            start();
        }
       
        function timer() {
            const time = document.querySelector(".display #time");
            if ((millisecond += 10) == 1000) {
                millisecond = 0;
                second++;
            }
            if (second == 60) {
                second = 0;
                minute++;
            }
            if (minute == 60) {
                minute = 0;
                hour++;
            }
            time.textContent = returnData(hour) + ":" + returnData(minute) + ":" + returnData(second);

            
        }

        function returnData(input) {
            return input > 9 ? input : `0${input}`
        }
    </script>

</body>

</html>