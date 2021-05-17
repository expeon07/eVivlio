$(".search-box").keypress(function (e) {
    if (e.which == 13) {
        $("#search-button").click();
    }
});

$("#search-button").click(function() {

    var keyword = $(".search-box").val();

    $.ajax({
        type: "GET",
        url: "../src/Search/search_get.php",
        data: { "keyword": keyword },
        success: function(response) {
            // TODO call results
            console.log(response);
            window.location.href = 'search_results_page.php'

            $("#search-keyword").html(keyword); // TODO

        },
    });

});