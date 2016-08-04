'use strict'

var angular = require('angular')

angular.module('bookmarker')
	.directive('adminSidebar', require('./sidebar'))
	.controller('sidebarController', require('./sidebar.controller'))
