'use strict'

var angular = require('angular')

angular.module('bookmarker.admin')
	.directive('categories', require('./categories'))
	.controller('categoriesController', require('./categories.controller'))
