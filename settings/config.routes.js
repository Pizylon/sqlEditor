app
.config(
	['$stateProvider','$urlRouterProvider',
		function($stateProvider,$urlRouterProvider){
			$urlRouterProvider.otherwise('/home');

			$stateProvider
				.state('home',{
					url:'/home',
					templateUrl:'template/home.html',
					controller:'homeCTRL'
				}
			)
			//%NEW_STATE

		}
	]
)