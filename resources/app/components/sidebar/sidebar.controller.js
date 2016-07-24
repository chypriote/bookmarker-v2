'use strict'

module.exports = /*@ngInject*/function ($rootScope, $http) {
	var vm = this

	$rootScope.$on('$stateChangeSuccess', function (event, toState, toParams) {
		if (toParams.tag && toParams.tag != 'all') {
			vm.url = '/api/tags/' + toParams.tag + '/posts'
			$http.get(vm.url)
				.then(function (data) {
					console.log(data)
				}, function (data) {
					console.log(data)
				})
		} else {
			vm.url = '/api/categories/' + toParams.slug + '/posts'
			$http.get(vm.url)
				.then(function (data) {
					console.log(data)
				}, function (data) {
						console.log(data)
				})
		}
	})
}
