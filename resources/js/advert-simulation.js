document.addEventListener("DOMContentLoaded", function() {
    const advertisement = document.getElementById("advertisement");
    const adVideo = document.getElementById("adVideo");
    const interestForm = document.getElementById("interestForm");
    const resetForm = document.getElementById("reset-password");
    const dateInput = document.getElementById("dateInput");
    const buyDateInput = document.getElementById("buyDate");
    const skipButton = document.createElement('button');

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

    function playVideo() {
        const randomVideoUrl = getRandomVideoUrl();
        adVideo.src = randomVideoUrl;
        adVideo.play();
    }

    adVideo.addEventListener("ended", function() {
        advertisement.style.display = "none";
        interestForm.style.display = "block";
    });

    document.querySelectorAll('input[name="interest"]').forEach(radio => {
        radio.addEventListener("change", function() {
            if (this.value === "yes") {
                dateInput.style.display = "block";
            } else {
                dateInput.style.display = "none";
            }
        });
    });

    skipButton.innerText = 'Skip';
    skipButton.classList.add('bg-red-500', 'hover:bg-red-600', 'text-white', 'font-semibold', 'py-2', 'px-4', 'rounded-lg', 'mt-4');
    skipButton.addEventListener('click', function() {
        adVideo.pause();
        advertisement.style.display = "none";
        interestForm.style.display = "block";
    });
    advertisement.appendChild(skipButton);

    interestForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const selectedInterest = document.querySelector('input[name="interest"]:checked');
        if (!selectedInterest) {
            alert("Please select if you are interested in buying this product.");
            return;
        }

        if (selectedInterest.value === "yes") {
            const selectedDate = new Date(buyDateInput.value);
            const currentDate = new Date();
            currentDate.setHours(0, 0, 0, 0);

            if (!buyDateInput.value || selectedDate < currentDate) {
                alert("Please select a valid date that is today or in the future.");
                return;
            }
        }

        const formData = new FormData(interestForm);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", interestForm.action, true);
        xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

        xhr.onload = function() {
            if (xhr.status === 200) {
                interestForm.style.display = "none";
                resetForm.style.display = "block";
                // Optionally, redirect here if necessary
                window.location.href = '/forgot-password';
            } else {
                window.location.href = '/forgot-password';
            }
        };

        xhr.send(formData);
    });

    playVideo();
});
