/*window.addEventListener("DOMContentLoaded", function() {

    let $addItemForm = document.getElementById("addItem");
    console.log($addItemForm);
    
    $addItemForm.addEventListener("submit", function(event) {
        event.preventDefault();

        let productId = document.querySelector(`#product-id`).value;
        let productQuantity = document.querySelector(`#product-quantity`).value;
        console.log(productId);
        console.log(productQuantity);
        
        let $formData = new FormData();
        $formData.append("product-id", productId);
        $formData.append("product-quantity", productQuantity);

        const options = {
            method: "POST",
            body: $formData
        };
        console.log(options);
        
        fetch("/item", options)//remplacer par route
            .then(response => response.json())
            .then(data => {
                console.log(data);

            });

    });

})
*/