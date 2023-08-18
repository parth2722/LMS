$(document).ready(function () {
    $('#product-form').on('beforeSubmit', function (e) {
        e.preventDefault();
        var form = $(this);
        var formData = new FormData(form[0]);

        $.ajax({
            url: '/path/to/create-product', // Replace with your actual URL
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                response = $.parseJSON(response);
                if (response.success) {
                    alert(response.message);
                    // Optionally, reset the form or redirect to a different page
                    // form.trigger('reset');
                    // window.location.href = '/path/to/success-page';
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('An error occurred while creating the product.');
            }
        });
    });
});
