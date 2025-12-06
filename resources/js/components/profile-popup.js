const popup = document.querySelector("[data-profile-popup-component]");
const triggerPopUp = popup.querySelector("[data-profile-popup-trigger]");
const contentPopUp = popup.querySelector("[data-profile-popup-content]");

document.addEventListener("click", (e) => {
    const clickedInside = popup.contains(e.target);

    // If clicked outside → close popup
    if (!clickedInside) {
        popup.dataset.state = "closed";
        return;
    }

    // Clicked the trigger → toggle popup
    if (e.target.closest("[data-profile-popup-trigger]")) {
        popup.dataset.state =
            popup.dataset.state === "open" ? "closed" : "open";
    }
});
