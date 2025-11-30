import { API_URL } from "../config/constants";

window.addEventListener("click", (e) => {
    const submitButton = e.target.closest("[data-submit-button]");

    if (submitButton) {
        const form = submitButton.closest("[data-update-user-form]");

        const payload = {
            userId: form.dataset.userId,
        };
        const formInputs = form.querySelectorAll("input");
        Array.from(formInputs).forEach((input) => {
            if (input.name) {
                payload[input.name] = input.value;
            }
        });

        updateUser(payload, form);
    }
});

const errorTemplate = (error) => `
  <div data-form-error class="flex items-center gap-2 mt-2 text-red-400">
      <svg class="fill-red-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
          <path
              d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z">
          </path>
          <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
      </svg>
      <p class="text-sm font-normal">
          ${error}
      </p>
  </div>
`;

async function updateUser(payload, form) {
    try {
        // Clear errors
        const inputs = form.querySelectorAll("input");
        const errorElements = form.querySelectorAll("[data-form-error]");
        if (inputs) {
            Array.from(inputs).forEach(
                (input) => (input.dataset.state = "none")
            );
        }
        if (errorElements)
            Array.from(errorElements).forEach((el) => el.remove());

        const csrfToken = document.querySelector(
            'meta[name="csrf-token"]'
        )?.content;
        const { userId, ...body } = payload;
        const res = await fetch(`${API_URL}/users/${userId}`, {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            method: "PUT",
            body: JSON.stringify(body),
        });
        const data = await res.json();

        // Handle error
        if (!res.ok) {
            const errors = data.errors;
            Object.entries(errors).forEach(([name, [message]]) => {
                const inputEl = Array.from(inputs).find((i) => i.name === name);
                const errorHTML = errorTemplate(message);
                inputEl.insertAdjacentHTML("afterend", errorHTML);
                inputEl.dataset.state = "error";
            });
            return;
        }

        // Refresh the page to fresh new data
        window.location.reload();
    } catch (err) {}
}
