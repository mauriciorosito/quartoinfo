$(document).ready(function() {
    $("#type").change(function() {
        if (this.value == "category") {
            $("#category_type").show();
            $("#link_type").hide();
            $("#page").hide();

            $('#page option[value=0]').attr('selected', 'selected');
            $("#url").val("");
        } else if (this.value == "link") {
            $("#category_type").hide();
            $("#page").hide();
            $("#link_type").show();

            $('#category option[value=0]').attr('selected', 'selected');
            $('#page option[value=0]').attr('selected', 'selected');
        } else if (this.value == "page") {
            $("#category_type").hide();
            $("#link_type").hide();
            $("#page").show();

            $('#category option[value=0]').attr('selected', 'selected');
            $("#url").val("");
        }
        else {
            $("#category_type").hide();
            $("#link_type").hide();
            $("#page").hide();

            $('#page option[value=0]').attr('selected', 'selected');
            $('#category option[value=0]').attr('selected', 'selected');
            $("#url").val("");
        }
    });
});