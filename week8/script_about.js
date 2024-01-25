var typed = new Typed(".typing_text2", {
    strings: ["Me", "My Life", "My Interests", "My Hobbies"],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true
})

function showNotFunctionalDialog() {
    alert("Not functional yet.");
}

document.getElementById("portfolioLink").addEventListener("click", showNotFunctionalDialog);