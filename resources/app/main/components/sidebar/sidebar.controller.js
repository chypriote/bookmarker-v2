'use strict'

module.exports = /*@ngInject*/function ($rootScope, $http, $state) {
	var vm = this

	$rootScope.$on('$stateChangeSuccess', function (event, toState, toParams) {

		if ($state.includes('category')) {
			if (toParams.tag && toParams.tag != 'everything') {
				vm.url = '/api/tags/' + toParams.tag + '/posts'
				$http.get(vm.url)
					.then(function (data) {
						console.log('sidebar ok:' + data)
					}, function (data) {
						console.log('sidebar err:' + data)
					})
			} else {
				vm.url = '/api/categories/' + toParams.slug + '/posts'
				$http.get(vm.url)
					.then(function (data) {
						console.log('sidebar ok:' + data)
					}, function (data) {
							console.log('sidebar err:' + data)
					})
			}
		}
	})

}
