'use strict'

module.exports = /*@ngInject*/function ($http) {
	var vm = this

	$http.get('api/categories')
		.then(function (response) {
			vm.categories = response.data
			console.log(vm.categories)
		}, function (response) {
			console.log(response)
		})
}
