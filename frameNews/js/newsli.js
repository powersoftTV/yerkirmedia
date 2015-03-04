function change_category(value) {
    jQuery("#divContentNewsli").fadeOut("normal");
    jQuery("#comboNews").attr("disabled", "disabled");

    jQuery("#imgLoading").show();

    jQuery.ajax({
        type: "POST",
        url: "newsli_content.php",
		data: "rss_url=" + value,
		success: function (html) {
            jQuery("#divContentNewsli").fadeIn("normal");
            jQuery("#divContentNewsli").html(html);
            jQuery("#comboNews").removeAttr("disabled");
            jQuery("#imgLoading").hide();
        }
    });

}