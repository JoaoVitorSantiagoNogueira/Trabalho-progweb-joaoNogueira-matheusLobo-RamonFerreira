function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var username = profile.getName();
    var email = profile.getEmail();
    alert("a");
    $.ajax({
        url:'php/validateAPI.php',
        method:'POST',
        data:{
          username : username,
          email : email,
        },
        
    });
}