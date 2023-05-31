const home = document.getElementById("Home");

home.addEventListener('click' , function() {
    window.location.href = "HomePageAdmin.html";
});

const checkS = document.getElementById("Check-sales");
checkS.addEventListener('click' , function() {
    window.location.href = "checkSalesPage.html";
});

const genDis = document.getElementById("Generate-dis");
genDis.addEventListener('click' , function() {
    window.location.href = "generateDiscount.html";
});

const blog = document.getElementById("Blog");
blog.addEventListener('click' , function() {
    window.location.href = "";
});

const favProd = document.getElementById("Fav-prod");
blog.addEventListener('click' , function() {
    window.location.href = "";
});

const logOut = document.getElementById("Log-out");
logOut.addEventListener('click' , function() {
    window.location.href = "index.html";
});




const genBtn = document.getElementById("generateBtn");
const codeF = document.getElementById("generateField");

genBtn.addEventListener('click', function() {
    codeF.innerHTML("h");
});