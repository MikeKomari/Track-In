import { API_URL } from "../../config/constants";
import { QueryClient } from "../../query-client";
import { API } from "../../utils/api";

async function renderUserDetails() {
    const container = document.querySelector("[data-users-detail-container]");
    const windowComponent = document.querySelector("[data-window-component]");
    const id = windowComponent?.dataset.content || 1;
    if (!id || !container) return;

    container.innerHTML = "";
    container.dataset.isLoading = true;
    try {
        const data = await API.get(`/users/${id}`);
        container.innerHTML = data.data;
    } catch (err) {
        console.log(err);
    }
    container.dataset.isLoading = false;
}

QueryClient.subscribe("users", renderUserDetails);
