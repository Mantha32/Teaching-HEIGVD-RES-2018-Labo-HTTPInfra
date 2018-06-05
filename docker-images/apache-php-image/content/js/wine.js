$(function() {
    console.log("Loading wine");

    function loadWine() {
        $.getJSON("/api/wine/", function(wine) {
            console.log(wine);
            var message = "No body is here";
            if (typeof students !== 'undefined') {
                message = "<b> name: </b>" + wine.name;
                $(".wine-domain").text(" <b> Domain:  </b>" + wine.domain);
                $(".wine-AOC-Origin").text("<b>AOC origin:</b> " + wine.AOCOrigin);
                $(".wine-millesim").text("<b>Millesim: </b>" + wine.millesim);
                $(".wine-type").text("<b>Type: </b>" + wine.type);

            }
            $(".wine-name").text(message);

        });


    };

    loadWine();
    setInterval(loadWine, 2000)
});