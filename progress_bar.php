<!DOCTYPE html>
<html>

<head>
    <title>Progress Bar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .progress {
            height: 30px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .progress-bar {
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group" style="width:200px;">
                    <span class="input-group-text">Seconds</span>
                    <input type="number" id="duration" class="form-control" style="text-align:center;" min="1" max="30" value="1" oninput="updateProgress(this.value)">
                </div>
            </div>
        </div>

        <div class="progress mt-4">
            <div id="progressBar" class="progress-bar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0</div>
        </div>
    </div>

    <script>
        var durationInput = document.getElementById('duration');
        var progressBar = document.getElementById('progressBar');
        var interval;

        function updateProgress(duration) {
            if (duration > 30) {
                duration = 30;
                durationInput.value = duration;
            }

            clearInterval(interval);
            var width = 0;
            progressBar.style.width = width + "%";
            progressBar.textContent = "I will be full in " + duration + " seconds";
            var step = duration * 10;
            interval = setInterval(function() {
                width += 1;
                progressBar.style.width = width + "%";
                var remainingSeconds = Math.ceil((100 - width) * duration / 100);
                progressBar.textContent = "I will be full in " + (remainingSeconds > 0 ? remainingSeconds : 0) + " seconds";
                if (width >= 100) clearInterval(interval);
            }, step);
        }
    </script>

</body>

</html>
