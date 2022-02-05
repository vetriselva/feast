app.controller('LeadController', function($scope) {
    $scope.ItDays  = [
        {
            "DayCount" : "",
            "PlaceName" : "",
            "Activity" : "",
            "Transfers" : "included",
            "EntryTickets" : "not included" ,
            "Others" : "not included" ,
            "Meals":    ""
        } ,
        {
            "DayCount" : "",
            "PlaceName" : "",
            "Activity" : "",
            "Transfers" : "included",
            "EntryTickets" : "not included" ,
            "Others" : "not included" ,
            "Meals":    ""
        } ,
        {
            "DayCount" : "",
            "PlaceName" : "",
            "Activity" : "",
            "Transfers" : "included",
            "EntryTickets" : "not included" ,
            "Others" : "not included" ,
            "Meals":    ""
        } ,
    ]; 
    $scope.AddItDays  =   function() {
        $scope.ItDays.push({
            "DayCount" : "",
            "PlaceName" : "",
            "Activity" : "",
            "Transfers" : "included",
            "EntryTickets" : "not included" ,
            "Others" : "not included" ,
            "Meals":    ""
        });
    }
    $scope.DelelteItDays = function(index){
        if(confirm('Are you sure! want to Delete ?')){
            $scope.ItDays.splice(index,1);
        }
    }  
    $scope.FlightDetails  = [
        {
            "From" : "",
            "To" : "",
            "Flight" : "",
            "Date" : "",
            "Dep" : "" ,
            "Arr" : "" ,
            "Bag":    "",
            "Refound" : "",
            "Meals":    ""
        } 
    ]; 
    $scope.AddFlights  =   function() {
        $scope.FlightDetails.push({
            "From" : "",
            "To" : "",
            "Flight" : "",
            "Date" : "",
            "Dep" : "" ,
            "Arr" : "" ,
            "Bag":    "",
            "Refound" : "",
            "Meals":    ""
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
    $scope.DelelteHotals = function(index){
        if(confirm('Are you sure! want to Delete ?')){
            $scope.HotalDetails.splice(index,1);
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
});
