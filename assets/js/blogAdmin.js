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
    window.location.href = "index.php";
});

const addPost = document.getElementById("addPost");
addPost.addEventListener('click' , function() {
    window.location.href = "blogPostAdmin.html";
});