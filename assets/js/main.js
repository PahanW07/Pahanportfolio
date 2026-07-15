const words = [
    "Graphic Designer",
    "Videographer",
    "Photographer",
    "Concept Artist",
    "Creative Director"
];

let wordIndex = 0;
let charIndex = 0;
let currentWord = "";
let currentChar = "";

const typing = document.getElementById("typing");

function type() {

    if(!typing) return;

    if(charIndex < words[wordIndex].length){

        currentChar += words[wordIndex].charAt(charIndex);
        typing.textContent = currentChar;
        charIndex++;

        setTimeout(type,100);

    }else{

        setTimeout(erase,1500);

    }
}

function erase(){

    if(charIndex > 0){

        currentChar = currentWord.substring(0,charIndex-1);

        typing.textContent = currentChar;

        charIndex--;

        setTimeout(erase,50);

    }else{

        wordIndex++;

        if(wordIndex >= words.length){
            wordIndex = 0;
        }

        currentWord = words[wordIndex];

        setTimeout(type,300);
    }
}

currentWord = words[wordIndex];
type();

window.addEventListener("load", () => {

    const loader = document.querySelector(".loader");

    setTimeout(() => {
        loader.classList.add("hide");
    }, 1500);

});

const cursor = document.querySelector(".cursor");
const dot = document.querySelector(".cursor-dot");

document.addEventListener("mousemove", (e) => {

    cursor.style.left = e.clientX + "px";
    cursor.style.top = e.clientY + "px";

    dot.style.left = e.clientX + "px";
    dot.style.top = e.clientY + "px";

});

const filterButtons = document.querySelectorAll(".filter-btn");
const projects = document.querySelectorAll(".project-card");

filterButtons.forEach(btn => {

    btn.addEventListener("click", () => {

        // remove active class
        filterButtons.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        const filter = btn.getAttribute("data-filter");

        projects.forEach(project => {

            // show all
            if(filter === "all"){
                project.style.display = "block";
                setTimeout(() => project.style.opacity = "1", 100);
            }

            // filter match
            else if(project.classList.contains(filter)){
                project.style.display = "block";
                setTimeout(() => project.style.opacity = "1", 100);
            }

            // hide
            else{
                project.style.opacity = "0";
                setTimeout(() => project.style.display = "none", 300);
            }

        });

    });

});

function revealOnScroll() {

    const elements = document.querySelectorAll(".reveal");

    const windowHeight = window.innerHeight;

    elements.forEach(el => {

        const elementTop = el.getBoundingClientRect().top;

        if(elementTop < windowHeight - 100){
            el.classList.add("active");
        }

    });

}

window.addEventListener("scroll", revealOnScroll);
window.addEventListener("load", revealOnScroll);


function openProject(title, category, description, image){

    document.getElementById('modalTitle').innerHTML = title;
    document.getElementById('modalCategory').innerHTML = category;
    document.getElementById('modalDescription').innerHTML = description;
    document.getElementById('modalImage').src = image;

    document.getElementById('projectModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeProject(){

    document.getElementById('projectModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function openZoom(){

    let image = document.getElementById('modalImage').src;

    document.getElementById('zoomImage').src = image;
    document.getElementById('zoomModal').style.display = 'flex';
}

function closeZoom(){

    document.getElementById('zoomModal').style.display = 'none';
}

window.onclick = function(event){

    let modal = document.getElementById('projectModal');
    let zoom = document.getElementById('zoomModal');

    if(event.target == modal){
        closeProject();
    }

    if(event.target == zoom){
        closeZoom();
    }
}