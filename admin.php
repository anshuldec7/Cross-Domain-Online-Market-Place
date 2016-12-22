<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Market-Place</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!--Google Map Api-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmjLulL2RJWCbb3ewYnwC9VfHNZRpRK-o&sensor=false"></script>
    <!--Google Map Api-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/sha256.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>

    <script>
        var app = angular.module('mainModule',[]);
        app.controller('adminLoginController', function ($scope, $http) {
            $scope.valid = true;
            $scope.present = true;
            $scope.inserterr = true;

            $scope.login = function (valid) {

                $scope.valid = true;
                $http({
                    method: "POST",
                    url: 'verifyadmin.php',
                    data: {
                        "username": $scope.username,
                        "password": $scope.password
                    }
                }).success(function (data) {
                    
                    if (data == 1) {

                        window.location.assign("admindash.php");

                    }

                    else if (data == 0) {
                        $scope.valid = false;
                    }
                    else {
                        $scope.valid = false;
                        alert("Please try again later!");
                    }
                })
            }

        });
    </script>

    <style>

        .fb-login-button {
            transform: scale(3.5);
            -ms-transform: scale(3.5);
            -webkit-transform: scale(3.5);
            -o-transform: scale(3.5);
            -moz-transform: scale(3.5);
            transform-origin: top left;
            -ms-transform-origin: top left;
            -webkit-transform-origin: top left;
            -moz-transform-origin: top left;
            -webkit-transform-origin: top left;
        }
    </style>
</head><!--/head-->
<body ng-app="mainModule">
<div class="row">
    <div class="col-xs-offset-4 col-xs-4 bordered"  style="margin-top:33px;">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#signin-tab" data-toggle="tab"><strong><span class="sp spr ar"></span>&nbsp;&nbsp;&nbsp;&nbsp;Sign in</strong></a></li>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane active" id="signin-tab" ng-controller="adminLoginController">
                <form name="signInForm" ng-submit="login(signInForm.$valid);">
                    <div class="row" ng-hide="valid">
                        <p style="color:red; font-size:12px"> &nbsp;&nbsp; &nbsp;&nbsp;Oops, that's not a match.</p>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <input type="text" class="form-control" placeholder="Email or username" name="Name" ng-model="username" required/>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="password" class="form-control" placeholder="Password" name="pass" ng-model="password" required/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block"><strong>Sign In</strong></button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>

        </div>



    </div>

</div>

</body>


</html>

