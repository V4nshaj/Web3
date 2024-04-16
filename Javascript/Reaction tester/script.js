var timeDisplay = document.getElementById('time');
        var objects = document.getElementById('objects');
        function displayRandomObject() {// Function to randomly display an object and calculate reaction time
            var startTime = performance.now();// Get the start time before hiding all objects
            if (Math.random() > 0.5) {
                objects.style.borderRadius = "50%";
            }
            else {
                objects.style.borderRadius = "0";
            }
            // Select a random object to display
            var indexToShow = Math.floor(Math.random() * objects.length);
            var randomsize = Math.floor(Math.random() * 400) + 100;
            var randomLeft = Math.floor(Math.random() * (window.innerWidth - randomsize)); // Random left position
            var randomTop = Math.floor(Math.random() * (window.innerHeight - randomsize)); // Random top position
            //calculates the maximum possible left position for the object such that it remains fully visible within the viewport.
            //subtracted from window.innerWidth to ensure that the entire width of the object (which is set to randomsize in your CSS) fits within the viewport
            objects.style.backgroundColor = getRandomColor();
            objects.style.height = randomsize + 'px';
            objects.style.width = randomsize + 'px';
            objects.style.left = randomLeft + 'px';
            objects.style.top = randomTop + 'px';
            objects.style.display = "block";

            objects.onclick = function () {
                var endTime = performance.now();
                var reactionTime = (endTime - startTime) / 1000; // Convert difference to seconds
                reactionTime = Math.round(reactionTime * 1000) / 1000; // Round to three decimal places
                timeDisplay.textContent = "Your Time: " + reactionTime + " s";
                displayRandomObject(); // Display a new random object after click
            }
        }
        // Call the function initially to display a random object
        displayRandomObject();
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }