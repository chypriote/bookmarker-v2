'use strict'

var angular = require('angular')

angular.module('bookmarker')
	.directive('viewHeader', require('./viewHeader'))
	.controller('viewHeaderController', require('./viewHeader.controller'))
