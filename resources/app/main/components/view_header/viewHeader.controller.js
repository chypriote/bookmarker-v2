'use strict'

module.exports = /*@ngInject*/function ($state, $stateParams) {
	var vm = this

	if ($state.includes('category')) {
		vm.title = $stateParams.slug
		vm.subtitle = $stateParams.tag ? $stateParams.tag : 'everything'
	} else if ($state.includes('admin')) {
		vm.title = 'Admin'
		vm.subtitle = 'Test'
	} else {
		vm.title = 'bookmarker'
		vm.subtitle = '2'
	}
}
