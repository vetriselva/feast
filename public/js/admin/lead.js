app.controller('LeadController', function($scope, $http, API_URL) {

    $scope.exclusionList = [];
    $scope.inclusionList = [];
    $scope.refundPolicyList = [];
    $scope.paymentPolicyList = [];
    $scope.cancellationPolicyList = [];

 

    $scope.submitLead = () => {
        let Lead = {
            ...$scope.basicInformation,
            'cancelPolicy': $scope.cancellationPolicyList,
            'paymentPolicy': $scope.paymentPolicyList,
            'refundPolicy': $scope.refundPolicyList,
            'inclusionPolicy': $scope.inclusionList,
            'exclusionpolicy': $scope.exclusionList,
            'itineraryDetail': $scope.ItDays,
            'flightDetail': $scope.FlightDetails,
            'costDetails': $scope.CostDetails,
            'hotelDetail': $scope.HotalDetails
        };
        $http({
            method: 'POST',
            url: `${API_URL}/admin/lead`,
            data: {data: Lead}
        }).then(function success(response) {
            $scope.States = response.data;
        }, function error(response) {
            console.log('state get error');
        });
        console.log(Lead);
    }

    $scope.changeInclusion = (list, active) => {
        if (active) {
            $scope.inclusionList.push(list);
        }else {
            if($scope.inclusionList.indexOf(list) > -1)  $scope.inclusionList.splice($scope.inclusionList.indexOf(list), 1);
        }
        console.log( $scope.inclusionList);
    }

    $scope.changeExclusion = (list, active) => {
        if (active) {
            $scope.exclusionList.push(list);
        }else {
            if($scope.exclusionList.indexOf(list) > -1)  $scope.exclusionList.splice($scope.exclusionList.indexOf(list), 1);
        }
        console.log( $scope.exclusionList);
    }

    $scope.changePaymentPolicy = (list, active) => {
        if (active) {
            $scope.paymentPolicyList.push(list);
        }else {
            if($scope.paymentPolicyList.indexOf(list) > -1)  $scope.paymentPolicyList.splice($scope.paymentPolicyList.indexOf(list), 1);
        }
        console.log( $scope.paymentPolicyList);
    }

    $scope.changeRefundPolicy = (list, active) => {
        if (active) {
            $scope.refundPolicyList.push(list);
        }else {
            if($scope.refundPolicyList.indexOf(list) > -1)  $scope.refundPolicyList.splice($scope.refundPolicyList.indexOf(list), 1);
        }
        console.log( $scope.refundPolicyList);
    }
 
    $scope.changeCancellationPolicy = (list, active) => {
        if (active) {
            $scope.cancellationPolicyList.push(list);
        }else {
            if($scope.cancellationPolicyList.indexOf(list) > -1)  $scope.cancellationPolicyList.splice($scope.cancellationPolicyList.indexOf(list), 1);
        }
        console.log( $scope.cancellationPolicyList);
    }
 

    $scope.basicInformation = {};
        $scope.ItDays  = [
            {
                "DayCount" : 1,
                "StateName" : "",
                "CityName" : "",
                "PlaceName" : "",
                "Activity" : "",
                "DayActivity" : [],
                "Transfers" : "included",
                "EntryTickets" : "not included" ,
                "Others" : "not included" ,
                "Meals":    {},
            } ,
            // {
            //     "DayCount" : 2,
            //     "StateName" : "",
            //     "CityName" : "",
            //     "PlaceName" : "",
            //     "Activity" : "",
            //     "DayActivity" : "",
            //     "Transfers" : "included",
            //     "EntryTickets" : "not included" ,
            //     "Others" : "not included" ,
            //     "Meals":    {},
            // } ,
            // {
            //     "DayCount" : 3,
            //     "StateName" : "",
            //     "CityName" : "",
            //     "PlaceName" : "",
            //     "Activity" : "",
            //     "DayActivity" : "",
            //     "Transfers" : "included",
            //     "EntryTickets" : "not included" ,
            //     "Others" : "not included" ,
            //     "Meals":    {}
            // } ,
        ]; 
        $scope.AddItDays  =   function() {
            $scope.ItDays.push({
                "DayCount" : $scope.ItDays.length + 1,
                "StateName" : "",
                "CityName" : "",
                "PlaceName" : "",
                "Activity" : "",
                "DayActivity" : "",
                "Transfers" : "included",
                "EntryTickets" : "not included" ,
                "Others" : "not included" ,
                "Meals":    {}
            });
        }
        $scope.DelelteItDays = function(index){
            if(confirm('Are you sure! want to Delete ?')){
                $scope.ItDays.splice(index,1);
            }
        }  
        $scope.FlightDetails  = [
            {
                "from" : "",
                "to" : "",
                "flight" : "",
                "date" : "",
                "dep" : "" ,
                "arr" : "" ,
                "bag":    "",
                "refound" : "",
                "meals":    ""
            } 
        ]; 
        $scope.AddFlights  =   function() {
            $scope.FlightDetails.push({
                "from" : "",
                "to" : "",
                "flight" : "",
                "date" : "",
                "dep" : "" ,
                "arr" : "" ,
                "bag":    "",
                "refound" : "",
                "meals":    ""
            });
        }
        $scope.DelelteFlights = function(index){
            if(confirm('Are you sure! want to Delete ?')){
                $scope.FlightDetails.splice(index,1);
            }
        }
        $scope.HotalDetails  = [
            {
                Details: [
                    {
                        Flight : "Flight Cost",
                        For : "2 Adults",
                        Totals : 1000,
                    } 
                ]
            },
            {
                Details: [
                    {
                        Flight : "Flight Cost",
                        For : "2 Adults",
                        Totals : 12345,
                    } 
                ]
            },
        ]; 
        $scope.AddHotalsOption  =   function() {
            $scope.HotalDetails.push({
                "Details": [{}]
            });
            $scope.CostDetails.push({
                "Details": [{}]
            });
        }
        $scope.DelelteHotals = function(index, Secindex){
            if(confirm('Are you sure! want to Delete ?')){
                $scope.HotalDetails[index].Details.splice(Secindex,1);
            }
        }
        $scope.AddHotel  =   function(index) {
            $scope.HotalDetails[index].Details.push({ });
        }
        $scope.items = [
            {name: 'xxx', amount: 13, years: 2, interest: 2},    
            {name: 'yyy', amount: 23, years: 1, interest: 3},
            {name: 'zzz', amount: 123, years: 4, interest: 4}
        ];
        $scope.CostDetails  = [
            {
                Details: [
                    {
                    
                    } 
                ]
            },
            {
                Details: [
                    {
                    
                    } 
                ]
            },
        ]; 
        $scope.AddCost  =   function() {
            $scope.CostDetails.push({
                "Details": [{}]
            });
        }
        $scope.SubAddCost  =   function(index) {
            $scope.CostDetails[index].Details.push({ });
        }
        $scope.DelelteCost = function(index, Secindex){
            if(confirm('Are you sure! want to Delete ?')){
                $scope.CostDetails[index].Details.splice(Secindex,1);
            }
        } 
    
        $scope.getTotal = function(type) {
            var total = 0;
            angular.forEach($scope.items, function(el) {
                total += el[type];
            });
            return total;
        };
        $scope.getTotalMy = function(type) {
            var total = 0;
            angular.forEach($scope.CostDetails[0], function(el) {
                total += el[type]
            });
            return total;
        };

    //http methods
    $http({
        method: 'GET',
        url: `${API_URL}/admin/get-states`
    }).then(function success(response) {
        $scope.States = response.data;
    }, function error(response) {
        console.log('state get error');
    });

    $http({
        method: 'GET',
        url: `${API_URL}/admin/get-package-exclusion`
    }).then(function success(response) {
        $scope.packageExclusions = response.data;
    }, function error(response) {
        console.log('get exclusion error');
    });

    $http({
        method: 'GET',
        url: `${API_URL}/admin/get-package-inclusion`
    }).then(function success(response) {
        $scope.packageInclusions = response.data;
    }, function error(response) {
        console.log('inclusion policy get error');
    });

    $http({
        method: 'GET',
        url: `${API_URL}/admin/get-refund-policy`
    }).then(function success(response) {
        $scope.refundPolicies = response.data;
    }, function error(response) {
        console.log('get refound policy error');
    });

    $http({
        method: 'GET',
        url: `${API_URL}/admin/get-payment-policy`
    }).then(function success(response) {
        $scope.paymentPolicies = response.data;
    }, function error(response) {
        console.log('get payment policy error');
    });

    $http({
        method: 'GET',
        url: `${API_URL}/admin/get-cancellation-policy`
    }).then(function success(response) {
        $scope.cancellationPolicies = response.data;
    }, function error(response) {
        console.log('get cancellation policy error');
    });

    $http({
        method: 'GET',
        url: `${API_URL}/admin/get-day-activity`
    }).then(function success(response) {
        $scope.dayActivities = response.data;
    }, function error(response) {
        console.log('get day activities error');
    });

});

app.directive('getCities', function getCities($http) {
    return {
        restrict: 'A',
        link : function (scope, element, API_URL) {
            element.on('change', function () {
                if(scope.I.StateName == 'undefined') {
                    return false;
                }
                $http({
                    method: 'GET',
                    url: $('#baseurl').val()+'/admin/get-cities-by-state-id',
                    params : {id: scope.I.StateName}
                    }).then(function success(response) {
                        scope.Cities = response.data;
                    }, function error(response) {
                });
            });
        },
    }
});
app.directive('getPlaces', function getPlaces($http) {
    return {
        restrict: 'A',
        link : function (scope, element) {
            element.on('change', function () {
                console.log(scope.I.CityName);
                if(scope.I.CityName == 'undefined') {
                    return false;
                }
                $http({
                    method: 'GET',
                    url: $('#baseurl').val()+'/admin/get-places-by-city-id',
                    params : {id: scope.I.CityName}
                    }).then(function success(response) {
                        scope.Places = response.data;
                    }, function error(response) {
                        console.log('get place error');
                    });
            });
        },
    }
});


//directive
app.directive('dropdownMultiselect', function () {
    return {
        restrict: 'E',
        scope: {
            model: '=',
            options: '=',
        },
        template:
                `<div class="dropdown" class="{open: open}">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                -- Choose --
                </button>
                <ul class="dropdown-menu {open: open}" aria-labelledby="dropdownMenuButton1">
                <li ng-repeat='option in options'> <a ng-click='toggleSelectItem(option)' class="dropdown-item"> <span ng-class='getClassName(option)' aria-hidden='true'> </span> {{option.title}}  </a></li>
                </ul>
              </div>`,

        controller: function ($scope) {
            $scope.openDropdown = function () {
                $scope.open = !$scope.open;
            };

            $scope.selectAll = function () {
                $scope.model = [];
                angular.forEach($scope.options, function (item, index) {
                    $scope.model.push(item.id);
                });
            };

            $scope.deselectAll = function () {
                $scope.model = [];
            };

            $scope.toggleSelectItem = function (option) {
                var intIndex = -1;
                angular.forEach($scope.model, function (item, index) {
                    if (item == option.id) {
                        intIndex = index;
                    }
                });

                if (intIndex >= 0) {
                    $scope.model.splice(intIndex, 1);
                }
                else {
                    $scope.model.push(option.id);
                }
                console.log($scope.model);
            };

            $scope.getClassName = function (option) {
                var varClassName = 'fa fa-close red';
                angular.forEach($scope.model, function (item, index) {
                    if (item == option.id) {
                        varClassName = 'fa fa-check green';
                    }
                });
                return (varClassName);
            };
        }
    }
});