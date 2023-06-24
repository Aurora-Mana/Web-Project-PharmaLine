const checkSB = document.getElementById("Check-sales");
checkSB.addEventListener('click', function() {
    window.location.href = "checkSalesPage.html";
    console.log("clicked");
});

const genDis = document.getElementById("Generate-discount");
genDis.addEventListener('click' , function() {
    window.location.href = "generateDiscount.php";
});

const blog = document.getElementById("Home");
blog.addEventListener('click' , function() {
    window.location.href = "homePageAdmin.php";
});

const logOut = document.getElementById("Log-out");
logOut.addEventListener('click' , function() {
    window.location.href = "index.php";
});