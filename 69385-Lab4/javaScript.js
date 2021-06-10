let firstName=document.getElementById("firstName");
let lastName=document.getElementById("lastName");
let email=document.getElementById("email");
let phoneNumber=document.getElementById("phoneNumber");
let password=document.getElementById("password");
let password2=document.getElementById("password2");
let state=document.getElementById("state");
let radios=document.getElementsByName("gender");
let radios2=document.getElementsByName("tnc");
let testCheckbox=document.getElementById("agree");

let formValid = false;
let i = 0;
let formValid2 = false;
let j = 0;

function validateInput(){
    //first name
    if(firstName.value.trim()===""){
        onError(firstName, "First Name cannot be empty.");
    }else{
        if(!isValidName(firstName.value.trim())){
            onError(firstName, "Only alphabet allowed.");
        }else
            onSuccess(firstName);
    }
    //last name
    if(lastName.value.trim()===""){
        onError(lastName, "Last Name cannot be empty.");
    }else{
        if(!isValidName(lastName.value.trim())){
            onError(lastName, "Only alphabet allowed.")
        }
        else
            onSuccess(lastName);
    }
    //mobile number
    if(phoneNumber.value.trim()===""){
        onError(phoneNumber,"Mobile number cannot be empty.");
    }else{
        if(!isValidPhoneNumber(phoneNumber.value.trim())){
            onError(phoneNumber, "Malaysian mobile number is not valid.");
        }else{
            onSuccess(phoneNumber);
        }
    }
    //email
    if(email.value.trim()===""){
        onError(email,"Email cannot be empty.");
    }else{
        if(!isValidEmail(email.value.trim())){
            onError(email, "Email is not valid.");
        }else{
            onSuccess(email);
        }
    }
    //password
    if(password.value.trim()===""){
        onError(password, "Password cannot be empty.");
    }else{
        if(!isValidPassword(password.value.trim())){
            onError(password, "Tips: 6 digits length, contain ONE upppercase, ONE lowercase, ONE special character, numbers and no space.");
        }else
            onSuccess(password);
    }
    //confirm password
    if(password2.value.trim()===""){
        onError(password2, "Confirm password cannot be empty.");
    }else{
        if(password.value.trim()!==password2.value.trim()){
            onError(password2, "Passwords does not match.");
        }else
            onSuccess(password2);
    }
    //state
    if(state.value.trim()===""){
        onError1(state, "Please choose a state.");
    }
    else{
            onSuccess1(state);
    }
    //gender
    if (radios[0].checked === true) {
        onSuccess(dot_1);
    } else if (radios[1].checked === true) {
        onSuccess(dot_2);
    } else {
        onError(dot_1, "Please select your gender.");
        onError(dot_2, "Please select your gender.");
    }
    //terms and conditions
    if (radios2[0].checked === true) {
        onSuccess(dot_3);
    }
    else{
        onError(dot_3, "Please agree term and condition.");
        alert("Please agree term and condition.");
    }
}

document.querySelector("button")
.addEventListener("click",(event)=>{
    event.preventDefault();
    validateInput();
});

function onSuccess(input){
    let parent=input.parentElement;
    let messageEle=parent.querySelector("small");
    messageEle.style.visibility="hidden";
    parent.classList.remove("error");
    parent.classList.add("success");
}
function onError(input, message){
    let parent=input.parentElement;
    let messageEle=parent.querySelector("small");
    messageEle.style.visibility="visible";
    messageEle.innerText=message;
    parent.classList.add("error");
    parent.classList.remove("success");
}
function onSuccess1(select){
    let parent=select.parentElement;
    let messageEle=parent.querySelector("small");
    messageEle.style.visibility="hidden";
    parent.classList.remove("error");
    parent.classList.add("success");
}
function onError1(select, message){
    let parent=select.parentElement;
    let messageEle=parent.querySelector("small");
    messageEle.style.visibility="visible";
    messageEle.innerText=message;
    parent.classList.add("error");
    parent.classList.remove("success");
}
function isValidName(firstName){
    return /^[a-zA-Z\s]+$/.test(firstName);
}
function isValidName(lastName){
    return /^[a-zA-Z\s]+$/.test(lastName);
}
function isValidEmail(email){
    return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function isValidPhoneNumber(phoneNumber){
    return /^(\+?6?01)[0|1|2|3|4|6|7|8|9]\-*[0-9]{7,8}$/.test(phoneNumber);
}
function isValidPassword(password){
    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6}$/.test(password);
}