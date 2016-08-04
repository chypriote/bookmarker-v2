'use strict'

module.exports = /*@ngInject*/function ($http) {
	var vm = this

	$http.get('categories')
		.then(function (data) {
			vm.categories = data.response
		}, function (data) {
			console.log(data)
		})
}
