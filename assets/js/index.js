window.addEventListener("DOMContentLoaded", function() {

    let $addItemForm = document.getElementById("addItem");
    $addItemForm.addEventListener("submit", function(event) {
        event.preventDefault();

        let productId = document.querySelector(`#product-id`).value;
        let productQuantity = document.querySelector(`#product-quantity`).value;

        let $formData = new FormData();
        $formData.append("product-id", productId);
        $formData.append("product-quantity", productQuantity);

        const options = {
            method: "POST",
            body: $formData
        };

        fetch("/addItem", options)
            .then(response => response.json())
            .then(data => {
                console.log(data);

            });

    });

})
