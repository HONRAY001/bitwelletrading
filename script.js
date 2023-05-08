'use script';




/*********event element***********/


const addEventOnElem = function (elem, type, callback) {
    if (elem.length > 1) {
        for (let i = 0; i < elem.length; i++) {
            elem[i].addEventListener(type, callback);
        }
    } else {
        elem.addEventListener(type, callback);
    }
}




/*******************navbar toggle*********************/


const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navToggler = document.querySelector("[data-nav-toggler]");

const toggleNavbar = function () {
    navbar.classList.toggle("active");
    navToggler.classList.toggle("active");
    document.body.classList.toggle("active");
}

addEventOnElem(navToggler, "click", toggleNavbar);

const closeNavbar = function () {
    navbar.classList.remove("active");
    navToggler.classList.remove("active");
    document.body.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNavbar);




/******************active header*********************/


const header = document.querySelector("[data-header]");

const activeHeader = function () {
    if (window.scrollY > 300) {
        header.classList.add("active");
    } else {
        header.classList.remove("active");
    }
}

addEventOnElem(window, "scroll", activeHeader);




/**add to fav toggle active**/


const addToFavBtns = document.querySelectorAll("[data-add-to-fav]");

const toggleActive = function () {
    this.classList.toggle("active");
}

addEventOnElem(addToFavBtns, "click", toggleActive);




/******** reveal effect ********/


const sections = document.querySelectorAll("[data-section]");

const scrollReveal = function () {
    for (let i = 0; i < sections.length; i++) {
        if(sections[i].getBoundingClientRect().top < window.innerHeight / 1.5) {
            sections[i].classList.add("active");
        }else {
            sections[i].classList.remove("active");
        }
    }
}

scrollReveal ();

addEventOnElem(window, "scroll", scrollReveal);



var btc = document.getElementById("bitcoin");
var eth = document.getElementById("ethereum");
var usdt = document.getElementById("tether");
var bnb = document.getElementById("bnb");

var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin%2Cethereum%2Ctether%2Cbnb&vs_currencies=usd",

    "method": "GET",
    "headers": {}
}

$.ajax(liveprice).done(function (response){
    btc.innerHTML = response.bitcoin.usd;
    eth.innerHTML = response.ethereum.usd;
    usdt.innerHTML = response.tether.usd;
    bnb.innerHTML = response.bnb.usd;
});

