function LogOut(){
    window.location.href = "./login.html";
    gapi.auth2.getAuthInstance().signOut();
}