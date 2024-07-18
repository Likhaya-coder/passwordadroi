document.addEventListener("DOMContentLoaded", function() {
    const advertisement = document.getElementById("advertisement");
    const adImage = document.getElementById("adImage");
    const adPromotionBadge = document.querySelector(".ad-promotion-badge");
    const adTitle = document.querySelector(".ad-title");
    const adPrice = document.querySelector(".ad-price");
    const interestForm = document.getElementById("interestForm");
    const resetForm = document.getElementById("reset-password");
    const dateInput = document.getElementById("dateInput");
    const buyDateInput = document.getElementById("buyDate");
    const skipButton = document.createElement('button');

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

    skipButton.innerText = 'Skip';
    skipButton.classList.add('bg-red-500', 'hover:bg-red-600', 'text-white', 'font-semibold', 'py-2', 'px-4', 'rounded-lg', 'mt-4');
    skipButton.addEventListener('click', function() {
        advertisement.style.display = "none";
        interestForm.style.display = "block";
    });
    advertisement.appendChild(skipButton);

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
                resetForm.style.display = "block";
                window.location.href = '/forgot-password';
            } else {
                window.location.href = '/forgot-password';
            }
        };

        xhr.send(formData);
    });

    showAd();
});

function showPopup(message) {
    const popup = document.createElement("div");
    popup.classList.add("popup");
    popup.innerText = message;

    const overlay = document.createElement("div");
    overlay.classList.add("popup-overlay");

    overlay.appendChild(popup);
    document.body.appendChild(overlay);

    popup.addEventListener("click", function() {
        document.body.removeChild(overlay);
    });

    setTimeout(function() {
        if (document.body.contains(overlay)) {
            document.body.removeChild(overlay);
        }
    }, 3000);
}
