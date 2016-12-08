$(function () {
    var data = {};
    var modal = "#modal-fontawesome";
    var btn_add_icon = ".btn-add-icon-fontawesome";
    var btn_open_modal = ".btn-select-font-awesome";
    var field_fontawesome = ".icon-fontawesome";
    var input_field = ".icon-fontawesome";
    var label_add_icon = "Selecionar ícone";
    var label_change_icon = "Trocar ícone:";
    var template_modal = new EJS({url: url + "application/apps/projects/plugins_input/fontawesome/assets/ejs/modal.ejs"}).render();

    $("body").append(template_modal);

    $(btn_add_icon).click(function () {
        var icon = $(this).attr("data-icon");
        $(input_field).eq(data.index).val(icon);
        $(modal).modal('hide');
        change_label(icon);
    });

    $(field_fontawesome).each(function () {
        var val = $(this).val();
        var btn = $("<button>").addClass('btn btn-default btn-group-justified btn-select-font-awesome').html(label_add_icon);
        if (val != "") {
            btn.html(label_change_icon + " <span class='icon-selected fa " + val + "'></span>");
        }

        $(this).attr("type", "hidden");
        $(this).parent().prepend(btn);
    });

    $(".content-field").on("click", btn_open_modal, function (e) {
        e.preventDefault();
        data.index = $(btn_open_modal).index(this);
        $(modal).modal('toggle');
        return false;
    });

    var change_label = function (icon) {
        var label = label_add_icon;
        if (icon != "") {
            label = label_change_icon + " <span class='icon-selected fa " + icon + "'></span>";
        }
        $(btn_open_modal).eq(data.index).html(label);
    }
});
