const pelangganAlert = document.getElementById("alert-pelanggan");
const btnPelangganAlert = document.getElementById("btn-alert-pelanggan");

btnPelangganAlert.addEventListener("click", function () {
    pelangganAlert.classList.add("hidden");
});

// const deleteButton = document.getElementById("delete-button");
// const confirmDeleteButton = document.getElementById("btn-confirm-delete");
// let form = null;

// deleteButton.addEventListener("click", function (event) {
//     event.preventDefault();
//     form.deleteButton.closest("form");
// });
// confirmDeleteButton.addEventListener("click", function () {
//     if (form) {
//         form.submit();
//     }
// });
