document.addEventListener("DOMContentLoaded", function(event) {
    truncateText('.text-description-course',107);
});

const truncateText = (elemt, maxLength) => {
    var elements = document.querySelectorAll(elemt);
    for (var i = 0; i < elements.length; i++) { 
        var element = elements[i],
        truncated = element.innerText;

        if (truncated.length > maxLength) {
            truncated = truncated.substr(0,maxLength) + '...';
        }
        element.innerText = truncated;
    }
}