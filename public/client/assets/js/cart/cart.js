$(function () {
    const TIME_TO_UPDATE = 1000;

    $(document).on("click", ".btn-update-quantity", function (e) {
        e.preventDefault();

        let url = $(this).data("action");
        let id = $(this).data("id");
        let productQuantity = $(`#productQuantityInput-${id}`).val();

        let data = {
            product_quantity: productQuantity,
            _token: "{{ csrf_token() }}", // Thêm CSRF token vào dữ liệu gửi đi
        };

        $.post(url, data, function (response) {
            let cartProductId = response.product_cart_id;
            if (response.remove_product) {
                $(`#row-${cartProductId}`).remove();
            }
        }).fail(function () {
            alert("Đã xảy ra lỗi khi cập nhật số lượng sản phẩm!");
        });
    });
});
