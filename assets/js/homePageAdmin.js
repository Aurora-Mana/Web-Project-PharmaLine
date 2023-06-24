const checkSB = document.getElementById("Check-sales");
checkSB.addEventListener('click', function() {
    window.location.href = "checkSalesPage.html";
});

const genDis = document.getElementById("Generate-discount");
genDis.addEventListener('click' , function() {
    window.location.href = "generateDiscount.php";
});

const blog = document.getElementById("Blog");
blog.addEventListener('click' , function() {
    window.location.href = "blogAdmin.php";
});

const logOut = document.getElementById("Log-out");
logOut.addEventListener('click' , function() {
    window.location.href = "index.php";
});