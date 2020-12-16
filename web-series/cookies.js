  // Gets data from cookie  
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  // Checks for username cookie and displays alert
  function checkCookie() {
    var user=getCookie("username");
    if (user != "" && user!=null) {
        alert("Hi " + user);        
    }
  }

  // deletes cookies, role and username
  function deleteCookie() {
    var user=getCookie("username");
    if (user != "") {
      document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      alert("Cookie deleted succesfully");
      window.location.assign('login.html');
    } else {
        alert("User does not exist yet ");
    }
  }