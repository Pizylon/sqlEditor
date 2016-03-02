app
.controller('homeCTRL',function($scope,$http)
	{
        $scope.queryType='select';

       $scope.send= function () {

            var data={
              query : $scope.query,
                queryType: $scope.queryType
            };
           $http.post('controller/qrctrl.php',data)

               .success(function(data)
               {
                   console.log(data);
                 $scope.results=data;
           }).error(function(data){
               console.log(data);
           })
       }

	});