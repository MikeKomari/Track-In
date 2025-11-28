import { fetchInventoryDetails } from "../pages/inventory";

const subscriberList = {
    inventory: [fetchInventoryDetails],
};

window.addEventListener("click", (e) => {
    const windowContainer = document.querySelector("[data-window-component]");
    const trigger = e.target.closest("[data-window-trigger]");

    if (!windowContainer) return;

    // Handle Trigger clicks
    if (trigger) {
        windowContainer.dataset.windowComponentState = "open";
        const content = trigger.dataset.windowTrigger;
        windowContainer.dataset.content = content;

        // publish data to subcribers
        // publisher name is stored in window component
        const publisher = windowContainer.dataset.windowComponent;
        subscriberList[publisher]?.forEach((subscriber) => {
            subscriber();
        });
        return;
    }

    // Handle window container clicks
    const content = e.target.closest("[data-window-content]");

    // If content exist that means the user is clicking inside the content, so we should not close the modal
    if (!content) {
        windowContainer.dataset.windowComponentState = "closed";
        windowContainer.dataset.content = "";
    }
});
