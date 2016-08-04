'use srtrict'

var angular = require('angular')

require('angular-ui-router')

angular.module('bookmarker', ['ui.router'])

	.config(function ($stateProvider, $urlRouterProvider) {
		$urlRouterProvider.otherwise('/')
		$stateProvider
			.state('home', {
				url: '/',
				templateUrl: 'views/default.html'
			})
			.state('login', {
				url: '/login',
				template: 'Hello!'
			})
			.state('admin', {
				url: '/admin',
				templateUrl: 'views/admin.html'
			})
			.state('category', {
				url: '/{slug}',
				abstract: true
			})
			.state('category.all', {
				url: '',
				templateUrl: 'views/default.html'
			})
			.state('category.tag', {
				url: '/{tag}',
				templateUrl: 'views/default.html'
			})
	})

require('./components/sidebar')
require('./components/view_header/')
