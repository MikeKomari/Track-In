const allDropdowns = document.querySelectorAll("[data-dropdown-component]");
function closeAll() {
    allDropdowns.forEach((dropdown) => {
        dropdown.dataset.state = "closed";
    });
}
document.addEventListener("click", (e) => {
    const target = e.target.closest("[data-dropdown-component]");
    if (!target) {
        return closeAll();
    }

    const content = e.target.closest("[data-dropdown-content]");
    const trigger = e.target.closest("[data-dropdown-trigger]");

    if (trigger && target.dataset.state === "open") {
        return closeAll();
    }

    // Handles update
    if (content) {
        const item = e.target.closest("[data-dropdown-item]");

        // Key used to store the state of the dropdown (on the url). This string can be customized via the key prop on the component
        const urlKey = item.dataset.dropdownKey;

        // Unselect via query params if we're selecting the same element
        const searchParams = new URLSearchParams(window.location.search);
        searchParams.delete("page");

        // Active item data is stored in the container
        if (item.dataset.dropdownId === searchParams.get(urlKey)) {
            searchParams.delete(urlKey);
        } else {
            searchParams.set(urlKey, item.dataset.dropdownId);
        }

        window.location.search = searchParams;
    }

    target.dataset.state = "open";
});
