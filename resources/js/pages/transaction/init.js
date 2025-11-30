import { API_URL } from "../../config/constants";
import { QueryClient } from "../../query-client";
import { API } from "../../utils/api";

async function renderTransactionDetails() {
    const container = document.querySelector(
        "[data-transaction-detail-container]"
    );
    const windowComponent = document.querySelector("[data-window-component]");
    const id = windowComponent?.dataset.content;
    if (!id || !container) return;

    container.innerHTML = "";
    container.dataset.isLoading = true;
    try {
        // Fetch partial page
        const data = await API.get(`/transactions/${id}`);

        // Append html string
        container.innerHTML = data.data;
    } catch (err) {
        console.log(err);
    }
    container.dataset.isLoading = false;
}

QueryClient.subscribe("transaction", renderTransactionDetails);
