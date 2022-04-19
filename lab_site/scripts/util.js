function setFileName() {
    document.getElementById("chosenFileName").innerText = document.getElementById("picInput").files[0].name;
    document.getElementById("chosenFileName").style.setProperty('color', 'black', 'important');
}
