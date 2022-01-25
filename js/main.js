function show_faq(elt_1, elt_2){
    var content = document.getElementsByClassName("faq-content");
    var faq_header = document.querySelectorAll(".faq-active-2");

    for (let i = 0; i < content.length; i++) {
        content[i].style.display = "none";
    }

    for (let i = 0; i < faq_header.length; i++) {
        faq_header[i].classList.remove("faq-active");
    }


    document.getElementById(elt_1).style.display = "flex";
    elt_2.classList.add("faq-active");
}

document.getElementById("default").click();