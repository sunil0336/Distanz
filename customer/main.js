let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
let form = document.querySelector('.form-container .btn');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
}

function validateForm(){
    let s = document.forms["myForm"]["source"].value;
    let d = document.forms["myForm"]["destination"].value;
    let pd = document.forms["myForm"]["p-date"].value;
    let dd = document.forms["myForm"]["d-date"].value;

    if(s == "null"){
        alert("Enter the source! ");
        return false;
    }
    if(d == "null"){
        alert("Please Enter the Destination! ");
        return false;
    }
    if(pd == ""){
        alert("Please Enter the Pick-Up Date! ");
        return false;
    }
    if(pd  < today){
        alert("Please E! ");
        return false;
    }
    if(dd == ""){
        alert("Please Enter the Drop Date! ");
        return false;
    }
}
function svalidation(){
    // var name = document.forms["sForm"]["name"].value;
    // var email = document.forms["sForm"]["email"].value;
    let contact = document.forms["sForm"]["contact"].value;
    // let address = document.forms["sForm"]["address"].value;
    let username = document.forms["sForm"]["username"].value;
    let pwd = document.forms["sForm"]["pwd"].value;

    // if(name == ""){
    //     alert("Enter name! ");
    //     return false;
    // }
    // if(email == ""){
    //     alert("Enter the email! ");
    //     return false;
    // }
    if(contact == ""){
        alert("Enter the contact! ");
        return false;
    }
    if(contact.length <10 ){
        alert("Contact cannot less than 10.");
        return false;
    }
    // if(address == ""){
    //     alert("Enter the address! ");
    //     return false;
    // }
    if(username == ""){
        alert("Enter the username! ");
        return false;
    }
    if(pwd == ""){
        alert("Enter the Password! ");
        return false;
    }
    if(pwd.length < 8 || pwd.length > 12){
        alert("Password Should between 8-12");
        return false;
    }
}
function lvalidation(){
    let username = document.forms["lform"]["username"].value;
    let pwd = document.forms["lform"]["pwd"].value;
    if(username == ""){
        alert("Enter the username! ");
        return false;
    }
    if(pwd == ""){
        alert("Enter the Password! ");
        return false;
    }
    if(pwd.length < 8 || pwd.length > 12){
        alert("Password Should between 8-12");
        return false;
    }
}


// function hide(){
//     document.querySelector('.login').style.display = 'none';
//     // document.querySelector('.login').style.zIndex = -1;
// }
// function show(){
//     // document.querySelector('.login').style.zIndex = 1;
//     document.querySelector('.login').style.display = 'block';
// }
// function hidesignup(){
//     document.querySelector('.signup').style.display = 'none';
// }
// function showsignup(){
//     document.querySelector('.signup').style.display = 'block';
// }

// function vreghide(){
//     document.querySelector('.vreg').style.display = 'none';
// }

function bhide(){
    document.querySelector('.book').style.display = 'none';
}
function bshow(){
    document.querySelector('.book').style.display = 'block';
}


// function vregshow(){
//     document.querySelector('.signup').style.display = 'none';
//     document.querySelector('.vreg').style.display = 'block';
// }


function bookform() {
    window.location.href = "#form-container";
}





const sr = ScrollReveal ({
    distance: '60px',
    duration: 2500,
    delay: 400,
    reset: true
})

sr.reveal('.text',{delay: 200, origin: 'top'})
sr.reveal('.form-container form',{delay: 800, origin: 'left'})
sr.reveal('.heading',{delay: 800, origin: 'top'})
sr.reveal('.ride-container .box',{delay: 600, origin: 'top'})
sr.reveal('.services-container .box',{delay: 600, origin: 'top'})
sr.reveal('.about-container .box',{delay: 600, origin: 'top'})
sr.reveal('.reviews-container',{delay: 600, origin: 'top'})
sr.reveal('.newsletter .box',{delay: 400, origin: 'bottom'})
