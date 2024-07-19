document.addEventListener("DOMContentLoaded", function() {
    const advertisement = document.querySelector("#advertisement");
    const adImage = document.querySelector("#adImage");
    const adPromotionBadge = document.querySelector(".ad-promotion-badge");
    const adTitle = document.querySelector(".ad-title");
    const adPrice = document.querySelector(".ad-price");
    const interestForm = document.querySelector("#interestForm");
    const dateInput = document.querySelector("#dateInput");
    const buyDateInput = document.querySelector("#buyDate");
    const skipButton = document.querySelector('.skip-button');

    const ads = [
        {
            imageUrl: "/images/Coral Fleece - Fitted Electric Blanket.jpg",
            promotion: "20%",
            title: "Coral Fleece Fitted Electric Blanket",
            price: "R 1,300"
        },
        {
            imageUrl: "/images/Marco Tripod Stool - Black.jpg",
            promotion: "48%",
            title: "Marco Tripod Stool - Black",
            price: "R 109"
        },
        {
            imageUrl: "/images/Bolt Cutter 750mm.jpg",
            promotion: "16%",
            title: "Bolt Cutter 750mm",
            price: "R 499"
        },
        {
            imageUrl: "/images/House of Hamilton - Single Continental Pillow.jpeg",
            promotion: "32%",
            title: "House of Hamilton - Single Continental Pillow",
            price: "R 229"
        }
    ];

    function getRandomAd() {
        const randomIndex = Math.floor(Math.random() * ads.length);
        return ads[randomIndex];
    }

    function showAd() {
        const ad = getRandomAd();
        adImage.src = ad.imageUrl;
        adPromotionBadge.textContent = ad.promotion + " OFF";
        adTitle.textContent = ad.title;
        adPrice.textContent = ad.price;

        document.getElementById('productTitle').value = ad.title;
        document.getElementById('price').value = ad.price;
        document.getElementById('promotion').value = ad.promotion;
    }

    document.querySelectorAll('input[name="interest"]').forEach(radio => {
        radio.addEventListener("change", function() {
            if (this.value === "yes") {
                dateInput.style.display = "block";
            } else {
                dateInput.style.display = "none";
            }
        });
    });

    skipButton.addEventListener('click', function() {
        advertisement.style.display = "none";
        interestForm.style.display = "block";
    });

    interestForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const selectedInterest = document.querySelector('input[name="interest"]:checked');
        if (!selectedInterest) {
            showPopup("Please select if you are interested in buying this product.");
            return;
        }

        if (selectedInterest.value === "yes") {
            const selectedDate = new Date(buyDateInput.value);
            const currentDate = new Date();
            currentDate.setHours(0, 0, 0, 0);

            if (!buyDateInput.value || selectedDate < currentDate) {
                showPopup("Please select a valid date that is today or in the future.");
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
                window.location.href = '/forgot-password';
            } else {
                window.location.href = '/forgot-password';
            }
        };

        xhr.send(formData);
    });

    function showPopup(message) {
        const popupContainer = document.getElementById("popupContainer");
        const popupMessage = document.getElementById("popupMessage");

        popupMessage.textContent = message;
        popupContainer.style.display = "flex";

        setTimeout(function() {
            popupContainer.style.display = "none";
        }, 3000);
    }

    showAd();
});
