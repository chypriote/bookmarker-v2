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
				templateUrl: 'admin/_views/categories.html'
			})
			.state('admin.post', {
				url: '/post',
				templateUrl: 'admin/_views/new-post.html'
			})
	})

require('./poster')
require('./categories')
