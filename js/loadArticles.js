function loadArticles(event) {
    var request = $.ajax({
        type: "POST",
        url: "articles.php",
        data: {
            "site": $("#articles-articles-site").val(),
            "fromDate": $("#articles-from-date").val(),
            "toDate": $("#articles-to-date").val()
        },
        error: function (e) {
            $("#articles-container").html("<p>Failed to load articles.</p>");
        },
        dataType: 'html'
    });

    $.when(request).done(function (html) {
        $("#articles-container").html(html);
    }).fail(function (response) {
        $("#articles-container").html("<p>Failed to load articles.</p>");
    });
}

$( document ).ready(function() {
    $('input').change(function () {
        loadArticles();
    });
    $('select').change(function () {
        loadArticles();
    });

    loadArticles();
});

