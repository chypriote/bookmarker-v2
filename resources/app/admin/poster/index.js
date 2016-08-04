'use strict'

var angular = require('angular')

angular.module('bookmarker.admin')
	.directive('poster', require('./poster'))
	.controller('posterController', require('./poster.controller'))
