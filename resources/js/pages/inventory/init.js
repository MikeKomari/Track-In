import { API_URL } from "../../config/constants";
import { QueryClient } from "../../query-client";
import { API } from "../../utils/api";

async function renderInventoryDetails() {
    const container = document.querySelector("[data-product-detail-container]");
    const windowComponent = document.querySelector("[data-window-component]");
    const code = windowComponent?.dataset.content || "PRD001";
    if (!code || !container) return;

    container.innerHTML = "";
    container.dataset.isLoading = true;
    try {
        // Fetch partial page
        const data = await API.get(`/products/${id}`);

        // Append html string
        container.innerHTML = data.data;
    } catch (err) {
        console.log(err);
    }
    container.dataset.isLoading = false;
}

QueryClient.subscribe("inventory", renderInventoryDetails);
