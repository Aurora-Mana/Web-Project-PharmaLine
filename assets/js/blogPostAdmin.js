const checkSB = document.getElementById("Check-sales");
checkSB.addEventListener('click', function() {
    window.location.href = "checkSalesPage.html";
    console.log("clicked");
});

const genDis = document.getElementById("Generate-discount");
genDis.addEventListener('click' , function() {
    window.location.href = "generateDiscount.html";
});

const blog = document.getElementById("Home");
blog.addEventListener('click' , function() {
    window.location.href = "homePageAdmin.html";
});

const logOut = document.getElementById("Log-out");
logOut.addEventListener('click' , function() {
<<<<<<< HEAD
    window.location.href = "index.php";
=======
    window.location.href = "index.html";
>>>>>>> dcc44e13bf829b7e2ff9a2eee280354ec89edc97
});