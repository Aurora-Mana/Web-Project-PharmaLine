const generateBtn = document.getElementById("generateButton");

generateBtn.addEventListener('click', function() {
    const startDate = document.getElementById("startDate").value;
    const endDate = document.getElementById("endDate").value;
})

const home = document.getElementById("Home");

home.addEventListener('click' , function() {
    window.location.href = "homePageAdmin.php";
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