document.addEventListener("DOMContentLoaded", function() {
    const advertisement = document.getElementById("advertisement");
    const adVideo = document.getElementById("adVideo");
    const interestForm = document.getElementById("interestForm");
    const resetForm = document.getElementById("reset-password");
    const dateInput = document.getElementById("dateInput");
    const buyDateInput = document.getElementById("buyDate");
    const resetPasswordForm = document.getElementById("resetPasswordForm");
    const skipButton = document.getElementById("skipButton");

    const videoUrls = [
        "/videos/adv1.mp4",
        "/videos/adv2.mp4",
        "/videos/adv3.mp4",
        "/videos/adv4.mp4"
    ];

    function getRandomVideoUrl() {
        const randomIndex = Math.floor(Math.random() * videoUrls.length);
        return videoUrls[randomIndex];
    }

    // Function to play the video
    function playVideo() {
        const randomVideoUrl = getRandomVideoUrl();
        adVideo.src = randomVideoUrl;
        adVideo.play();
    }

    // Event listener for when the video ends
    adVideo.addEventListener("ended", function() {
        advertisement.style.display = "none";
        interestForm.style.display = "block";
    });

    // Event listener for the skip button
    skipButton.addEventListener("click", function() {
        advertisement.style.display = "none";
        interestForm.style.display = "none"; // Hide interest form if visible
        resetForm.style.display = "block"; // Display reset password form
    });

    // Event listener for the interest form submission
    interestForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        const selectedOption = document.querySelector('input[name="interest"]:checked');
        if (selectedOption) {
            if (selectedOption.value === "yes") {
                const selectedDate = buyDateInput.value;
                if (!selectedDate) {
                    alert("Please select a date.");
                    return;
                }
                const currentDate = new Date();
                const inputDate = new Date(selectedDate);
                if (inputDate < currentDate) {
                    alert("Please choose a date that is current or in the future.");
                    return;
                }
            }
            interestForm.style.display = "none";
            resetForm.style.display = "block";
        } else {
            alert("Please select an option.");
        }
    });

    // Event listener for radio button change in the interest form
    document.querySelectorAll('input[name="interest"]').forEach(radio => {
        radio.addEventListener("change", function() {
            if (this.value === "yes") {
                dateInput.style.display = "block";
            } else {
                dateInput.style.display = "none";
            }
        });
    });

    // Call the function to play video on page load
    playVideo();
});
