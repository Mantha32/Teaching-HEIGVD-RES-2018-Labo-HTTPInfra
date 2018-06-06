/*
 This program is the entry point for our simple dynamic web app

 node index.js
*/

var Chance = require('chance');
var chance = new Chance();

console.log("AOC origin: " + chance.province({ country: 'it', full: true }));
console.log("Wine name: " + chance.word({ length: 6 }) + chance.animal({ type: 'grassland' }));