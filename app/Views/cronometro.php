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
            <div id="time">
                

            </div>


                <input class="boton" type="button" id="start" value=" &#9658;" onclick="start();">
                <input class="boton" type="button" id="pause" value=" &#8718;" onclick="pause();">
                <input class="boton" type="button" id="reset" value=" &#8635;" onclick="reset();">

        </div>
        <span></span>
        <span></span>

    </div>
    <script>
        let hour = 0;
        let minute = 0;
        let second = 0;
        let millisecond = 0;
        let cron;
        document.form_main.start.onclick = () => start();
        document.form_main.pause.onclick = () => pause();
        document.form_main.reset.onclick = () => reset();

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

            hour = 0;
            minute = 0;
            second = 0;
            millisecond = 0;
            document.getElementById('hour').innerText = '00';
            document.getElementById('minute').innerText = '00';
            document.getElementById('second').innerText = '00';
            document.getElementById('millisecond').innerText = '000';
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
            return input >9 ? input : `0${input}`
        }
    </script>

</body>

</html>