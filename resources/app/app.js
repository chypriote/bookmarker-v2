'use srtrict'

var angular = require('angular')

require('angular-ui-router')

angular.module('bookmarker', ['ui.router', 'bookmarker.admin', 'bookmarker.main'])

.config(function ($urlRouterProvider) {
	$urlRouterProvider.otherwise('/')
})

require('./main')
require('./admin')
