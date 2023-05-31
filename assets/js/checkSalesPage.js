const generateBtn = document.getElementById("generateButton");

generateBtn.addEventListener('click', function() {
    const startDate = document.getElementById("startDate").value;
    const endDate = document.getElementById("endDate").value;
})

const home = document.getElementById("Home");

home.addEventListener('click' , function() {
    window.location.href = "homePageAdmin.html";
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