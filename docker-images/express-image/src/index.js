/*
 This program is the entry point for our simple dynamic web app

 node index.js
*/

var Chance = require('chance');
var chance = new Chance(Math.random);
var ip = require("ip");

var express = require('express');
var app = express();

// respond with ipaddress for the server when a GET request is made to the homepage
app.get('/ip', function(req, res) {

    innerAddr = { ip: ip.address() }
    res.send(innerAddr);
})

// respond with the random profile when a GET request is made to "/api/wine"
app.get('/api/wine', function(req, res) {
    res.send(generateGrandCru());
})



app.listen(3000, function() {
    console.log('Accepting HTTP requests on port 3000.')
});


function generateOwner() {
    person = {
        firstName: chance.first(),
        lastName: chance.last(),
        age: chance.integer({ min: 21, max: 56 }),
        gender: chance.gender(),
        "Beloved pet": chance.animal({ type: 'zoo' }),
        Moto: chance.sentence()
    };

    return person;

}

function generateWine() {
    var wineType = new Array("Barbera", "Burgundy", "Carménère", "Chianti", "Grenache", "Moscato", "Petite Sirah",
        "Riesling", "Sauvignon Blanc", "Blaufränkisch", "Cabernet Franc", "Chardonnay", "Gamay",
        "Grüner Veltliner", "Malbec", "Pinot Grigio / Gris", "Rosé Wine", "Syrah & Shiraz", "Zinfandel",
        " Bordeaux", "Cabernet Sauvignon", "Chenin Blanc", "Gewürztraminer", "Merlot", "Nebbiolo",
        "Pinot Noir", "Rioja", " Sparkling Wines");

    return wineType[chance.integer({ min: 0, max: (wineType.length - 1) })];
}


function generateGrandCru() {
    wine = {
        name: chance.word({ length: 6 }) + " " + chance.animal({ type: 'grassland' }),
        domain: chance.name({ nationality: 'it' }),
        AOCOrigin: chance.province({ country: 'it', full: true }),
        millesime: chance.year({ min: 1950, max: 2013 }),
        type: generateWine(),
        owner: generateOwner()
    };

    return wine;

}