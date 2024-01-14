// FOR THE TYPING ANIMATION (HOME)

var typed = new Typed(".typing_text", {
    strings: ["CS Student", "RFS President", "APC Band Vocalist"],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true
})

function showNotFunctionalDialog() {
    alert("Not functional yet.");
}

document.getElementById("skillsLink").addEventListener("click", showNotFunctionalDialog);
document.getElementById("portfolioLink").addEventListener("click", showNotFunctionalDialog);
document.getElementById("contactLink").addEventListener("click", showNotFunctionalDialog);