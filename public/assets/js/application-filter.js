$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $(document).on("change", "#school", function (e) {
        e.preventDefault();
        var school_id = $(this).val();

        $.ajax({
            url: `/dashboard/academics/${school_id}/load-programs`,
            method: "GET",
            data: {},

            success: function (data) {
                let option = "<option value=''>Choose program</option>";

                for (var i = 0; i < data.data.length; i++) {
                    option +=
                        '<option value="' +
                        data.data[i].slug +
                        '">' +
                        data.data[i].name +
                        " - " +
                        data.data[i].tag +
                        " </option>";
                }
                $("#program_id").html("");
                $("#program_id").html(option);
            },
            error: function (data) {},
        });
    });

    $(document).on("change", "#program_id", function (e) {
        e.preventDefault();
        var program_slug = $(this).val();

        $.ajax({
            url: `/dashboard/academics/programs/${program_slug}/admission-session`,
            method: "GET",
            data: {},

            success: function (data) {
                let option = "<option value=''>Choose session</option>";

                for (var i = 0; i < data.data.length; i++) {
                    let start_date = new Date(
                        data.data[i].start_date
                    ).toLocaleDateString("en-US", {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    });
                    let end_date = new Date(
                        data.data[i].end_date
                    ).toLocaleDateString("en-US", {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    });
                    option +=
                        '<option value="' +
                        data.data[i].slug +
                        '">' +
                        start_date +
                        " - " +
                        end_date +
                        " </option>";
                }
                $("#session_id").html("");
                $("#session_id").html(option);
            },
            error: function (data) {},
        });
    });
});
