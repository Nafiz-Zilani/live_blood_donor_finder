;(function ($){
    $(document).ready(function (){
        $("#login").on('click',function (){
            $("#from01 h3").html("Log In");
            $("#action").val("login");
        });

        $("#register").on('click',function (){
            $("#from01 h3").html("Registe");
            $("#action").val("register");
        });
    })
})(jQuery);

// Geo location functation
// const getlocation = () =>{
//     if(navigator.geolocation){
//         return navigator.geolocation.getCurrentPosition(showPosition);
//         // abcd = parseFloat(abcd);
//     } else {
//         alert("Geo location don't support by this device");
//     }
// };
//
// const showPosition = (position) =>{
//     let def = position.coords.latitude;
//     console.log(def);
//     // let long = position.coords.longitude;
// };
//
// const showError = (error) => {
//     console.log(error);
// };
//
// let variable1 = document.getElementById("x");
// function getlocation() {
//     navigator.geolocation.getCurrentPosition(showLoc);
// }
// function showLoc(pos) {
//     document.getElementById("x").setAttribute('value',pos.coords.latitude);
//     document.getElementById("y").setAttribute('value',pos.coords.longitude);
// }

// Function to create the cookie
// function createCookie(name, value, days) {
//     let expires;
//
//     if (days) {
//         let date = new Date();
//         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
//         expires = "; expires=" + date.toGMTString();
//     }
//     else {
//         expires = "";
//     }
//
//     document.cookie = escape(name) + "=" +
//         escape(value) + expires + "; path=/";
// }

