$(document).ready(function () {
    //-----------------------------------------------------
    // Defining a variable
    //-----------------------------------------------------

    var token = $("input[name='_token']").val(),
        datatable_url = window.location.origin + "/datatable/traductionBR.json",
        route_datatable = $("#route_datatable").val();

    //-----------------------------------------------------
    // Instance of plugins
    //-----------------------------------------------------

    // Inicializa DataTable
    $("#ajax-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: route_datatable,
            type: "POST",
            beforeSend: function (request) {
                return request.setRequestHeader("X-CSRF-Token", token);
            },
        },
        columns: [
            {
                data: "date_reserved",
            },
            {
                data: "status",
            },
            {
                data: "user",
                name: "user.name",
            },
            {
                data: "flight",
                name: "flight.date",
            },
            {
                data: "action",
                orderable: false,
                searchable: false,
            },
        ],
        language: {
            url: datatable_url,
        },
    });

    //-----------------------------------------------------
    // Defining a function
    //-----------------------------------------------------

    /*
    /* Desabilita data
     */
    function disableDate(e) {
        e.preventDefault();
        return false;
    }

    //-----------------------------------------------------
    // Defining a call function
    //-----------------------------------------------------

    $(document).delegate('[type="date"]', "keydown", disableDate);
});
