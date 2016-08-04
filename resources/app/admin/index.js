'use strict'

var angular = require('angular')

angular.module('bookmarker.admin', ['ui.router'])

	.config(function ($stateProvider) {
		$stateProvider
			.state('admin', {
				url: '/admin',
				templateUrl: 'admin/_views/admin.html'
			})
			.state('admin.categories', {
				url: '/categories',
				template: 'Admin categories'
			})
			.state('admin.post', {
				url: '/post',
				template: 'New post'
			})
	})

require('./poster')
require('./categories')
