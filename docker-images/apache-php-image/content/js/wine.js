$(function() {
    console.log("Loading wine");

    function loadWine() {
        $.getJSON("/api/wine/", function(wine) {
            console.log(wine);
            var message = "Unvailable information!";
            if (typeof wine !== 'undefined') {
                $(".wine-name").text(wine.name);
                $(".wine-domain").text(wine.domain);
                $(".wine-AOC-Origin").text(wine.AOCOrigin);
                $(".wine-millesime").text(wine.millesime);
                $(".wine-type").text(wine.type);
                $(".wine-owner").text(wine.owner.firstName + " " + wine.owner.lastName);

            } else {
                $(".wine-name").text(message);
                $(".wine-domain").text(message);
                $(".wine-AOC-Origin").text(message);
                $(".wine-millesime").text(message);
                $(".wine-type").text(message);
                $(".wine-owner").text(message);
            }


        });


    };

    loadWine();
    setInterval(loadWine, 2000)
});