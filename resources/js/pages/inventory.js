import { BASE_URL } from "../config/constants";

export async function fetchInventoryDetails() {
    try {
        const code = document.querySelector("[data-window-component]")?.dataset
            .content;
        if (!code) {
            return;
        }
        const res = await fetch(`${BASE_URL}/products/${code}`);
        console.log(res);
    } catch (err) {
        console.log(err);
    }
}
