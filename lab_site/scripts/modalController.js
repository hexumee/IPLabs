document.addEventListener('click', function(event) {
    if (!document.querySelector(".modal").contains(event.target)) {
        parent.document.getElementById("lrm").style.opacity = 0;
        setTimeout(() => {
            parent.document.body.removeChild(parent.document.getElementById("lrm"));
        }, 200);
    }
});
