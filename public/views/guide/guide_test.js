'use strict';

describe('myApp.guideEngine module', function() {

    beforeEach(module('myApp.guideEngine'));

    describe('guideCtrl controller', function(){

    it('should ....', inject(function($controller) {
        var scope = {};
        //spec body
        var guideCtrl = $controller('guideCtrl', {$scope:scope});
        expect(guideCtrl).toBeDefined();
        expect(scope.title).toBeDefined();
        expect(scope.milongas).toBeDefined();
        expect(scope.milongas.length).toBe(7);
    }));
  });
});