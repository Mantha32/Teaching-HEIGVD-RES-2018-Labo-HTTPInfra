$(function() {
    console.log("Loading ip");

    function loadIP() {
        $.getJSON("/ip/", function(ipaddress) {
            console.log(ipaddress);
            var message = "Unvailable IP information!";
            if (typeof wine !== 'undefined') {
                $(".ip-dynamic").text(ipaddress.ip);

            } else {
                $(".ip-dynamic").text(message);

            }


        });


    };

    loadIP();
    setInterval(loadIP, 2000)
});