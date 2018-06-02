/*
 This program is the entry point for our simple dynamic web app

 node index.js
*/

var Chance = require('chance');
var chance = new Chance();

var express = require('express');
var app = express();

// respond with "hello world" when a GET request is made to the homepage
app.get('/', function(req, res) {
    res.send('Hello, welcome to our RES INFRA LAB')
})

// respond with the random profile when a GET request is made to "/api/profile"
app.get('/api/profile', function(req, res) {
    res.send(generateProfile());
})


app.listen(3000, function() {
    console.log('Accepting HTTP requests on port 3000.')
});


function generateProfile() {
    person = {
        firstName: chance.first(),
        lastName: chance.last(),
        age: chance.age({
            min: 21,
            max: 41
        }),
        gender: chance.gender(),
        profession: chance.profession(),
        "Beloved pet": chance.animal({ type: 'zoo' }),
        Moto: chance.sentence()
    };

    return person;

}