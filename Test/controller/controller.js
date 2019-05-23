var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "extrafiles/login.php",
        controller : "loginCtrl"
    })
    .when("/login", {
        templateUrl : "extrafiles/login.php"
    })
    .when("/createAccount", {
        templateUrl : "extrafiles/CreateAccount.php",
        controller : "createCtrl"
    })
    .when("/dashboard",{
            templateUrl : "dashboard/index.php"
    })
    .otherwise({
      templateUrl : "extrafiles/login.php "
    });



});



app.controller('loginCtrl',function($scope,$http,$location){

        $scope.login = function(){
          var username = $scope.username;
          var password = $scope.password;

            $http({
              url : 'php/ServerLogin.php',
              method : 'POST',
              headers : {
                'Content-Type' : 'application/x-www-form-urlencoded'
              },
              data : 'username='+username+'&password='+password
            }).then(function(response){
              if(response.data.status =='loggedin'){

console.log(response);
                window.location = "dashboard.php";

              }
              else{
                alert('invalid Login');
              }

            })


        }
});



app.controller('createCtrl',function($scope,$http,$location){

        $scope.create = function(){
          var username = $scope.username;
          var password = $scope.password;

            $http({
              url : 'php/ServerLogin.php',
              method : 'POST',
              headers : {
                'Content-Type' : 'application/x-www-form-urlencoded'
              },
              data : 'username='+username+'&password='+password+'&userHash=allowCreate'
            }).then(function(response){

                if(response.data.status =='loggedin'){


                  window.location = "dashboard.php";

                }
                else{
                  alert('invalid Login');
                }
            })


        }
});
