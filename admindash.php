<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Market-Place</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <![endif]-->
    <!--Google Map Api-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/sha256.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>

    <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
    <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>

    <script>
           var app = angular.module('mainModule',[]);
           
           
app.controller('statsController',function ($scope,$http) {

    $scope.trackUser=function (name) {
        $http({
            "method":"POST",
            "url":"trackUser.php",
            "data":{
                "name":name
            }
        }).success(function (data) {
            var values=[];
            var values2=[];
            for(i in data){
                var value=[];
                var value2=[];
                value.push(moment(data[i].timestamp).format("MMM Do, h:mm:ss") );//"2013-03-10"data[i].timestamp);
                value.push(data[i].page);
                value.push(20)

                value2.push(moment(data[i].timestamp).format("MMM Do, h:mm:ss"));
                value2.push(data[i].activity);
                value2.push(20)

                values.push(value);
                values2.push(value2);
            }

            var myConfig1 = {

                "type": "bubble",
                "plotarea":{
                    "adjust-layout":true
                },
                "series": [
                    {
                        "values":values
                    }
                ]
            };

            var myConfig2 = {

                "type": "bubble",
                "plotarea":{
                    "adjust-layout":true
                },
                "series": [
                    {
                        "values":values2
                    }
                ]
            };


            zingchart.render({
                id : 'myChart',
                data : myConfig1,
                height : "80%",
                width: "100%"
            });

            zingchart.render({
                id : 'myChart2',
                data : myConfig2,
                height : "80%",
                width: "100%"
            });

        });
    }

});


    </script>

</head>

<body ng-app="mainModule" ng-controller="statsController">


<div ui-view>
    <div class="jumbotron">
        <h1 align="center">User Tracking and Analysis</h1>
    </div>
    <div class="row" style="margin-left: 10%;">
        <form ng-submit="trackUser(name)">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" class="form-control" ng-model="name" placeholder="Enter user id to track" required>
                </div>
                <div class="col-md-2" style="margin-left: -4.4%; margin-top: -0.1%">
                    <button type="submit" class=" btn btn-primary glyphicon glyphicon-search" ></button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div id='myChart'></div>
    </div>

    <div class="row" style="margin-top: 40px; margin-bottom: 100px">
        <div id='myChart2'></div>
    </div>

</div>

</body>

</html>