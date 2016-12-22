var app = angular.module('mainModule',['ui.router']);

app.controller('loggingController',function ($scope,$http) {

    $scope.log=function (page,activity,product_id) {
        $http({
            method: "POST",
            url: "logger.php",
            data: {"page":page,"activity":activity,"timestamp":String(new Date(Date.now())),"product_id":product_id}
        }).success(function (data) {
            //alert("Data received from server as :"+data);
        });
    }


    $scope.check=function () {

        alert("Detected");

    }
})

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
            
            if (data.result == "success") {

                window.location.assign("admindash.php");

            }

            else if (data.result == "invalid") {
                $scope.valid = false;
            }
            else {
                $scope.valid = false;
                alert("Please try again later!");
            }
        })
    }

});