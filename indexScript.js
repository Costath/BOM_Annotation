"use strict";

function hideContent() {
    document.getElementById("myAccount").style.display = "none";
    document.getElementById("thisCycle").style.display = "none";
    document.getElementById("myCycles").style.display = "none";
    document.getElementById("newAnnotationButton").style.display = "none";
    document.getElementById("newAnnotationForm").style.display = "none";
}
function showContent(element) {
    hideContent();
    if(element.innerText == "My Account"){
        document.getElementById("myAccount").style.display = "block";
    }else if (element.innerText == "This Cycle") {
        document.getElementById("thisCycle").style.display = "block";
        document.getElementById("newAnnotationButton").style.display = "block";
    }else if (element.innerText == "My Cycles") {
        document.getElementById("myCycles").style.display = "block";
    }
}

var liElements = document.getElementsByTagName("li");
Array.from(liElements).forEach(function (item) {
    item.addEventListener("click", function () {showContent(this);}, false);
});
function newAnnotation () {
    document.getElementById("newAnnotationForm").style.display = "block";
}

function pageSetUp() {
    hideContent();
    document.getElementById("thisCycle").style.display = "block";
        document.getElementById("newAnnotationButton").style.display = "block";
        document.getElementById("newAnnotationButton").addEventListener("click", newAnnotation, false);
}
window.addEventListener("load", pageSetUp, false);