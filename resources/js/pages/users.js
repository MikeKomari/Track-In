import { API_URL } from "../config/constants";
import { QueryClient } from "../query-client";

async function renderUserDetails() {
    const container = document.querySelector("[data-users-detail-container]");
    const windowComponent = document.querySelector("[data-window-component]");
    const id = windowComponent?.dataset.content || 1;
    if (!id || !container) return;

    container.innerHTML = "";
    container.dataset.isLoading = true;
    try {
        // Fetch partial page
        const res = await fetch(`${API_URL}/users/${id}`);
        const json = await res.json();
        if (!res.ok) throw new Error("Request did not succeed");

        // Append html string
        const data = json.data;
        container.innerHTML = data;
    } catch (err) {
        console.log(err);
    }
    container.dataset.isLoading = false;
}

QueryClient.subscribe("users", renderUserDetails);
