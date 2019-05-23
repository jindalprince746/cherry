// Initialize Firebase
var config = {
  apiKey: "AIzaSyAv9wMqZChwlrS-5HWA4zkpKelGuztxhg8",
  authDomain: "cherryeducations-e3e58.firebaseapp.com",
  databaseURL: "https://cherryeducations-e3e58.firebaseio.com",
  projectId: "cherryeducations-e3e58",
  storageBucket: "cherryeducations-e3e58.appspot.com",
  messagingSenderId: "828867172007"
};
firebase.initializeApp(config);
googleSignIn=()=>{
  var provider = new firebase.auth.GoogleAuthProvider();
  firebase.auth().signInWithRedirect(provider).then(function(result) {
  // This gives you a Google Access Token. You can use it to access the Google API.
  var token = result.credential.accessToken;
  // The signed-in user info.
  var user = result.user;
  // ...
}).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // The email of the user's account used.
  var email = error.email;
  // The firebase.auth.AuthCredential type that was used.
  var credential = error.credential;
  // ...
});
}
