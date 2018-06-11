$(function() {
    console.log("Loading Own IP");

    function loadOwnIP() {
        var ip = require("ip");
        ipaddress = ip.address();
        console.log("Static IP: " + ipaddress);
        var message = "Unvailable IP information!";
        if (typeof wine !== 'undefined') {
            $(".ip-static").text(ipaddress.ip);

        } else {
            $(".ip-static").text(message);

        }
    };

    loadOwnIP();
});