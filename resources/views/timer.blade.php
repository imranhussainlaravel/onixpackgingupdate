<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexOnPackaging</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 10px;
        }

        .title {
            font-size: 3rem; /* Default size */
            font-weight: bold;
            margin-bottom: 10px;
            color: #f39c12;
            text-transform: uppercase;
            animation: subtleGlow 2s infinite alternate;
        }

        @keyframes subtleGlow {
            from {
                text-shadow: 0 0 5px #f39c12, 0 0 10px #f39c12;
            }
            to {
                text-shadow: 0 0 10px #f39c12, 0 0 15px #f39c12;
            }
        }

        .tagline {
            font-size: 1.2rem; /* Default size */
            margin-bottom: 20px;
            color: #fff;
            font-style: italic;
        }

        .timer {
            font-size: 2rem; /* Default size */
        }

        .days-highlight {
            color: #f39c12; /* Highlight color */
            font-weight: bold;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .title {
                font-size: 2.5rem; /* Adjust for tablets */
            }

            .tagline {
                font-size: 1rem; /* Adjust for tablets */
            }

            .timer {
                font-size: 1.8rem; /* Adjust for tablets */
            }
        }

        @media (max-width: 480px) {
            .title {
                font-size: 2rem; /* Adjust for mobile */
            }

            .tagline {
                font-size: 0.9rem; /* Adjust for mobile */
            }

            .timer {
                font-size: 1.5rem; /* Adjust for mobile */
            }
        }
    </style>
</head>
<body>
    <div class="title">NexOnPackaging</div>
    <div class="tagline">Custom Packaging Solutions for Every Need</div>

    <?php
        $randomDays = rand(3, 5);
        $randomHours = rand(0, 23);
        $randomMinutes = rand(0, 59);
        $randomSeconds = rand(0, 59);

        $endTime = time() 
            + ($randomDays * 24 * 60 * 60) 
            + ($randomHours * 60 * 60) 
            + ($randomMinutes * 60) 
            + $randomSeconds;

        $endTimeInMilliseconds = $endTime * 1000;
    ?>

    <div class="timer" id="timer">Loading...</div>

    <script>
        const endTime = <?php echo $endTimeInMilliseconds; ?>;

        function updateTimer() {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance <= 0) {
                document.getElementById('timer').innerText = "Time is up!";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('timer').innerHTML = 
                `<span class="days-highlight">${days}d</span> ${hours}h ${minutes}m ${seconds}s`;
        }

        setInterval(updateTimer, 1000);
        updateTimer();
    </script>
</body>
</html>
