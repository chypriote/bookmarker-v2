'use srtrict'

var angular = require('angular')

require('angular-ui-router')

angular.module('bookmarker', ['ui.router'])

	.config(function ($stateProvider, $urlRouterProvider) {
		$urlRouterProvider.otherwise('/')
		$stateProvider
			.state('login', {
				url: '/login',
				template: 'Hello!'
			})
	})
