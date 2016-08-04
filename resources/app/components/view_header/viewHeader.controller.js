'use strict'

module.exports = /*@ngInject*/function ($stateParams) {
	var vm = this

	vm.slug = $stateParams.slug
	vm.tag = $stateParams.tag ? $stateParams.tag : 'everything';
}
