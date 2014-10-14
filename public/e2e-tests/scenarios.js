'use strict';

/* https://github.com/angular/protractor/blob/master/docs/toc.md */

describe('my app', function() {

  browser.get('index.php');

  it('should automatically redirect to /guide when location hash/fragment is empty', function() {
    expect(browser.getLocationAbsUrl()).toMatch("/guide");
  });

  describe('guide', function() {

    beforeEach(function() {
      browser.get('#/guide');
    });

    it('should render guide when user navigates to /guide', function() {
      expect(element.all(by.css('[ng-view] p')).first().getText()).
        toMatch(/Milongas List for BaTango Guide./);
    });

  });

  describe('view2', function() {

    beforeEach(function() {
      browser.get('#/view2');
    });

    it('should render view2 when user navigates to /view2', function() {
      expect(element.all(by.css('[ng-view] p')).first().getText()).
        toMatch(/partial for view 2/);
    });

  });
});
