'use strict'

var angular = require('angular')

angular.module('bookmarker')
	.directive('sidebar', require('./sidebar'))
	.controller('sidebarController', require('./sidebar.controller'))
