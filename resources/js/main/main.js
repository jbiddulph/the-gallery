$(function() {

    //Remove Modal Trigger
    $('[data-js=open-remove]').on('click', function(e) {
        console.log('Clicked');
        $("#removeModal").modal();
        //Opening the Modal
    });

    $('[data-js-type=modal-submit]').on('click', function(e) {
        $.ajax({
            url: "/deleteCategory",
            method: "POST",
            dataType: "json",
            data: { id: $("[data-js=open-remove]").find('span').attr('id') },
            success: function(result) {
                console.log("Success : ", result);
                if (result.Success) {
                    //Reload the Page
                    document.location.reload(true);
                } else if (result.Error) {
                    console.log('Error From the Sever ', result.Error);
                }
            },
            error: function(error) {
                console.log("AJAX ERROR: ", error);
            }
        });

    });

    $('[data-js=open-edit]').on('click', function(e) {

        console.log('Clicked');
        $("#editModal").modal();
        //Opening the Modal

    });


    $("#editForm").submit(function(e) {

        $.ajax({
            url: "/editCategory",
            method: "POST",
            dataType: "json",
            data: {
                id: $("[data-js=open-remove]").find("span").attr("id"),
                name: $('[data-js-type=editedText]').val()
            },
            success: function(result) {
                console.log("Success : ", result);
                if (result.Success) {
                    //Reload the Page
                    document.location.reload(true);
                } else if (result.Error) {
                    console.log('Error From the Sever ', result.Error);
                }
            },
            error: function(error) {
                console.log('AJAX ERROR: ', error);
            }
        });

        //Prevent Form Submitting
        e.preventDefault();
    });

    //TODO: Add Handlers for the Edit
});
