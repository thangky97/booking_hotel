// Thêm js ở đây
function myFunction1() {
    var dots1 = document.getElementById("dots1");
    var moreText1 = document.getElementById("more1");
    var btnText1 = document.getElementById("myBtn1");

    if (dots1.style.display === "none") {
        dots1.style.display = "inline";
        btnText1.innerHTML = "Xêm thêm";
        moreText1.style.display = "none";
    } else {
        dots1.style.display = "none";
        btnText1.innerHTML = "Ẩn bớt";
        moreText1.style.display = "inline";
    }
}
function myFunction2() {
    var dots2 = document.getElementById("dots2");
    var moreText2 = document.getElementById("more2");
    var btnText2 = document.getElementById("myBtn2");

    if (dots2.style.display === "none") {
        dots2.style.display = "inline";
        btnText2.innerHTML = "Xêm thêm";
        moreText2.style.display = "none";
    } else {
        dots2.style.display = "none";
        btnText2.innerHTML = "Ẩn bớt";
        moreText2.style.display = "inline";
    }
}
