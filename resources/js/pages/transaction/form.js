import { Toast } from "../../components/toast";

window.addEventListener(
    "click",
    (e) => {
        const form = e.target.closest("[transaction-form-submit]");
        const submitBtn = e.target.closest("[data-submit]");
        if (form && submitBtn) {
            handleForm(e);
        }
    },
    true
);

const handleForm = (e) => {
    e.preventDefault();
    const form = e.target.closest("[transaction-form-submit]");
    const products = form.querySelectorAll("input.quantity-input");
    const formHasItems = Array.from(products).some((p) => {
        return +p.value > 0;
    });

    if (formHasItems) {
        form.submit();
    } else {
        Toast.error(
            "Invalid Create Request",
            "Transaksi harus memiliki minimal 1 barang"
        );
    }
};
