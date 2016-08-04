'use strict'

var angular = require('angular')

angular.module('bookmarker.main', ['ui.router'])

	.config(function ($stateProvider) {
		$stateProvider
			.state('home', {
				url: '/',
				templateUrl: 'main/_views/default.html'
			})
			.state('login', {
				url: '/login',
				template: 'Hello!'
			})

			.state('category', {
				url: '/{slug}',
				abstract: true
			})
			.state('category.all', {
				url: '',
				templateUrl: 'main/_views/default.html'
			})
			.state('category.tag', {
				url: '/{tag}',
				templateUrl: 'main/_views/default.html'
			})
	})

require('./components/view_header')
require('./components/sidebar')
